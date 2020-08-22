<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('login');
		}
	}

	function index(){
		
		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Administrator/v_data-user');
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$ktp = $this->input->post('ktp');
			$user_create = $this->input->post('user_create');
			$NPWP = $this->input->post('NPWP');
			$CIF = $this->input->post('CIF');
			$full_name = $this->input->post('full_name');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$tlp = $this->input->post('tlp');
			$email = $this->input->post('email');
			$user_role = $this->input->post('user_role');

			$data = array(
				'ktp' => $ktp,
				'user_create' => $user_create,
				'NPWP' => $NPWP,
				'CIF' => $CIF,
				'full_name' => $full_name,
				'username' => $username,
				'password' => $password,
				'tlp' => $tlp,
				'email' => $email,
				'user_role' => $user_role
			);
			// var_dump($data);die();
			$this->M_MasterData->input_admin('tb_user', $data);
		}
		redirect('User');	
	}

	public function update($user_id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'CIF' => $this->input->post('CIF'),
				'full_name' => $this->input->post('full_name'),
				'tlp' => $this->input->post('tlp'),
				'email' => $this->input->post('email')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_admin('tb_user',$data, $user_id);
		} 
		redirect('User');	
	}

	public function delete(){
		
		$user_id['user_id'] = $this->uri->segment(3);
		
		$this->M_MasterData->Delete_admin('tb_user',$user_id);

		redirect('User');	
	}
}