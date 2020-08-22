<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CetakLaporan extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('M_MasterData');
	}
	
	public function index()
	{	
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data = array(
			'laporan' => $this->M_MasterData->search_gadai($tgl_awal,$tgl_akhir)
		);

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar');
		$this->load->view('include/foot');
		$this->load->view('page/Kasir/v_laporan_gadai', $data);
	}

	public function indexadmin()
	{	
		$tgl_awal = $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');
		$data = array(
			'laporan' => $this->M_MasterData->search_gadai($tgl_awal,$tgl_akhir)
		);

		$this->load->view('include/head');
		$this->load->view('include/navbar');
		$this->load->view('include/sidebar-admin-two');
		$this->load->view('include/foot');
		$this->load->view('page/Kasir/v_laporan_gadai', $data);
	}

	public function laporan_pdf(){

		$data = array(
			'laporannasabah'=>$this->M_MasterData->get_lprn()
		);
		
    $this->load->library('pdf');
	    
    $this->pdf->setPaper('A4', 'landscape');
    $this->pdf->filename = "laporan-petanikode.pdf";
    $this->pdf->load_view('laporan_pdf', $data);
	}
}