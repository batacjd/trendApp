<?php

class Base_login_model extends CI_Model {
	
	function __construct() {
        parent::__construct();
    }
	
	public function getCategories() {
		//Gets the full list of categories
		$query = $this->db->query('select categoryname from categories');
		return $query->result();
		
	}
	
	public function get_password($username) {
		//Gets the user's password using username
		$this->db->select('password');
		$this->db->where('username', $username);
		$result = $this->db->get('users');
		
		return $result;
	}
	
	public function is_superuser($userid){
		//checks is user is superuser
		$sql = 'select superuserid from superusers where userid=\''.$userid.'\'';
		$result = $this->db->query($sql);
		
		return $result->result_array();
	}
	
	public function validate_login($credentials) {
		//Login function. Match user credentials to the database
		$this->db->where('password', $credentials['password']);
		$this->db->where('username', $credentials['username']);
		$result = $this->db->get('users');
		
		if($result->num_rows() == 1) {
			
			$row = $result->row();
			$this->db->select('givenname,lastname');
			$this->db->where('userid', $row->userid);
			$user = $this->db->get('userinfos');
			$userinfo = $user->row();
			
			$result = $this->is_superuser($row->userid);
			
			if( count($result) > 0) {
				$isSuperuser = true;
				$superuserid = $result[0]['superuserid'];
			}else{
				$isSuperuser = false;
				$superuserid = 0;
			}
			
			
			//Assign user details to session
			$data = array(
				'logged_in' => true,
				'userid' => $row->userid,
				'superuserid' => $superuserid,
				'isSuperuser' => $isSuperuser,
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