<?php

class Search extends CI_Controller {
	
	function __construct() {
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('search-view');
	}
	
	public function lists($i){
		//Lists venues trends
		$lat = $_COOKIE['lat'];
		$lng = $_COOKIE['lng'];
		
		$this->load->model('foursquare_model');
		$this->load->model('units_model');
		
		
		$res = $this->foursquare_model->get_venues($i,'',$lat,$lng);
		$c = '2';
		$data['promos'] = $this->units_model->get_promo_event($i,$c);
		$c = '3';
		$data['events'] = $this->units_model->get_promo_event($i,$c);
		
		$this->load->view('search_list_results-view', array_merge($res,$data));
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
		$this->load->model('recommendations_model');
		
		//Get information of venues by passing through URL variables
		$data['name'] = $this->input->get('name');
		$data['lat'] = $this->input->get('lat');
		$data['lng'] = $this->input->get('lng');
		$data['distance'] = $this->input->get('distance');
		$data['address'] = $this->input->get('address');
		$data['icon'] = $this->input->get('icon');
		$data['id'] = $this->input->get('id');
		$rating = $this->input->get('rating');
		
		$result = $this->units_model->get_unitid_by_venueid($data['id']);
		
		if ($rating != ''){
			//User has rated. Add to ratings table. Check if unit exists first.
			
			if(count($result) == 0){
				//No units yet. Add unit before inserting rating
				$this->units_model->insert_unit($data);
				//Get unitid again for the newly inserted rows
				$result = $this->units_model->get_unitid_by_venueid($data['id']);
			}
			$unitid = $result[0]['unitid'];
			$this->units_model->insert_rating($rating,$unitid);
			
			//update unitpairs ratings table
			$userid = $this->session->userdata('userid');
			$this->recommendations_model->update_recommendation_ratings($unitid,$userid);
		}
		
		if(count($result) > 0){
			//Unit exists. Get promos and events
			$unitid = $result[0]['unitid'];
			$data['promos'] = $this->units_model->get_promo_by_unitid($unitid);
			$data['events'] = $this->units_model->get_event_by_unitid($unitid);
			$data['recommendations'] = $this->recommendations_model->predict_by_unitid($unitid);
				
			//Get user's rating for the selected venue
			$userid = $this->session->userdata('userid');
			$data['userrating'] = $this->units_model->get_rating_by_userid_unitid($userid,$unitid);
			
		}else{
			$data['promos'] = '';
			$data['events'] = '';
			$data['recommendations'] = '';
			$data['userrating'] = '';
		}
		
		$data['rating'] = $this->units_model->get_unit_rating_by_venueid($data['id']);
		
		$this->load->view('show_selected-view',$data);
	}
	
}