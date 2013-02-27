<?php

class Foursquare_model extends CI_Model {
	
	function __construct() {
		parent::__construct();
	}
	
	function get_venues($category_id) {
		$userInfo['lat'] = 14.676041;
		$userInfo['long'] = 121.0437;
		$url = $this->get_URL($category_id, $userInfo);
		
		$curlhandle = curl_init();
		curl_setopt($curlhandle, CURLOPT_URL, $url);
		curl_setopt($curlhandle, CURLOPT_PROXY, "superproxy.upd.edu.ph:8080");
		curl_setopt($curlhandle, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($curlhandle, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($curlhandle, CURLOPT_RETURNTRANSFER, TRUE);
		
		$response = curl_exec($curlhandle);
		$json = json_decode($response);
		$res['res'] = $json;
		
		return $res;
	}
	
	function get_query($category_id) {
		//fetch keywords from keywords table with categoryid = ...
		//concatenate keywords separated by ','
		//return as query
		
		$this->db->where('categoryid',$category_id);
		$result = $this->db->get('keywords');
		
		$query = 'donut,chicken';
		return $query;
	}
	
	function make_URL($data) {
		$url = "https://api.foursquare.com/v2/venues/search?ll=".$data['lat'].",".$data['long']."&radius=".$data['radius']."&query=".$data['query']."&categoryId=".$data['categoryid']."&client_id=".$data['client_id']."&client_secret=".$data['client_secret']."&v=20130127";
		return $url;
	}
	
	function get_URL($category_id,$userInfo) {
		$data['lat'] = $userInfo['lat'];
		$data['long'] = $userInfo['long'];
		$data['radius'] = 2000;
		$data['client_id'] = 'UTPIKM2JG0FWXKTYLBVBF5545FOMEQ03EHCXAP2WBCMZLL1N';
		$data['client_secret'] = 'MWC2ETPU3ED5QDKUMUSF3YORKO5GM4YYZ1R1NH2L11B5ONIX';
		
		switch($category_id) {
			//food and restaurants
			case 1: $data['categoryid'] = '4d4b7105d754a06374d81259,4bf58dd8d48988d1f9941735';
					$data['query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//clothing and fashion
			case 2: $data['$categoryid'] = '4bf58dd8d48988d103951735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//beauty and spa
			case 3: $data['$categoryid'] = '4bf58dd8d48988d110951735,4bf58dd8d48988d1ed941735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//arts & entertainment
			case 4: $data['$categoryid'] = '4d4b7104d754a06370d81259';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//hotels & resorts
			case 5: $data['$categoryid'] = '4bf58dd8d48988d1fa931735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//nightlife
			case 6: $data['$categoryid'] = '4d4b7105d754a06376d81259';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//sports
			case 7: $data['$categoryid'] = '4bf58dd8d48988d184941735,4f4528bc4b90abdf24c9de85,4bf58dd8d48988d1f2941735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//schools
			case 8: $data['$categoryid'] = '4d4b7105d754a06372d81259,4bf58dd8d48988d13b941735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
			//hospitals
			case 9: $data['$categoryid'] = '4bf58dd8d48988d104941735';
					$data['$query'] = $this->get_query($category_id);
					$url = $this->make_URL($data);
					return $url;
					
		};
		
		return $res;
	}
	
}