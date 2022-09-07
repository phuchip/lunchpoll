<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		Globals::checkLogin();
	}

	public function index()
	{
		$data['title'] = 'Trang chủ';
		$arrPost = $this->db->select('p.*,u.name as user_name,u.avatar as avatar,GROUP_CONCAT(pi.image) as image')
		->from('post p')
		->join('post_image pi','pi.post_id = p.id','left')
		->join('user u','u.id = p.user_id','left')
		->where(['u.status'=>1])
		->where('p.subject_id != ',4)
		->group_by('p.id')
		->order_by('p.updated desc')
		->get()->result();
		if($arrPost && $arrPost[0]->id){
			$data['arrPost'] = $arrPost;
		}
		$arrPostEmoji = $this->db->where(['from_user'=>$this->session->userdata('user')['id']])->get('post_emoji')->result();
		if($arrPostEmoji){
			foreach($arrPostEmoji as $value){
				$arrEmoji[$value->post_id] = [
					'id' => $value->id,
					'post_id' => $value->post_id,
					'from_user' => $value->from_user,
					'to_user' => $value->to_user,
					'emoji_id' => $value->emoji_id,
				];
			}
			$data['arrPostEmoji'] = $arrEmoji;
		}
		$data['content'] = 'account/home';
		$this->load->view('account/index',$data);
	}

	public function login()
	{
		$this->load->view('account/login');
	}

	public function account()
	{
		$arrPost = $this->db->select('p.*,u.name as user_name,u.avatar as avatar,GROUP_CONCAT(pi.image) as image')
		->from('post p')
		->join('post_image pi','pi.post_id = p.id','left')
		->join('user u','u.id = p.user_id','left')
		->where(['u.status'=>1,'u.id'=>$this->session->userdata('user')['id']])
		->where('p.subject_id != ',4)
		->group_by('p.id')
		->order_by('p.updated desc')
		->get()->result();
		
		if($arrPost && $arrPost[0]->id){
			$data['arrPost'] = $arrPost;
		}
		$arrPostEmoji = $this->db->where(['from_user'=>$this->session->userdata('user')['id']])->get('post_emoji')->result();
		if($arrPostEmoji){
			foreach($arrPostEmoji as $value){
				$arrEmoji[$value->post_id] = [
					'id' => $value->id,
					'post_id' => $value->post_id,
					'from_user' => $value->from_user,
					'to_user' => $value->to_user,
					'emoji_id' => $value->emoji_id,
				];
			}
			$data['arrPostEmoji'] = $arrEmoji;
		}
		$data['title'] = 'Trang cá nhân';
		$data['content'] = 'account/account';
		$this->load->view('account/index',$data);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */