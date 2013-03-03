<?php

class Favorites extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	function index() {
		
		$this->load->model('units_model');
		
		$userid = $this->session->userdata('userid');
		$res['res'] = $this->units_model->user_ratings_by_userid($userid);
		
		$this->load->view('fave-view',$res);
	}
	
}