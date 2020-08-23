<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHome extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}

	function index(){
		$this->load->view('admin/include/head');
		$this->load->view('admin/index');
		$this->load->view('admin/include/footer');
		$this->load->view('admin/include/thirdparty');
	}

	public function update($user_id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
				'jenis_kelamin' => $this->input->post('jenis_kelamin')		
			);
			$this->M_Kepasar->update_user('tb_user',$data, $user_id);
		} 
		redirect('AdminHome');	
	}

	public function updatefoto($id_user){

		$config['upload_path']="template/assets/images/user/";
		$config['allowed_types']='pdf|jpg|png|jpeg';
		$config['max_size'] = '10000';
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload',$config);
		if($this->upload->do_upload("foto")){
			$file = $this->upload->data();
			
			$bukti= $file['file_name'];
			
			$data = array(
				'foto' => $bukti
			);

			$result= $this->M_Kepasar->update_user('tb_user',$data, $id_user);
			echo json_decode($result);
		}
		redirect('AdminHome');
	}

	public function changepassword($user_id)
	{
		if(isset($_POST['updatepass']))
		{	
			$data = array(
				'password' => md5($this->input->post('password'))
			);
			$this->M_Kepasar->update_user('tb_user',$data, $user_id);
		} 
		redirect('AdminLogin');	
	}
}