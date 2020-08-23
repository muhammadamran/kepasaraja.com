<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProdukJudul extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/produkjudul');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA JUDUL PRODUK I
	public function createsatu()
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'opsi' => $this->input->post('opsi'),
			'status' => $this->input->post('status')
		);

		$this->M_Kepasar->input_produk_judul('tb_judul', $data);
		redirect('AdminProdukJudul', $data);
	}

	// INPUT DATA JUDUL PRODUK II
	public function createdua()
	{
		$data = array(
			'judul' => $this->input->post('judul'),
			'status' => $this->input->post('status')
		);

		$this->M_Kepasar->input_produk_judul('tb_judul', $data);
		redirect('AdminProdukJudul', $data);
	}

	// UPDATE JUDUL PRODUK I
	public function updatesatu($id)
	{
		if(isset($_POST['updatesatu']))
		{	
			$data = array(
				'judul' => $this->input->post('judul'),
				'opsi' => $this->input->post('opsi'),
				'status' => $this->input->post('status')
			);
			$this->M_Kepasar->update_produk_judul('tb_judul',$data, $id);
		} 
		redirect('AdminProdukJudul');	
	}

	// UPDATE JUDUL PRODUK II
	public function updatedua($id)
	{
		if(isset($_POST['updatedua']))
		{	
			$data = array(
				'judul' => $this->input->post('judul'),
				'status' => $this->input->post('status')
			);
			$this->M_Kepasar->update_produk_judul('tb_judul',$data, $id);
		} 
		redirect('AdminProdukJudul');	
	}

	// DELETE JUDUL PRODUK
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_Kepasar->DeleteDataProdukJudul('tb_judul',$id);

		redirect('AdminProdukJudul');	
	}
	
}