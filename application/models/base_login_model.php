<?php

class Base_login_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
    }
	
	public function getCategories() {
		
		$query = $this->db->query('select categoryname from categories');
		return $query->result();
		
	}
	
	public function get_password($username) {
		
		$this->db->select('password');
		$this->db->where('username', $username);
		$result = $this->db->get('users');
		
		return $result;
	}
	
	public function validate_login($credentials) {
		
		$this->db->where('password', $credentials['password']);
		$this->db->where('username', $credentials['username']);
		$result = $this->db->get('users');
		
		if($result->num_rows() == 1) {
			
			$row = $result->row();
			$this->db->select('givenname,lastname');
			$this->db->where('userid', $row->userid);
			$user = $this->db->get('userinfos');
			$userinfo = $user->row();
			
			$data = array(
				'logged_in' => true,
				'userid' => $row->userid,
				'username' => $credentials['username'],
				'givenname' => $userinfo->givenname,
				'lastname' => $userinfo->lastname
			);
			$this->session->set_userdata($data);
			
			return true;
			
		}else{
			return false;
		}
		
	}
	
}