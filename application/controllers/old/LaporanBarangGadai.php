<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LaporanBarangGadai extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('login');
		}
	}

	function indexkasir(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Kasir/v_lapooran');
	}

	function laporangadai(){

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Kasir/v_lapooran_gadai');
	}
}

