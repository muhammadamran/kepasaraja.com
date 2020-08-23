<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProdukKategori extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/produkkategori');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA PROFILE
	public function create()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama_kategori')
		);

		if (!empty($_FILES['gambar_kategori']['name'])) {
			$upload = $this->_do_upload();
			$data['gambar_kategori'] = $upload;
		}
		$this->M_Kepasar->input_produk_kategori('tb_kategori', $data);
		redirect('AdminProdukKategori', $data);
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/img/kategori/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('gambar_kategori')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminProdukKategori');
		}
		return $this->upload->data('file_name');
	}

	// UPDATE PROFILE
	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'nama_kategori' => $this->input->post('nama_kategori')
			);
			$this->M_Kepasar->update_produk_kategori('tb_kategori',$data, $id);
		} 
		redirect('AdminProdukKategori');	
	}

	// UPDATE LOGO
	public function updategambar($id){

		$config['upload_path']="assets/img/kategori/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("gambar_kategori")){
			$file = $this->upload->data();
			
			$gambar= $file['file_name'];
			
			$data = array(
				'gambar_kategori' => $gambar
			);

			$result= $this->M_Kepasar->update_produk_kategori('tb_kategori',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminProdukKategori');
	}

	// DELETE PROFILE
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_Kepasar->DeleteDataProdukKategori('tb_kategori',$id);

		redirect('AdminProdukKategori');	
	}
	
}