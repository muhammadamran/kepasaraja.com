<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');
	}

	function index(){
		$this->load->view('login');
	}

	function aksi_login(){
		if (isset($_POST['submit'])) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			// var_dump($username,$password);die();
			$data = array(
				'username' => $username,
				'password' => $password
			);
			$cek = $this->M_MasterData->cek_login('tb_user',$data);
			if(@$cek){

				$data_session = array(
					'user' => $cek->user_id,
					'foto' => $cek->foto,
					'fullname' => $cek->full_name,
					'cif' => $cek->CIF,
					'email' => $cek->email,
					'tlp' => $cek->tlp,
					'alamat' => $cek->alamat,
					'nama' => $username,
					'status' => "login",
					'role' => $cek->user_role

				);

				$this->session->set_userdata($data_session);

				redirect('home');

			}else{
				$this->load->view('404');
			}
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}
}