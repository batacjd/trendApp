<?php

class Recommendations_model extends CI_Model{
	
	function __construct(){
		parent::__construct();
	}
	
	public function update_recommendation_ratings($unitid,$userid) {
		//get all of the user's rating pairs
		$sql = 'select distinct r.unitid, r2.rating - r.rating as ratingdifference
		from ratings r, ratings r2
		where r.userid = \''.$userid.'\'
		and r2.unitid = \''.$unitid.'\'
		and r2.userid = \''.$userid.'\'';
	
		$result = $this->db->query($sql);
	
		$res = $result->result_array();
	
		foreach($res as $r) {
			$other_unit = $r['unitid'];
			$rating_diff = $r['ratingdifference'];
			
			//if pair is in table, update 2 rows (x,y) (y,x)
			$sql2 = 'select unit_x from unitpairs
						where unit_x = \''.$unitid.'\' and unit_y = \''.$other_unit.'\'';
			$result2 = $this->db->query($sql2);
			if( count($result2->result_array()) > 0){
				$sql3 = 'update unitpairs set count = count+1,
							sum = sum+\''.$rating_diff.'\'
							where unit_x = \''.$other_unit.'\' and unit_y = \''.$unitid.'\'';
				$this->db->query($sql3);
			} //else insert 2 rows in unitpairs table
			else{
				$sql4 = 'insert into unitpairs values (\''.$other_unit.'\', \''.$unitid.'\', 1, \''.-$rating_diff.'\')';
				$this->db->query($sql4);
			}
		}
	}
	
	function predict_best($userid){
		$sql = 'select * from units u, (select p.unit_x, sum(p.sum + p.count*r.rating)/sum(p.count) as average
		from ratings r, unitpairs p
		where r.userid = \''.$userid.'\' and p.unit_x <> r.unitid and p.unit_y = r.unitid
		and exists ( select unitid from ratings where userid = \''.$userid.'\')
		group by p.unit_x order by average desc) as list where u.unitid = list.unit_x';
		$result = $this->db->query($sql);
		return $result->result_array();
	}
	
}