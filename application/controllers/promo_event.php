<?php

class Promo_event extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	function selected(){
		
		$promoeventid = $this->input->get('pid');
		$this->load->model('units_model');
		$res = $this->units_model->get_promo_event_by_promoeventid($promoeventid);
		
		$data['pname'] = $res[0]['promoeventname'];
		$data['unitname'] = $res[0]['unitname'];
		$data['unitid'] = $res[0]['unitid'];
		$data['start'] = $res[0]['start'];
		$data['end'] = $res[0]['end'];
		$data['mechanics'] = $res[0]['mechanics'];
		$data['address'] = $res[0]['address'];
		$data['lat'] = $res[0]['lat'];
		$data['lng'] = $res[0]['lng'];
		$data['distance'] = 1000;
		$data['icon'] = $res[0]['categoryid'];
		$data['id'] = $res[0]['venueid'];
		
		$this->load->view('show_selected_pe-view', $data);
	}
	
}