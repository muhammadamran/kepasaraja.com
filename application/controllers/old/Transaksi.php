<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

		if($this->session->userdata('status') != 'login'){
			redirect('login');
		}
	}

	function indexnasabah(){

		// $data = array(
		// 	'v_notif'=>$this->M_MasterData->get_notif_nasabah()
		// );

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Nasabah/v_transaksi');
	}

	function indexadministrator(){
		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Administrator/v_jatuh_tempo');
	}

	function indexkasir(){
		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Administrator/v_jatuh_tempo');
	}
}