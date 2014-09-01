<?php

class M_permissions extends CI_Model{
	
	public function get_all_functions(){
		$query = "SELECT * FROM permission ";
							
		$result = $this->db->query($query);
		return $result->result();
	}
<<<<<<< HEAD
=======
	
	public function insert_permissions($arr){
		
		$query1 = "SELECT * FROM permission";
		
		for ($i=0; $i <= 4 ; $i++) { 
		//	$user_specific_table = array(
			//				'normal'=>$arr[i][0],
				//			'business'=>$arr[i][0],
					//		'admin'=>$arr[i][0],
						//	'unregistered'=>$arr[i][0]);
						
			$pid = $i+1;
			$query = 'INSERT INTO permissions (normal, business, admin, unregistered) VALUES (\''.$arr[i][0].'\', \''.$arr[i][1].'\', \''.$arr[i][2].'\', \''.$arr[i][3].'\')
			WHERE pid=\''.$pid.'\'';
	
		}
		
	}
>>>>>>> 75d2927bebb2f258ca38e6942d642981affa75bf
}