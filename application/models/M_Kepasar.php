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

/////////////////////UPDATE//////////////////////////
	function update_user($table,$data,$user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update($table,$data); 
	}

}