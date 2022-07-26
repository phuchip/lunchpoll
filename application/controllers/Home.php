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
		$data['content'] = 'account/home';
		$this->load->view('account/index',$data);
	}

	public function login()
	{
		$this->load->view('account/login');
	}

	public function post()
	{
		$this->load->view('modal/create_post');
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */