<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminLogin extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_Kepasar');
	}

	function index(){
		$this->load->view('admin/login');
	}

	function aksi_login(){
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$data = array(
				'username' => $username,
				'password' => md5($password)
			);
			$cek = $this->M_Kepasar->cek_login('tb_user',$data);
			if(@$cek){

				$data_session = array(
					'user_id' => $cek->user_id,
					'username' => $username,
					'password' => $password,
					'foto' => $cek->foto,
					'fullname' => $cek->fullname,
					'email' => $cek->email,
					'jenis_kelamin' => $cek->jenis_kelamin,
					'date_make' => $cek->date_make,
					'status' => "login",
					'role' => $cek->role
				);

				$this->session->set_userdata($data_session);
				redirect('AdminHome');
			}else{
				$this->load->view('404');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('AdmninLogin');
	}
}