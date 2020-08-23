<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProdukHargaSatu extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/produkhargasatu');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA PROFILE
	public function create()
	{
		$data = array(
			'nama_produk' => $this->input->post('nama_produk'),
			'harga_produk' => $this->input->post('harga_produk'),
			'status_produk' => $this->input->post('status_produk'),
			'date_harga' => $this->input->post('date_harga')
		);

		if (!empty($_FILES['gambar_produk']['name'])) {
			$upload = $this->_do_upload();
			$data['gambar_produk'] = $upload;
		}
		$this->M_Kepasar->input_produk_harga('tb_produk', $data);
		redirect('AdminProdukHargaSatu', $data);
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/img/produk/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar_produk')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminProdukHargaSatu');
		}
		return $this->upload->data('file_name');
	}

	// UPDATE PROFILE
	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'nama_produk' => $this->input->post('nama_produk'),
				'harga_produk' => $this->input->post('harga_produk'),
				'status_produk' => $this->input->post('status_produk'),
				'date_harga' => $this->input->post('date_harga')
			);
			$this->M_Kepasar->update_produk_harga('tb_produk',$data, $id);
		} 
		redirect('AdminProdukHargaSatu');	
	}

	// UPDATE LOGO
	public function updategambar($id){

		$config['upload_path']="assets/img/produk/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("gambar_produk")){
			$file = $this->upload->data();
			
			$gambar= $file['file_name'];
			
			$data = array(
				'gambar_produk' => $gambar
			);

			$result= $this->M_Kepasar->update_produk_harga('tb_produk',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminProdukHargaSatu');
	}

	// DELETE PROFILE
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_Kepasar->DeleteDataProdukHarga('tb_produk',$id);

		redirect('AdminProdukHargaSatu');	
	}
	
}