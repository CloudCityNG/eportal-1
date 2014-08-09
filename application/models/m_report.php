<?php

class M_report extends CI_Model {
	
	public function getAdlist()
	{
		$sql = "SELECT id, title, body, createdate, price, address, email
          FROM advertisement
         ORDER BY createdate";
		
		
		$query = $db->prepare($sql);
		$query->execute();
		$rows = $query->fetchall(PDO::FETCH_ASSOC); 
	//	$result=$this->db->query($sql);
	//	$answer= $result->result();
	
		foreach($rows as $row) {
        echo "<tr>  SELECT id, title, body, createdate, price, address, email
              <td>{$row['id']}</td>
              <td>{$row['title']}</td>
              <td>{$row['body']}</td>
              <td>{$row['createdate']}</td>
              <td>{$row['price']}</td>
              <td>{$row['address']}</td>
              <td>{$row['email']}</td></tr>";
	}
	
}
	
	public function get_current_month_all_ad(){
		$query = "SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c
					WHERE (expired=0 AND approved=1 AND a.categoryid=c.id) OR (expired=0 AND approved=1 AND a.categoryid=0)";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	
	public function get_current_month_reported_ad(){
		$query = "SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c, reported_ads r
					WHERE a.id=r.reported_adid AND ((expired=0 AND approved=1 AND a.categoryid=c.id) OR (expired=0 AND approved=1 AND a.categoryid=0))";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_current_month_highest_ad(){
		$query = "SELECT r.rate, a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c, rating r
					WHERE (a.id=r.adid AND expired=0 AND approved=1 AND a.categoryid=c.id) OR (a.id=r.adid AND expired=0 AND approved=1 AND a.categoryid=0)
					ORDER BY r.rate DESC";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_current_al_users(){
		$query = "SELECT u.username, u.usertype, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM users u, user_details d
					WHERE u.username=d.username and datediff(CURRENT_TIMESTAMP,u.registered_datenadtime)<=30";
							
		$result = $this->db->query($query);
		return $result->result();
}

	public function get_current_busi_users(){
		$query = "SELECT b.username, b.bname, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM business_users b, user_details d, users u
					WHERE b.username=d.username AND d.username=u.username and datediff(CURRENT_TIMESTAMP,u.registered_datenadtime)<=30";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_current_nor_users(){
		$query = "SELECT n.username, n.fname, n.lname, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM normal_users n, user_details d, users u
					WHERE n.username=d.username AND d.username=u.username and datediff(CURRENT_TIMESTAMP,u.registered_datenadtime)<=30";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_given_time_all_ad($category,$province,$district,$startdate,$enddate){
		if($category == 1){
		//all advertisements
		$query = 'SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c
					WHERE (createdate between \''.$startdate.'\' AND \''.$enddate.'\') AND (a.provinceid=\''.$province.'\' AND a.districtid=\''.$district.'\') AND ((expired=0 AND approved=1 AND a.categoryid=c.id) OR (expired=0 AND approved=1 AND a.categoryid=0))';
		}
		
		elseif($category == 2){
			$query = 'SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c, reported_ads r
					WHERE (createdate between \''.$startdate.'\' AND \''.$enddate.'\') AND (a.provinceid=\''.$province.'\' AND a.districtid=\''.$district.'\') AND a.id=r.reported_adid AND ((expired=0 AND approved=1 AND a.categoryid=c.id) OR (expired=0 AND approved=1 AND a.categoryid=0))';
					
		}
		
		elseif($category == 3){
			$query = 'SELECT r.rate, a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c, rating r
					WHERE (createdate between \''.$startdate.'\' AND \''.$enddate.'\') AND (a.provinceid=\''.$province.'\' AND a.districtid=\''.$district.'\') AND ((a.id=r.adid AND expired=0 AND approved=1 AND a.categoryid=c.id) OR (a.id=r.adid AND expired=0 AND approved=1 AND a.categoryid=0))
					ORDER BY r.rate DESC';
		
		}
	
		else{
			$query = 'SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM advertisement a, category c
					WHERE (createdate between \''.$startdate.'\' AND \''.$enddate.'\') AND (a.provinceid=\''.$province.'\' AND a.districtid=\''.$district.'\') AND ((expired=0 AND approved=1 AND a.categoryid=c.id) OR (expired=0 AND approved=1 AND a.categoryid=0))';
		
		}
		
	//	echo $province;
	//echo $district;
		//	echo $enddate;
							
		$result = $this->db->query($query);
		return $result->result();
	}

	public function get_given_time_all_users($category,$startdate,$enddate){
		if($category == 1 || $category == 0){
		//all students
		$query = 'SELECT u.username, u.usertype, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM users u, user_details d
					WHERE u.username=d.username AND (u.registered_datenadtime between \''.$startdate.'\' AND \''.$enddate.'\')';
		}
		
		elseif($category == 2){
			$query = 'SELECT b.username, b.bname, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM business_users b, user_details d, users u
					WHERE b.username=d.username AND d.username=u.username AND (u.registered_datenadtime between \''.$startdate.'\' AND \''.$enddate.'\')';
		}
		
		elseif($category == 3){
			$query = 'SELECT n.username, n.fname, n.lname, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM normal_users n, user_details d, users u
					WHERE n.username=d.username AND d.username=u.username AND (u.registered_datenadtime between \''.$startdate.'\' AND \''.$enddate.'\')';
		
		}
	
		else{
			
		}
		
	//	echo $province;
	//echo $district;
		//	echo $enddate;
							
		$result = $this->db->query($query);
		return $result->result();
	}
}