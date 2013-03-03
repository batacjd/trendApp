<?php

class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('search-view');
	}
	
	public function lists($i,$type){
		//Lists venues trends
		$lat = $_COOKIE['lat'];
		$lng = $_COOKIE['lng'];
		
		$this->load->model('foursquare_model');
		$this->load->model('units_model');
		
		if($type == 'venues'){
			$res = $this->foursquare_model->get_venues($i,'',$lat,$lng);
			$this->load->view('search_list_results-view', $res);
		}
		if($type == 'promos'){
			$c = '2';
			$res['res'] = $this->units_model->get_promo_event($i,$c);
			$this->load->view('search_list_results_pe-view', $res);
		}
		if($type == 'events'){
			$c = '3';
			$res['res'] = $this->units_model->get_promo_event($i,$c);
			$this->load->view('search_list_results_pe-view', $res);
		}
	}
	
	public function custom_search() {
		//Search portion of search function
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
		
		$this->load->model('units_model');
		
		//Get information of venues by passing through URL variables
		$data['name'] = $this->input->get('name');
		$data['lat'] = $this->input->get('lat');
		$data['lng'] = $this->input->get('lng');
		$data['distance'] = $this->input->get('distance');
		$data['address'] = $this->input->get('address');
		$data['icon'] = $this->input->get('icon');
		$data['id'] = $this->input->get('id');
		$rating = $this->input->get('rating');
		
		if ($rating != ''){
			$result = $this->units_model->get_unitid_by_venueid($data['id']);
			//User has rated. Add to ratings table. Check if unit exists first.
			
			if(count($result) == 0){
				//No units yet. Add unit before inserting rating
				$this->units_model->insert_unit($data);
				//Get unitid again for the newly inserted rows
				$result = $this->units_model->get_unitid_by_venueid($data['id']);
			}
			$unitid = $result[0]['unitid'];
			$this->units_model->insert_rating($rating,$unitid);
		}
		
		
		$data['rating'] = $this->units_model->get_unit_rating_by_venueid($data['id']);
		
		$this->load->view('show_selected-view',$data);
	}
	
}