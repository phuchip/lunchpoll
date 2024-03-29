<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {

	public $dateNow;
	public $dateTimeNow;
    function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		Globals::checkLogin();
		$this->dateNow = date('Y-m-d');
		$this->dateTimeNow = date('Y-m-d H:i:s');
	}
	
	public function choose_food()
	{
		$foodId = $this->input->post('id_food');
		$poll_by = $this->session->userdata('user')['id'];
		if (!$poll_by) {
			echo json_encode(['status'=>false,'mes'=>'Vui lòng đăng nhập!']);
			exit();
		}
		if(!$foodId){
			echo json_encode(['status'=>false,'mes'=>'Lỗi']);
			exit();
		}
		$checkFood = $this->Site_model->select_data_normal('poll_date',['food_id'=>$foodId,'date'=>date('Y-m-d')],1);
		//Nếu tồn tại trong database thì sẽ thực hiện update, ngược lại sẽ insert
		if($checkFood){
			$listUser = $checkFood->poll_by; // Lấy ra list user chọn food
			if ($listUser) {
				$arrListUser = explode(',',$listUser); // Mảng list user
				$arrListUser = array_combine($arrListUser,$arrListUser);
			}else{
				$arrListUser = [];
			}
			$id = in_array($poll_by, $arrListUser); // Check user có trong arrListUser không
			if(!$id){ // Nếu không tồn tại thì sẽ thực hiện update total + 1 và thêm user vào list user
				$arrListUser[$poll_by] = $poll_by;
				arsort($arrListUser);
			}else{ //Nếu tồn tại thì sẽ loại bỏ chọn food => thực hiện unset user in list user choose food, total - 1
				unset($arrListUser[$id]);
			}
			$action = $this->db->set('total',count($arrListUser))->set('poll_by',implode(',',$arrListUser))->where(['food_id'=>$foodId,'date'=>date('Y-m-d')])->update('poll_date');
		}else{	
			$action = $this->Site_model->insert_data('poll_date',['food_id'=>$foodId,'total'=>1,'poll_by'=>$poll_by,'date'=>date('Y-m-d')]);
		}
		echo json_encode($this->getDataPollFoodUser());
		exit();
	}
	public function add_food()
	{
		$name = $this->input->post('food_name');
		$desc = $this->input->post('food_desc');
		$image = $_FILES['food_image'];
		$poll_by = $this->session->userdata('user')['id'];
		if (!$name) {
			echo json_encode(['status'=>false,'mes'=>'Vui lòng điền món ăn']);
			exit();
		}
		if ($image['name']) {
			$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
			$detectedType = exif_imagetype($image['tmp_name']);
			if(!in_array($detectedType, $allowedTypes)){
				echo json_encode(['status'=>false,'mes'=>'Vui lòng upload định dạng ảnh']);
				exit();
			}
			$file_name = changeToSlug($name);
			$path = 'images/food/'.$file_name.'.png';
			if(!move_uploaded_file($image['tmp_name'], $path)){ // Lưu file 
	            echo json_encode(['status'=>false,'mes'=>'Có lỗi xảy ra xin vui lòng thử lại']);
				exit();
	        };
		}else{
			$path = '';
		}
        $checkFood = $this->db->where(['name'=>$name])->get('food');
        if ($checkFood->num_rows() > 0) {
        	echo json_encode(['status'=>false,'mes'=>'Món ăn đã tồn tại']);
			die;
        }
        $action = $this->Site_model->insert_data('food',['name'=>$name,'description'=>$desc,'image'=>$path,'created'=>date('Y-m-d H:i:s'),'updated'=>date('Y-m-d H:i:s')]);
        if ($action) {
        	echo json_encode(['status'=>true,'mes'=>'Thêm món ăn thành công','id'=>$this->db->insert_id()]);
			die;
        }else{
        	echo json_encode(['status'=>false,'mes'=>'Có lỗi xảy ra, xin vui lòng thử lại sau']);
			exit();
        }
	}

	function getDataPollFoodUser()
	{
		$totalPoll = $this->db->select('SUM(total) AS total')->where(['date'=>date('Y-m-d')])->get('poll_date')->row()->total;
		$dataPoll = $this->db->query('SELECT f.id as id,f.name as name,f.image as image,pd.total as total,pd.poll_by as poll_by FROM food f LEFT JOIN (SELECT total,poll_by,food_id FROM poll_date WHERE `date` = "'.date('Y-m-d').'") as pd ON pd.food_id = f.id WHERE f.status = 1 GROUP BY f.id ORDER BY total DESC')->result();
		foreach ($dataPoll as $key => $value) {
			if ($value->poll_by) {
				$dataUser = $this->db->query('SELECT `id`,`username`, `avatar` FROM `user` WHERE `id` IN('.$value->poll_by.')')->result_array();
				$dataUser = array_column($dataUser,null,'id');
			}else{
				$dataUser = [];
			}
			$percent = $value->total?round(($value->total/$totalPoll)*100,2):0;
			$data[$value->id] = [
				'food_id' => $value->id,
				'percent' => $percent.'%',
				'name' => $value->name,
				'image' => $value->image,
				'user' => $dataUser
			];
		}
		return $data;
	}

	function post()
	{
		$content = $this->input->post('content_post');
		$userId = $this->session->userdata('user')['id'];
		$subjecId = $this->session->userdata('user')['subject'];
		$arrImages = $_FILES['image_post'];
		$insert = $this->site_model->insert_data('post',['user_id'=>$userId,'content'=>$content,'subject_id'=>$subjecId,'created'=>$this->dateTimeNow,'updated'=>$this->dateTimeNow]);
		if($insert){
			$postId = $this->db->insert_id();
			if(isset($arrImages)){
				$arrPath = $this->insertImageToPost($arrImages,$postId);
			}
			echo json_encode(['success'=>true,'mes'=>'','post_id'=>$postId,'images'=>$arrPath]);
		}else{
			echo json_encode(['success'=>false,'mes'=>'Có lỗi xảy ra xin vui lòng thử lại']);
		}
	}

	public function insertImageToPost($arrImages,$postId)
	{
		$arrPath = [];
		//Create folder
		$folderName = 'post/'.date('Ym').'/'.$postId;
		$folderName = Globals::createFolder($folderName);
		for($i =0;$i <count($arrImages['name']);$i++){
			$index = $i + 1;
			$file_name = $postId.'_'.$index;
			$path = $folderName.$file_name.'.png';
			if(move_uploaded_file($arrImages['tmp_name'][$i], $path)){ // Lưu file
				//Thực hiện insert image
				$insert = $this->site_model->insert_data('post_image',['user_id'=>$this->session->userdata('user')['id'],'post_id'=>$postId,'image'=>$path,'status'=>1,'created'=>$this->dateTimeNow,'updated'=>$this->dateTimeNow]);
				array_push($arrPath,$path);
			};
		}
		return $arrPath;
	}

	function emoji()
	{
		$postId = $this->input->post('post_id');
		$userId = $this->session->userdata('user')['id'];
		$emoji = $this->input->post('emoji');
		$toUserId = $this->encryption->decrypt($this->input->post('user_id'));
		$checkEmoji = $this->db->where(['post_id'=>$postId,'from_user'=>$userId])->get('post_emoji')->row();
		if($checkEmoji){
			$update = $this->site_model->update_data('post_emoji',['emoji_id'=>$emoji,'updated'=>$this->dateTimeNow],['post_id'=>$postId,'from_user'=>$userId]);
		}else{
			$insert = $this->site_model->insert_data('post_emoji',['post_id'=>$postId,'from_user'=>$userId,'to_user'=>$toUserId,'emoji_id'=>1,'created'=>$this->dateTimeNow,'updated'=>$this->dateTimeNow]);
		}
		$this->updateQuantityInteraction($postId);
	}

	function updateQuantityInteraction($postId)
	{
		$quantity = $this->db->where(['post_id'=>$postId])->where('emoji_id !=',0)->get('post_emoji')->num_rows();
		$update = $this->site_model->update_data('post',['quantity_interaction'=>$quantity],['id'=>$postId]);
	}

	function change_subject()
	{
		$subjecId = $this->input->post('subject_id');
		$userId = $this->session->userdata('user')['id'];
		$update = $this->site_model->update_data('user',['subject_id'=>$subjecId,'updated'=>date('Y-m-d H:i:s')],['id'=>$userId]);
	}

	function action_post()
	{
		$action = $this->input->post('action');
		$postId = $this->input->post('post_id');
		$userId = $this->session->userdata('user')['id'];
		$postModel = $this->site_model->select_data_normal('post',['id'=>$postId],1);
		if($action == 'delete' && $postModel->user_id == $userId){
			$arrPostImage = $this->site_model->select_data_normal('post_image',['post_id'=>$postId,'user_id'=>$userId]);
			foreach($arrPostImage as $postImage){
				$urlImage = $postImage->image;
				unlink($urlImage);
			}
			$delete = $this->site_model->delete_data('post',['id'=>$postId]);
			$deleteImage = $this->site_model->delete_data('post_image',['post_id'=>$postId,'user_id'=>$userId]);
			$result = [
				'status' => 'success',
				'action' => 'delete',
				'message' => 'Xóa bài viết thành công'
			];
		}elseif($action == 'report'){
			$result = [
				'status' => 'success',
				'action' => 'report',
				'message' => 'Đã báo cáo bài viết'
			];
		}
		echo json_encode($result);
	}

	function change_password()
	{
		$passwordNew = $this->input->post('password_new');
		$userId = $this->session->userdata('user')['id'];
		$updatePassword = $this->site_model->update_data('user',['password'=>md5($passwordNew),'updated'=>date('Y-m-d H:i:s')],['id'=>$userId]);
		if($updatePassword){
			$result = [
				'status' => 'success',
				'message' => 'Đổi mật khẩu thành công'
			];
		}else{
			$result = [
				'status' => 'error',
				'message' => 'Có lỗi xảy ra xin vui lòng thử lại sau'
			];
		}
		echo json_encode($result);
	}

	function change_avatar()
	{
		$file = $_FILES['file'];
		if ($file['name']) {
			$allowedTypes = array(IMAGETYPE_PNG, IMAGETYPE_JPEG);
			$detectedType = exif_imagetype($file['tmp_name']);
			if(!in_array($detectedType, $allowedTypes)){
				echo json_encode(['status'=>'error','message'=>'Vui lòng upload định dạng ảnh']);
				exit();
			}

			$userId = $this->session->userdata('user')['id'];
			$userName = $this->session->userdata('user')['username'];
			$userNameSlug = Globals::convertSlug($userName);
			$fileName = date('Y-m-d').'_'.$userNameSlug.'.png';
			$folderName = Globals::createFolder('avatar/'.$userId);
			$filePath = $folderName.$fileName;

			$userModel = $this->site_model->select_data_normal('user',['id'=>$userId],1);
			$avatar = $userModel->avatar;
			try{
				unlink($avatar);
			}catch (\Exception $e) {
				exit($e->getMessage());
			}
			
			if(!move_uploaded_file($file['tmp_name'], $filePath)){ // Lưu file 
	            echo json_encode(['status'=>'error','message'=>'Có lỗi xảy ra xin vui lòng thử lại']);
				exit();
	        }else{
				$updateAvatar = $this->site_model->update_data('user',['avatar'=>$filePath,'updated'=>date('Y-m-d H:i:s')],['id'=>$userId]);
				echo json_encode(['status'=>'success','image'=>$filePath,'message'=>'Thay đổi ảnh đại diện thành công']);
				exit();
			}
		}else{
			echo json_encode(['status'=>'error','message'=>'Có lỗi xảy ra xin vui lòng thử lại']);
			exit();
		}
		
	}

}

/* End of file Api.php */
/* Location: ./application/controllers/Api.php */