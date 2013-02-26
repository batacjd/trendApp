<?php

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		if(!$this->session->userdata('logged_in')){
			redirect('base_login');
		}
		
		$data['givenname'] = $this->session->userdata('givenname');
		$data['lastname'] = $this->session->userdata('lastname');
		$this->load->view('home-view', $data);
	}
	
}