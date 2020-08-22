<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BarangGadai extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('login');
		}
	}

	function indexnasabah(){

		// $data = array(
		// 	'notifjat'=>$this->M_MasterData->get_notif_nasabah()
		// );

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		// $this->load->view('include/sidebar', $data);
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Nasabah/v_gadai');
	}

	function indexnasabahnotification(){

		// $data = array(
		// 	'notifjat'=>$this->M_MasterData->get_notif_nasabah()
		// );

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		// $this->load->view('include/sidebar', $data);
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Nasabah/notification');
	}

	function indexkasir(){
 		
 		$data = array(
			'vgadainasabah'=>$this->M_MasterData->get_gadai_nasabah()
		);

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Kasir/v_gadai', $data);
	}

	function indexpenaksir(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Penaksir/v_gadai');
	}

	function indexpimpinan(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Pimpinan/v_gadai');
	}

	function indexadministrator(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar-admin-one');
		$this->load->view('include/foot');
		$this->load->view('page/Administrator/v_gadai');
	}

	// INPUT DATA GADAI NASABAH
	public function create()
	{
		$data = array(
			'tipe_barang' => $this->input->post('tipe_barang'),
			'no_gadai' => $this->input->post('no_gadai'),
			'merk_barang' => $this->input->post('merk_barang'),
			'sn_barang' => $this->input->post('sn_barang'),
			'kepemilikan' => $this->input->post('kepemilikan'),
			'spesifikasi_barang' => $this->input->post('spesifikasi_barang'),
			'hargadai' => $this->input->post('hargadai'),
			'jatuh_tempo' => $this->input->post('jatuh_tempo'),
			'date_gadai' => $this->input->post('date_gadai'),
			'status_gadai' => $this->input->post('status_gadai'),
			'user_id' => $this->input->post('user_id'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
		);

		if (!empty($_FILES['uploadbarang']['name'])) {
			$upload = $this->_do_upload();
			$data['uploadbarang'] = $upload;
		}
		$this->M_MasterData->input_gadai('tb_gadai', $data);
		$this->session->flashdata('flash');
		redirect('BarangGadai/indexnasabah', $data);
	}
 
	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/images/user/BuktiBarang/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		// $config['max_widht'] 		= 1000;
		// $config['max_height']  		= 1000;
		$config['encrypt_name'] 	= true;
		
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('uploadbarang')) {
		$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('BarangGadai/indexnasabah');
		}
		return $this->upload->data('file_name');
	}

	// PENAKSIR
	public function taksirgadai($id_gadai)
	{
		if(isset($_POST['taksir']))
		{	
			$data = array(
				'harga_taksiran' => $this->input->post('harga_taksiran'),
				'username_penaksir' => $this->input->post('username_penaksir'),
				'date_taksir' => $this->input->post('date_taksir'),
				'status_gadai' => $this->input->post('status_gadai')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_harga_taksir('tb_gadai',$data, $id_gadai);
		} 
		redirect('BarangGadai/indexpenaksir');
	}

	// UBAH STATUS HIDE NOTIF
	public function hidenotif($id_notif)
	{
			$data = array(
				'is_read' => '1'
			);
			var_dump($data);die();
			$this->M_MasterData->update_notification('tb_notif',$data, $id_notif);
			redirect('BarangGadai/indexnasabahnotification');
	}

	// UBAH STATUS PIMPINAN APPROVE
	public function PimpinanApprove($id_gadai)
	{
		if(isset($_POST['pimpimnanapprove']))
		{	
			$data = array(
				'username_pimpinan' => $this->input->post('username_pimpinan'),
				'date_pimpinan' => $this->input->post('date_pimpinan'),
				'status_gadai' => $this->input->post('status_gadai')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_pimpinan_approve('tb_gadai',$data, $id_gadai);
		} 
		redirect('BarangGadai/indexpimpinan');
	}

	// UBAH STATUS PIMPINAN DECLINE
	public function PimpinanDecline($id_gadai)
	{
		if(isset($_POST['pimpimnandecline']))
		{	
			$data = array(
				'username_pimpinan' => $this->input->post('username_pimpinan'),
				'date_pimpinan' => $this->input->post('date_pimpinan'),
				'status_gadai' => $this->input->post('status_gadai'),
				'harga_taksiran' => $this->input->post('harga_taksiran')
				
			);
			// var_dump($data);die();
			$this->M_MasterData->update_pimpinan_decline('tb_gadai',$data, $id_gadai);
		} 
		redirect('BarangGadai/indexpimpinan');
	}

    // UPLOAD BUKTI KIRIM BARANG
	public function uploadfile($id_gadai){

  //       $config['upload_path']="assets/images/user/BuktiKirimBarang/";
		// $config['allowed_types']='pdf|jpg|png';
		// $config['max_size'] = '10000';
  //       $config['encrypt_name'] = TRUE;
         
        // $this->load->library('upload',$config);
        // if($this->upload->do_upload("kirimbarang")){
        //     $file = $this->upload->data();
			
			// $bukti= $file['file_name'];
            $date_kirim = $this->input->post('date_kirim');
			$noresi = $this->input->post('noresi');
            $jp = $this->input->post('jp');
            $status_kirim = $this->input->post('status_kirim');
			
			$data = array(
				'kirimbarang' => $bukti,
				'date_kirim' => $date_kirim,
				'noresi' => $noresi,
				'jp' => $jp,
				'status_kirim' => $status_kirim
			);
             // var_dump($data);exit
			$result= $this->M_MasterData->update_kirim_barang('tb_gadai',$data, $id_gadai);
  //           echo json_decode($result);
		// }
		redirect('BarangGadai/indexnasabah');
     }

 	// UPLOAD BUKTI KIRIM UANG
	public function uploadfiletf($id_gadai){

        $config['upload_path']="assets/images/user/BuktiTransferKasir/";
		$config['allowed_types']='pdf|jpg|png';
		$config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("upload_tf")){
            $file = $this->upload->data();
			
			$bukti= $file['file_name'];
            $tf_uang = $this->input->post('tf_uang');
			$noresi = $this->input->post('noresi');
            $date_tf = $this->input->post('date_tf');
			$status_kirim = $this->input->post('status_kirim');
			
			$data = array(
				'upload_tf' => $bukti,
				'tf_uang' => $tf_uang,
				'date_tf' => $date_tf,
				'status_kirim' => $status_kirim
			);
             
			$result= $this->M_MasterData->update_tf_uang('tb_gadai',$data, $id_gadai);
            echo json_decode($result);
		}
		redirect('BarangGadai/indexkasir');
    }

    // UPLOAD SURAT GADAI
	public function uploadfilesurat($id_gadai){

        $config['upload_path']="assets/images/user/BuktiSuratGadai/";
		$config['allowed_types']='pdf|jpg|png';
		$config['max_size'] = '10000';
        $config['encrypt_name'] = TRUE;
         
        $this->load->library('upload',$config);
        if($this->upload->do_upload("surat_gadai")){
            $file = $this->upload->data();
			
			$bukti= $file['file_name'];
			
			$data = array(
				'surat_gadai' => $bukti
			);
             
			$result= $this->M_MasterData->update_surat('tb_gadai',$data, $id_gadai);
            echo json_decode($result);
		}
		redirect('BarangGadai/indexkasir');
    }

    public function bayar($id_gadai){

  //       $config['upload_path']="assets/images/user/BuktiPelunasan/";
		// $config['allowed_types']='pdf|jpg|png';
		// $config['max_size'] = '10000';
  //       $config['encrypt_name'] = TRUE;
         
  //       $this->load->library('upload',$config);
  //       if($this->upload->do_upload("bukti_lunas")){
  //           $file = $this->upload->data();
			
			$bukti_lunas= $this->input->post('bukti_lunas');
			$date_lunas = $this->input->post('date_lunas');
            $pembayaran = $this->input->post('pembayaran');
			$kode_promo = $this->input->post('kode_promo');
			$lunas = $this->input->post('lunas');
			$kode_promo1 = $this->input->post('kode_promo1');
			
			$data = array(
				'bukti_lunas' => $bukti_lunas,
				'date_lunas' => $date_lunas,
				'pembayaran' => $pembayaran,
				'kode_promo' => $kode_promo,
				'lunas' => $lunas,
				'kode_promo1' => $kode_promo1
			);
             
			$result= $this->M_MasterData->update_bayar('tb_gadai',$data, $id_gadai);
  //           echo json_decode($result);
		// }
		redirect('BarangGadai/indexnasabah');
    }
}