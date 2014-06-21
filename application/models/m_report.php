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
}
