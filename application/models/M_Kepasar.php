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

/////////////////////INSERT//////////////////////////
	function input_user($table, $data)
	{
		$this->db->insert($table,$data);
	}

	function input_profile($table, $data)
	{
		$this->db->insert($table,$data);
	}

	function input_produk_kategori($table, $data)
	{
		$this->db->insert($table,$data);
	}

/////////////////////UPDATE//////////////////////////
	function update_user($table,$data,$user_id)
	{
		$this->db->where('user_id', $user_id);
		$this->db->update($table,$data); 
	}

	function update_profile($table,$data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update($table,$data); 
	}

	function update_produk_kategori($table,$data,$id)
	{
		$this->db->where('id', $id);
		$this->db->update($table,$data); 
	}

/////////////////////DELETE//////////////////////////
	function DeleteDataProfile($table,$id)
	{
		$this->db->delete($table,$id);
	}

	function DeleteDataProdukKategori($table,$id)
	{
		$this->db->delete($table,$id);
	}
}