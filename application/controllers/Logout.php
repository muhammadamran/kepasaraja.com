<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller {

	function __construct(){
		parent::__construct();

		if($this->session->userdata('status') != 'login'){
			redirect('AdminLogin');
		}
	}
	public function index()
	{
		$this->load->view('admin/include/head');
		$this->load->view('admin/login');
		$this->load->view('admin/include/thirdparty');
	}
}