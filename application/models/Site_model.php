<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}
	
	function checkUser($table,$condition)
	{
		$this->db->where($condition);
		$data = $this->db->get($table);
		return $data;
	}

	function select_data_normal($table,$condition,$limit=null)
	{
		$this->db->where($condition);
		if($limit){
			$this->db->limit($limit);
		}
		$data = $this->db->get($table);
		if($limit == 1){
			return $data->row();
		}else{
			return $data->result();
		}
	}
	
	function check_login($email,$password)
	{
		$this->db->where('email',$email);
        $this->db->where('password',md5($password));
        $sql = $this->db->get('user');
        return $sql->row();
	}
	function register($username,$email,$password)
	{
		$data = [
		    'username' => $username,
		    'email' => $email,
		    'password' => md5($password),
		    'avatar' => 'images/avatar/no-user.png',
		    'created' => date('Y-m-d H:i:s'),
		    'updated' => date('Y-m-d H:i:s')
		];
		return $this->db->insert('user', $data);
	}
	
	
	public function select_data($tbl, $data, $condition=null,$join=null,$orderBy,$start, $limit, $is_multi = 1){
 		$this->db->select($data);
 		$this->db->from($tbl);
 		if ($join != null) {
 			foreach ($join as $key => $value) {
	 			$this->db->join($key, $value);
	 		}
 		}
 		if ($condition != null) {
 			foreach ($condition as $key => $value) {
 				$this->db->where($key, $value);
 			}
 		}
 		if ($orderBy != null) {
 			foreach ($orderBy as $key => $value) {
	 			$this->db->order_by($key, $value);
	 		}
 		}
 		if ($start != null || $limit != null) {
 			$this->db->limit($start,$limit);
 		}
 		if ($is_multi == 1) {
 			return $this->db->get()->result_array();
 		}else{
 			return $this->db->get()->row_array();
 		}
 	}
 	public function limit_data($tbl, $data, $condition=null,$join=null,$orderBy,$in,$start, $limit, $is_multi = 1){
 		$this->db->select($data);
 		if ($join != null) {
 			foreach ($join as $key => $value) {
	 			$this->db->join($key, $value);
	 		}
 		}
 		if ($condition != null) {
 			foreach ($condition as $key => $value) {
 				$this->db->where($key, $value);
 			}
 		}
 		if ($orderBy != null) {
 			foreach ($orderBy as $key => $value) {
	 			$this->db->order_by($key, $value);
	 		}
 		}
 		if ($in != null) {
 			foreach ($in as $key => $value) {
	 			$this->db->where_in($key, $value);
	 		}
 		}
 		if ($is_multi == 1) {
 			return $this->db->get($tbl,$limit)->result_array();
 		}else{
 			return $this->db->get()->row_array();
 		}

 	}
 	public function insert_data($tbl, $data){
 		return $this->db->insert($tbl, $data);
 	}
 	public function update_data($tbl, $data, $condition){
		return $this->db->update($tbl, $data,$condition);
 	}
 	public function delete_data($tbl,$condition){
        return $this->db->delete($tbl,$condition);
	}

}

/* End of file Site.php */
/* Location: ./application/models/Site.php */