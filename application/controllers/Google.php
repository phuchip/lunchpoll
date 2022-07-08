<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Google extends CI_Controller {

	function __construct(){ 
		parent::__construct(); 
		$this->load->model('Site_model');
		$this->load->helper('Globals');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	} 

	public function index()
	{

		$google_client = Globals::getGoogle();

		if(isset($_GET["code"])){
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			if(!isset($token["error"])){
				$google_client->setAccessToken($token['access_token']);

				$google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();

				$current_datetime = date('Y-m-d H:i:s');

				$checkEmail = $this->Site_model->checkUser('user',['email'=>$data['email']]);

				if ($checkEmail->num_rows() > 0) {
					$data_user = $checkEmail->row();
					$user = [
						'id'	=> $data_user->id,
						'username' => $data_user->username,
						'avatar'	=> $data_user->avatar,
						'loginType' => 'google',
						'active'=> 1,
						'access_token'	=> $token['access_token'],
					];
				}else{
					$checkUser = $this->Site_model->checkUser('user',['login_id'=>$data['id'],'typeLogin'=>'google']);

					if($checkUser->num_rows() > 0){

						$data_user = $checkUser->row();

						$image = $data_user->avatar;

		     			//update data
						$user_data = array(
							'username' => $data['name'],
							'gender'=> $data['gender'],
							'active'=> 1,
							'updated' => $current_datetime
						);

						if ($data_user->login_image != $data['picture']) {
							$image = Globals::saveAvatarUser($data['id'],$data['picture']);
							$user_data['avatar'] = $image;
							$user_data['login_image'] = $data['picture'];
						}

						$condition = ['login_id' => $data['id'],'id'=>$data_user->id];

						$this->Site_model->update_data('user',$user_data, $condition);

						$idUser = $checkUser->row()->id;
					}
					else
					{
						$image = Globals::saveAvatarUser($data['id'],$data['picture']);
		     			//insert data
						$user_data = array(
							'username' => $data['name'],
							'email' => $data['email'],
							'avatar'=> $image,
							'gender'=> $data['gender'],
							'typeLogin'=> 'google',
							'active'=> 1,
							'login_id'	=> $data['id'],
							'login_image'	=> $data['picture'],
							'created' => $current_datetime,
							'updated' => $current_datetime
						);

						$this->Site_model->insert_data('user',$user_data);
						$idUser = $this->db->insert_id();
					}
					$user = [
						'id'	=> $idUser,
						'username' => $data['name'],
						'avatar'	=> $image,
						'loginType' => 'google',
						'active'=> 1,
						'access_token'	=> $token['access_token'],
					];
				}
				Globals::setCookie('user_id',$user['id']);
				Globals::setCookie('user_email',$data['email']);
				$this->session->set_userdata('user',$user);

				$redirectUrl = $this->input->get('state');
				redirect($redirectUrl,'refresh');
			}
		}

		
	}

}

/* End of file google.php */
/* Location: ./application/controllers/google.php */