<?php

class Manage extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function show_list(){
		
		$this->load->model('units_model');
		
		$superuserid = $this->session->userdata('superuserid');
		$res['res'] = $this->units_model->get_promo_event_by_superuserid($superuserid);
		$this->load->view('manage_list-view', $res);
	}
	
	public function delete($pid){
		
		$this->load->model('units_model');
		$this->units_model->delete_promo_event_by_promoeventid($pid);
		$this->show_list();
		
	}
	
	public function promo(){
		//Add unit to database if it wasn't added yet.
		//This step is necessary
		//Load units model

		$this->load->model('units_model');
		
		$data['name'] = $this->input->get('name');
		$data['icon'] = $this->input->get('icon');
		$data['lat'] = $this->input->get('lat');
		$data['lng'] = $this->input->get('lng');
		$data['id'] = $this->input->get('id');
		$data['address'] = $this->input->get('address');
		
		//Check if unit exists
		
		if($data['icon'] != ''){
			$result = $this->units_model->get_unitid_by_venueid($data['id']);
			
			if(count($result) == 0){
				//No record yet. Insert unit to database
				$this->units_model->insert_unit($data);
			}
			
			//Get unitid again for the newly inserted rows
			$result = $this->units_model->get_unitid_by_venueid($data['id']);
			$data['unitid'] = $result[0]['unitid'];
			
		}else{
			$data['name'] = $this->input->get('name');
			$data['unitid'] = $this->input->get('unitid');
		}
		
		
		$this->load->view('manage_promo-view',$data);
		
	}
	
	public function add_promo(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('promoName','Promo name','trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$unitid = $this->input->post('unitid');
			$unitname = $this->input->post('unitname');
			$address = $this->input->post('address');
			redirect(site_url('manage/promo?unitid='.$unitid.'&name='.$unitname.'&address='.$address));
		}else{
			
			$data['name'] = $this->input->post('promoName');
			$data['unitid'] = $this->input->post('unitid');
			$data['unittypeid'] = '2';
			
			$startm = $this->input->post('start-month');
			$startd = $this->input->post('start-day');
			$starty = $this->input->post('start-yar');
			$endm = $this->input->post('end-month');
			$endd = $this->input->post('end-day');
			$endy = $this->input->post('end-year');
			
			$data['startdate'] = date("M-d-Y", mktime(0,0,0,$startm,$startd,$starty));
			$data['enddate'] = date("M-d-Y", mktime(0,0,0,$endm,$endd,$endy));
			$data['mechanics'] = $this->input->post('description');
			
			$this->load->model('units_model');
			$this->units_model->insert_unit_promo_event($data);
			
			
			$this->load->view('add_promo_ok-view');
			
		}
		
	}
	
	public function event(){
		//Add unit to database if it wasn't added yet.
		//This step is necessary
		//Load units model

		$this->load->model('units_model');
		
		$data['name'] = $this->input->get('name');
		$data['icon'] = $this->input->get('icon');
		$data['lat'] = $this->input->get('lat');
		$data['lng'] = $this->input->get('lng');
		$data['id'] = $this->input->get('id');
		$data['address'] = $this->input->get('address');
		
		//Check if unit exists
		if($data['icon'] != ''){
			$result = $this->units_model->get_unitid_by_venueid($data['id']);
			if(count($result) == 0){
				//No record yet. Insert unit to database
				$this->units_model->insert_unit($data);
			}
			
			//Get unitid again for the newly inserted rows
			$result = $this->units_model->get_unitid_by_venueid($data['id']);
			$data['unitid'] = $result[0]['unitid'];
			
		}else{
			$data['name'] = $this->input->get('name');
			$data['unitid'] = $this->input->get('unitid');
		}
		
		
		$this->load->view('manage_event-view',$data);
		
	}
	
	public function add_event(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('eventName','Event name','trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$unitid = $this->input->post('unitid');
			$unitname = $this->input->post('unitname');
			$address = $this->input->post('address');
			redirect(site_url('manage/event?unitid='.$unitid.'&name='.$unitname.'&address='.$address));
		}else{
			
			$data['name'] = $this->input->post('eventName');
			$data['unitid'] = $this->input->post('unitid');
			$data['unittypeid'] = '3';
			
			$startm = $this->input->post('start-month');
			$startd = $this->input->post('start-day');
			$starty = $this->input->post('start-year');
			$endm = $this->input->post('end-month');
			$endd = $this->input->post('end-day');
			$endy = $this->input->post('end-year');
			
			$data['startdate'] = date("M-d-Y", mktime(0,0,0,$startm,$startd,$starty));
			$data['enddate'] = date("M-d-Y", mktime(0,0,0,$endm,$endd,$endy));
			$data['mechanics'] = $this->input->post('description');
			
			$this->load->model('units_model');
			$this->units_model->insert_unit_promo_event($data);
			
			
			$this->load->view('add_event_ok-view');
			
		}
		
	}
	
}