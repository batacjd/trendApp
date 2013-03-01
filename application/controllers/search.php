<?php

class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('search-view');
	}
	
	public function lists($i){
		
		$c = 1;
		$lat = $_COOKIE['lat'];
		$lng = $_COOKIE['lng'];
		
		$this->load->model('foursquare_model');
		
		$res = $this->foursquare_model->get_venues($i,'',$lat,$lng);
		$this->load->view('search_list_results-view', $res);

	}
	
	public function custom_search() {
		
		$c = 0;
		
		$query = $this->input->post('search');
		$lat = $_COOKIE['lat'];
		$lng = $_COOKIE['lng'];
		$str = urlencode($query);
		
		$this->load->model('foursquare_model');
		$res = $this->foursquare_model->get_venues($c,$str,$lat,$lng);
		$this->load->view('search_list_results-view',$res);
	}
	
	public function selected() {
		
		$data['name'] = $this->input->get('name');
		$data['lat'] = $this->input->get('lat');
		$data['lng'] = $this->input->get('lng');
		$data['distance'] = $this->input->get('distance');
		$data['address'] = $this->input->get('address');
		
		$this->load->view('show_selected-view',$data);
	}
	
}