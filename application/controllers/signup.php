<?php

class Signup extends CI_Controller {

	public function index() {
		$this->load->view('signup-view.php');
	}
	
	public function check_username($str) {
		
		$this->load->model('signup_model');
		$usernames = $this->signup_model->get_usernames();
		
		foreach ($usernames as $u_names) {
			if($u_names->username == $str) {
				$this->form_validation->set_message('check_username','Username taken. Please choose another.');
				return FALSE;
			}
		}
		return TRUE;
		
	}
	
	public function register() {
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|xss_clean|callback_check_username');
		$this->form_validation->set_rules('password','Password','trim|required|min_length[6]|matches[c_password]');
		$this->form_validation->set_rules('c_password','Password Confirmation','trim|required');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email');
		
		$this->form_validation->set_rules('givenname','Given name','required');
		$this->form_validation->set_rules('lastname','Last name','required');
		$this->form_validation->set_rules('select-choice-month','Month','required');
		$this->form_validation->set_rules('select-choice-day','Day','required');
		$this->form_validation->set_rules('select-choice-year','Year','required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			$user['username'] = $this->input->post('username');
			$user['password'] = md5($this->input->post('password'));
			$user['email'] = $this->input->post('email');
			$user['givenname'] = $this->input->post('givenname');
			$user['lastname'] = $this->input->post('lastname');
			$user['birthmonth'] = $this->input->post('select-choice-month');
			$user['birthdate'] = $this->input->post('select-choice-day');
			$user['birthyear'] = $this->input->post('select-choice-year');
			
			$this->load->model('signup_model');
			$userid['userid'] = $this->signup_model->register_user($user);
			
			$this->load->view('signup_next-view');
		}
		
	}

}