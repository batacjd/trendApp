<?php

class Upload extends CI_Controller {
	
	function __construct(){
		parent::__construct();
	}
	
	public function do_upload(){
		
		//Uploads a picture with max size 100kb
		$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/trendApp/Images/uploads';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '800';
		$config['max_height']  = '600';
		
		$promoeventid = $this->input->get('promoeventid');
		
		$this->load->model('units_model');
		$data = $this->units_model->get_promo_event_by_promoeventid($promoeventid);
		
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		
		if (!$this->upload->do_upload("userfile"))
		{
			$error = array('error' => $this->upload->display_errors());
			$error['promoeventid'] = $promoeventid;
			$error['pname'] = $data[0]['promoeventname'];
			$error['mechanics'] = $data[0]['mechanics'];
			$this->load->view('upload_picture-view', $error);
		}
		else
		{
			$data2 = array('upload_data' => $this->upload->data());
			$filename = $data2['upload_data']['file_name'];
			$this->units_model->insert_picture($filename,$promoeventid);
			$data = $this->units_model->get_promo_event_by_promoeventid($promoeventid);
			$data3 = array('data' => $data);
			
			$this->load->view('add_promo_event_ok-view', array_merge($data3,$data2));
		}
	}
	
	public function upload_skip(){
		$promoeventid = $this->input->get('promoeventid');
		$this->load->model('units_model');
		$data = $this->units_model->get_promo_event_by_promoeventid($promoeventid);
		$data3 = array('data' => $data);
		
		$this->load->view('add_promo_event_ok-view', $data3);
	}
	
}