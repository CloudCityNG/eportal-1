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
	
	public function get_current_reported_ad(){
		$query = "SELECT a.title, a.body, c.name, a.subcategoryid,	a.districtid,	a.provinceid,	a.featured, a.createdate, a.duration, a.username, a.price 
					FROM reported_ads a, category c
					WHERE (a.categoryid=c.id) OR (AND a.categoryid=0)";
							
		$result = $this->db->query($query);
		return $result->result();
	}
	
	public function get_current_al_users(){
		$query = "SELECT u.username, u.usertype, d.description ,u.registered_datenadtime, d.provinceid, d.districtid
					FROM users u, user_details d
					WHERE u.username=d.username";
							
		$result = $this->db->query($query);
		return $result->result();
}
}