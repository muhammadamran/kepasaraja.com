<?php

class M_Kepasar extends CI_Model{

    public function option_tahun(){
        $this->db->select('YEAR(date_gadai) AS tahun'); // Ambil Tahun dari field date_gadai
        $this->db->from('tb_gadai'); // select ke tabel tb_gadai
        $this->db->order_by('YEAR(date_gadai)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date_gadai)'); // Group berdasarkan tahun pada field date_gadai
        
        return $this->db->get()->result(); // Ambil data pada tabel tb_gadai sesuai kondisi diatas
    }



}