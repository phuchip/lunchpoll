<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		if(isset($this->session->userdata('user')['id'])){
			redirect('/home');
		}
	}
	public function index()
	{
		$this->load->view('account/login');
	}

	function check_login()
	{
		$type = $this->input->post('type');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$output = array('error' => false);
		if($type == 'email'){
			$login = $this->Site_model->check_login($username, $password);
		}else{
			$output['message'] = 'Vui lòng điền email';
		}
		if($login){
			if (empty($login->avatar)) {
				$characterName = Globals::getCharacterName($login->username);
				$avatar = Globals::make_avatar($login->id,$characterName);
				$this->Site_model->update_data('user',['avatar'=>$avatar],['id'=>$login->id]);
			}else{
				$avatar = $login->avatar;
			}
			$user = [
				'id'	=> $login->id,
				'username' => $login->username,
				'avatar'=> $avatar,
				'active'=> 1,
				'loginType'=> 'account'
			];
			$this->session->set_userdata('user',$user);
			Globals::setCookie('user_id',$this->encryption->encrypt($login->id));
			Globals::setCookie('user_email',$this->encryption->encrypt($login->email));
			$this->Site_model->update_data('user',['active'=>1],['id'=>$login->id]);
			$output['redirect'] = '/home';
			$output['message'] = 'Đăng nhập thành công. Đang chuyển hướng...';
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Sai thông tin đăng nhập. Vui lòng kiểm tra lại!';
		}
		echo json_encode($output);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */