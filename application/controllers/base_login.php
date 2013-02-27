<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base_login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		
		if($this->session->userdata('logged_in')){
			redirect('home');
		}
		
		$this->load->model('foursquare_model');
		
		$res = $this->foursquare_model->get_venues(1);
		
		$this->load->view('base_login-view', $res);
	}
	
	public function do_login() {
		
		if($this->session->userdata('logged_in')){
			redirect('home','location');
		}
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username','Username','trim|required|callback_check_username');
		
		
		if ($this->form_validation->run() == FALSE) {
			$this->index();
		}else{
			
			$this->form_validation->set_rules('password','Password','trim|required|callback_check_password');
			if ($this->form_validation->run() == FALSE) {
				$this->index();
			}else{
				$result = $this->check_password();
				
				if(!$result){
					$this->index();
				}else{
					redirect('home','location');
				}
			}
		}
		
	}
	
	public function check_username($str) {
		$this->load->model('signup_model');
		$valid_usernames = $this->signup_model->get_usernames();
		
		foreach ($valid_usernames as $v_usernames) {
			if($v_usernames->username == $str) {
				return TRUE;
			}
		}
		
		$this->form_validation->set_message('check_username','Unregistered username.');
		return FALSE;
	}
	
	public function check_password() {
		
		$credentials['username'] = $this->input->post('username');
		$credentials['password'] = md5($this->input->post('password'));
		
		$this->load->model('base_login_model');
		$result = $this->base_login_model->validate_login($credentials);
		
		if(!$result){
			$this->form_validation->set_message('check_password', 'Invalid password.');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/base_login.php */