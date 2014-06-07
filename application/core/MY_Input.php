<?php
    class MY_Input extends CI_Input
    {
    	function save_query($qarray)
		{
			$CI =& get_instance(); 
			
			$CI->db->insert('search_query', array('query' => http_build_query($qarray)));
		
			return $CI->db->insert_id();
		}
		
		function load_query($qid)
		{
			$CI =& get_instance(); 
			
			$rows = $CI->db->get_where('search_query', array('id' => $qid))->result();
			
			if(isset($rows[0]))
			{
				parse_str($rows[0]->query, $_GET);
			}
		
			return $CI->db->insert_id();
		}
    }