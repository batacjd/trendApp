<?php 

class Units_model extends CI_Model {
	
	function __construct(){
		parent::__construct();
	}
	
	public function get_unitid_by_venueid($id){
		//Get unitid using venueid.
		$sql = 'select unitid from units where venueid=\''.$id.'\'';
		$result = $this->db->query($sql);
		
		return $result->result_array();
	}
	
	public function get_unit_rating_by_venueid($id){
		$sql = 'select rating from units where venueid=\''.$id.'\'';
		$result = $this->db->query($sql);
		
		return $result->result_array();
	}
	
	public function insert_unit($data){
		//Insert unit to units table
		$insertUnit = array(
			'unitname' => $data['name'],
			'categoryid' =>$data['icon'],
			'unittypeid' => 1,
			'lat' => $data['lat'],
			'lng' => $data['lng'],
			'venueid' => $data['id'],
			'address' => $data['address'],
		);
		$this->db->insert('units', $insertUnit);
	}
	
	public function insert_unit_promo_event($data){
		//Insert promo and event to units table
		$insertPE = array(
			'promoeventname' => $data['name'],
			'unitid' =>$data['unitid'],
			'unittypeid' => $data['unittypeid'],
			'superuserid' => $this->session->userdata('superuserid'),
			'startdate' => $data['startdate'],
			'enddate' => $data['enddate'],
			'mechanics' => $data['mechanics']
		);
		$this->db->insert('promoevents', $insertPE);
	}
	
	public function get_ratings_by_unitid($unitid) {
		//Get the ratings by unitid
		$sql = 'select rating from ratings where unitid=\''.$unitid.'\'';
		$result = $this->db->query($sql);
		
		return $result->result_array();
	}
	
	public function insert_rating($rating,$unitid){
		
		//Get userid from session
		$userid = $this->session->userdata('userid');
		$sql = 'select ratingid from ratings where unitid=\''.$unitid.'\' and userid=\''.$userid.'\'';
		$result = $this->db->query($sql);
		
		if (count($result->result_array()) > 0) {
			//User has rated before. Change his rating
			$sql = 'update ratings set rating = \''.$rating.'\' where unitid = \''.$unitid.'\' and userid = \''.$userid.'\'';
			$this->db->query($sql, array($rating,$unitid,$userid));
		}else {
			//User hasn't rated the venue yet. Insert it to ratings table
			$sql = 'insert into ratings(unitid,userid,rating) values(\''.$unitid.'\',\''.$userid.'\',\''.$rating.'\')';
			$this->db->query($sql);
		}
		
		//Update the ratings of the unit
		//Get the ratings for a certain unit
		$all_ratings = $this->get_ratings_by_unitid($unitid);
		
		//Compute the average of the ratings
		$all_ratings_sum = 0;
		$all_ratings_count = 0;
		foreach($all_ratings as $all_r){
			$all_ratings_sum = $all_ratings_sum + $all_r['rating'];
			$all_ratings_count++;
		}
		$ave_rating = $all_ratings_sum / $all_ratings_count;
		
		//Update the ratings of the unit with the average of its ratings
		$sql = 'update units set rating = \''.$ave_rating.'\' where unitid = \''.$unitid.'\'';
		$this->db->query($sql);
		
	}
	
}