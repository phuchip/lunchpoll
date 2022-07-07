<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('spell');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	}

	public function index()
	{
		$str = 'Tôy';
		var_dump(vn_spell_two_chars($str));
	}

}

/* End of file Test.php */
/* Location: ./application/controllers/Test.php */