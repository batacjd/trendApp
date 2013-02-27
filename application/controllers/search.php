<?php

class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('search-view');
	}
	
	public function lists($i){
		
		//$i = $this->input->get('var1');
		$this->load->model('foursquare_model');
		switch($i){
			case 1: $res = $this->foursquare_model->get_venues($i);
					$this->load->view('search_list_results-view', $res);
		};
	}
	
}