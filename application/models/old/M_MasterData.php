<?php

class M_MasterData extends CI_Model{

	// Cek Login
    function cek_login($table,$data){      
        $query = $this->db->get_where($table,$data);

        if ($query->num_rows() == 1) {
            return $query->row();
        }else{
            return false;
        }
    }

// ---------------------------------Random----------------------------------------------------------------------------
    public function view_by_date($date){

        $this->db->where('DATE(date_gadai)', $date); // Tambahkan where tanggal nya
        
        return $this->db->get('tb_gadai')->result();// Tampilkan data tb_gadai sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->where('MONTH(date_gadai)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(date_gadai)', $year); // Tambahkan where tahun
        
        return $this->db->get('tb_gadai')->result(); // Tampilkan data tb_gadai sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->where('YEAR(date_gadai)', $year); // Tambahkan where tahun
        
        return $this->db->get('tb_gadai')->result(); // Tampilkan data tb_gadai sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        return $this->db->get('tb_gadai')->result(); // Tampilkan semua data tb_gadai
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(date_gadai) AS tahun'); // Ambil Tahun dari field date_gadai
        $this->db->from('tb_gadai'); // select ke tabel tb_gadai
        $this->db->order_by('YEAR(date_gadai)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(date_gadai)'); // Group berdasarkan tahun pada field date_gadai
        
        return $this->db->get()->result(); // Ambil data pada tabel tb_gadai sesuai kondisi diatas
    }


// ---------------------------------Search----------------------------------------------------------------------------

    // Search Laporan Penerimaan Barang
    function search_gadai($tgl_awal,$tgl_akhir)
    {
        $query=$this->db->query("SELECT * FROM `tb_gadai` WHERE `date_gadai` BETWEEN '$tgl_awal' AND '$tgl_akhir'");
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }else{
            return false;
        }
    }

// ---------------------------------Show----------------------------------------------------------------------------
	// Register Nasabah Or Penaksir
    function get_profile()
    {
        $query=$this->db->from('tb_user')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

    // Laporan Gadai Nasabah
    function get_lprn()
    {
        $query=$this->db->from('tb_gadai')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

    // Gadai Nasabah
    function get_gadai_nasabah()
    {
        $query=$this->db->from('tb_gadai')
        ->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        }else{
            return false;
        }
    }

    // Notif Jatuh Tempo Nasabah
    function get_notif_nasabah()
    {
        $this->db->select('COUNT(jatuh_tempo) AS jat');
        $this->db->from('tb_gadai');
        $this->db->where('DATE(jatuh_tempo) <= DATE(NOW()) AND username="username"');
        $query = $this->db->get();
        return $query->row();
    }

// ---------------------------------Input----------------------------------------------------------------------------
	// Register Nasabah Or Penaksir
    function input_registrasi($table, $data)
    {
        $this->db->insert($table,$data);
    }

    // Input Gadai Nasabah
    function input_gadai($table, $data)
    {
        $this->db->insert($table,$data);
        return TRUE;
    }

    // Input User Admin
    function input_admin($table, $data)
    {
        $this->db->insert($table,$data);
        return TRUE;
    }
    // function input_gadai($data)
    // {
    // $this->db->insert('tb_gadai', $data);
    // }
    
    // Input Promosi
    function input_promo($table, $data)
    {
        $this->db->insert($table,$data);
        return TRUE;
    }

    // Input Promosi Notif
    function input_promo_notif($table, $data)
    {
        $this->db->insert($table,$data);
        return TRUE;
    }
// ---------------------------------Update----------------------------------------------------------------------------
    // Update Profile Nasabah Or Penaksir
    function update_data_user($table,$data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table,$data); 
    }

    // Update Password Nasabah Or Penaksir
    function update_password_user($table,$data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table,$data); 
    }

    // Update Harga Penaksir
    function update_harga_taksir($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Notification
    function update_notification($table,$data,$id_notif)
    {
        $this->db->where('id_notif', $id_notif);
        $this->db->update($table,$data); 
    }

    // Update Pimpinan Approve
    function update_pimpinan_approve($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Pimpinan Decline
    function update_pimpinan_decline($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Nasabah Kirim Barang
    function update_kirim_barang($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Kasir Kirim Uang
    function update_tf_uang($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Kasir Surat
    function update_surat($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Bayar Nasabah
    function update_bayar($table,$data,$id_gadai)
    {
        $this->db->where('id_gadai', $id_gadai);
        $this->db->update($table,$data); 
    }

    // Update Manajer Approve
    function update_Manajer_approve($table,$data,$id_promosi)
    {
        $this->db->where('id_promosi', $id_promosi);
        $this->db->update($table,$data); 
    }

    // Update Manajer Decline
    function update_Manajer_decline($table,$data,$id_promosi)
    {
        $this->db->where('id_promosi', $id_promosi);
        $this->db->update($table,$data); 
    }

    // Update Admin
    function update_admin($table,$data,$user_id)
    {
        $this->db->where('user_id', $user_id);
        $this->db->update($table,$data); 
    }
// ---------------------------------Delete----------------------------------------------------------------------------
    
    // Delete Data User
    function Delete_admin($table,$user_id)
    {
        $this->db->delete($table,$user_id);
    }
}