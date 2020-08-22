<?php

class M_Kepasar extends CI_Model{

/////////////////////LOGIN//////////////////////////
	// Cek Login
	function cek_login($table,$data){      
		$query = $this->db->get_where($table,$data);

		if ($query->num_rows() == 1) {
			return $query->row();
		}else{
			return false;
		}
	}

}