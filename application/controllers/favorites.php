<?php

class Favorites extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		$data['givenname'] = $this->session->userdata('givenname');
		$data['lastname'] = $this->session->userdata('lastname');
		
		$this->load->view('fave-view');
	}
	
}