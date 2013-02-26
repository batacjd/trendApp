<?php 

class Signup_model extends CI_Model {

	function __construct() {
		parent::__construct();
	}
	
	public function get_usernames() {
		
		$query = $this->db->query('select username from users');
		$usernames = $query->result();
		
		return $usernames;
		
	}
	
	public function register_user($user) {
		
		$forUsers = array(
			'password' => $user['password'],
			'email' => $user['email'],
			'username' => $user['username']
		);
		$this->db->insert('users', $forUsers);
		
		$query = $this->db->query('select userid from users where username = \''.$user['username'].'\'');
		$userid = $query->result();
		
		$forUserInfos = array(
			'userid' => $userid[0]->userid,
			'givenname' => $user['givenname'],
			'lastname' => $user['lastname'],
			'birthmonth' => $user['birthdate'],
			'birthdate' => $user['birthdate'],
			'birthyear' => $user['birthyear']
		);
		$this->db->insert('userinfos', $forUserInfos);
		
		$data = array(
				'logged_in' => true,
				'userid' => $row->userid,
				'username' => $credentials['username'],
				'givenname' => $userinfo->givenname,
				'lastname' => $userinfo->lastname
			);
			$this->session->set_userdata($data);
		
	}
	
	
}
