<?php

class M_advertisement_delivery extends CI_Model {
	
	public function get_category_name($id){
		$result = $this->db->query("SELECT name	FROM category	WHERE id = '{$id}'");
		return $result->result();
	}
	
	public function get_subcategory_name($id){
		$result = $this->db->query("SELECT name	FROM subcategory	WHERE id = '{$id}'");
		return $result->result();
	}
}