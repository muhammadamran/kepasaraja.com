<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminProfile extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/profile');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	// INPUT DATA PROFILE
	public function create()
	{
		$data = array(
			'title_head' => $this->input->post('title_head'),
			'mail' => $this->input->post('mail'),
			'slogan' => $this->input->post('slogan'),
			'facebook' => $this->input->post('facebook'),
			'twitter' => $this->input->post('twitter'),
			'linkendin' => $this->input->post('linkendin'),
			'instagram' => $this->input->post('instagram'),
			'telepone' => $this->input->post('telepone'),
			'pesan' => $this->input->post('pesan'),
			'alamat' => $this->input->post('alamat')
		);

		if (!empty($_FILES['icon']['name'])) {
			$upload = $this->_do_upload();
			$data['icon'] = $upload;
		}
		$this->M_Kepasar->input_profile('tb_profile', $data);
		redirect('AdminProfile', $data);
	}

	private function _do_upload()
	{
		$config['upload_path'] 		= 'assets/img/logo/';
		$config['allowed_types'] 	= 'jpeg|jpg|png|pdf';
		$config['max_size'] 		= 2000;
		$config['encrypt_name'] 	= true;
		

		$this->load->library('upload', $config);
		if (!$this->upload->do_upload('icon')) {
			$this->session->flashdata('flash', $this->upload->display_errors('',''));
			redirect('AdminProfile');
		}
		return $this->upload->data('file_name');
	}

	// UPDATE PROFILE
	public function update($id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'title_head' => $this->input->post('title_head'),
				'mail' => $this->input->post('mail'),
				'slogan' => $this->input->post('slogan'),
				'facebook' => $this->input->post('facebook'),
				'twitter' => $this->input->post('twitter'),
				'linkendin' => $this->input->post('linkendin'),
				'instagram' => $this->input->post('instagram'),
				'telepone' => $this->input->post('telepone'),
				'pesan' => $this->input->post('pesan'),
				'alamat' => $this->input->post('alamat')
			);
			$this->M_Kepasar->update_profile('tb_profile',$data, $id);
		} 
		redirect('AdminProfile');	
	}

	// UPDATE ICON
	public function updateicon($id){

		$config['upload_path']="assets/img/logo/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("icon")){
			$file = $this->upload->data();
			
			$gambaricon= $file['file_name'];
			
			$data = array(
				'icon' => $gambaricon
			);

			$result= $this->M_Kepasar->update_profile('tb_profile',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminProfile');
	}

	// UPDATE LOGO
	public function updatelogo($id){

		$config['upload_path']="assets/img/brand/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("logo")){
			$file = $this->upload->data();
			
			$gambarlogo= $file['file_name'];
			
			$data = array(
				'logo' => $gambarlogo
			);

			$result= $this->M_Kepasar->update_profile('tb_profile',$data, $id);
			echo json_decode($result);
		}
		redirect('AdminProfile');
	}

	// DELETE PROFILE
	public function delete(){
		
		$id['id'] = $this->uri->segment(3);
		
		$this->M_Kepasar->DeleteDataProfile('tb_profile',$id);

		redirect('AdminProfile');	
	}
	
}