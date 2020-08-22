<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Promosi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('login');
		}
	}

	function indexnasabah(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Nasabah/v_promosi');
	}

	function indexbudgeting(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Budgeting/v_promosi');
	}

	function indexmanajer(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Manajer/v_promosi');
	}

	function indexadministrator(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Manajer/v_promosi');
	}

	// INPUT DATA PROMO
	public function create()
	{
		$data = array(
			'tipe_promo' => $this->input->post('tipe_promo'),
			'title_promosi' => $this->input->post('title_promosi'),
			'deskripsi' => $this->input->post('deskripsi'),
			'create_date' => $this->input->post('create_date'),
			'expired_date' => $this->input->post('expired_date'),
			'kode_promo' => $this->input->post('kode_promo'),		
			'anggaran' => $this->input->post('anggaran')		
		);

		if (!empty($_FILES['uploadpromo']['name'])) {
			$upload = $this->_do_upload();
			$data['uploadpromo'] = $upload;
		}

		$this->M_MasterData->input_promo('tb_promosi', $data);
		$this->session->flashdata('flash');
		redirect('Promosi/indexbudgeting', $data);
	}
 
	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/images/user/Promosi/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		// $config['max_widht'] 		= 1000;
		// $config['max_height']  		= 1000;
		$config['encrypt_name'] 	= true;
		
 
		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('uploadpromo')) {
		$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('Promosi/indexbudgeting');
		}
		return $this->upload->data('file_name');
	}

	// UBAH STATUS Manajer APPROVE
	public function ManajerApprove($id_promosi)
	{
		if(isset($_POST['approve']))
		{	
			$data = array(
				'action' => $this->input->post('action')
			);
			$data2 = array(
					'title'   	 => $this->input->post('title_promosi'),
					'message' 	 => $this->input->post('deskripsi'),
					'is_read' 	 => '0',
					'created_at' => $this->input->post('create_date')
				);
				// var_dump($data);die();
			$this->M_MasterData->input_promo_notif('tb_notif', $data2);
			// var_dump($data);die();
			$this->M_MasterData->update_Manajer_approve('tb_promosi',$data, $id_promosi);
		} 
		redirect('Promosi/indexmanajer');
	}

	// UBAH STATUS Manajer DECLINE
	public function ManajerDecline($id_promosi)
	{
		if(isset($_POST['decline']))
		{	
			$data = array(
				'action' => $this->input->post('action')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_Manajer_decline('tb_promosi',$data, $id_promosi);
		} 
		redirect('Promosi/indexmanajer');
	}
}