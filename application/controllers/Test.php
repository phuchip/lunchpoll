<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function index()
	{
		$str = 'Tôy';
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */