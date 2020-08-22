<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class TransaksiCetak extends CI_Controller {
  
    function __construct(){
        parent::__construct();
        $this->load->model('M_MasterData');
    }
  
    public function index(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $url_cetak = 'TransaksiCetak/cetak?filter=1&tahun='.$tgl;
                $transaksi = $this->M_MasterData->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di M_MasterData
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $url_cetak = 'TransaksiCetak/cetak?filter=2&bulan='.$bulan.'&tahun='.$tahun;
                $transaksi = $this->M_MasterData->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_MasterData
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $url_cetak = 'TransaksiCetak/cetak?filter=3&tahun='.$tahun;
                $transaksi = $this->M_MasterData->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_MasterData
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $url_cetak = 'TransaksiCetak/cetak';
            $transaksi = $this->M_MasterData->view_all(); // Panggil fungsi view_all yang ada di M_MasterData
        }
        
        $data['ket'] = $ket;
        $data['url_cetak'] = base_url('index.php/'.$url_cetak);
        $data['transaksi'] = $transaksi;
        $data['option_tahun'] = $this->M_MasterData->option_tahun();
        $this->load->view('view', $data);
    }
  
    public function cetak(){
        if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
            $filter = $_GET['filter']; // Ambil data filder yang dipilih user

            if($filter == '1'){ // Jika filter nya 1 (per tanggal)
                $tgl = $_GET['tanggal'];
                
                $ket = 'Data Transaksi Tanggal '.date('d-m-y', strtotime($tgl));
                $transaksi = $this->M_MasterData->view_by_date($tgl); // Panggil fungsi view_by_date yang ada di M_MasterData
            }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
                $bulan = $_GET['bulan'];
                $tahun = $_GET['tahun'];
                $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
                
                $ket = 'Data Transaksi Bulan '.$nama_bulan[$bulan].' '.$tahun;
                $transaksi = $this->M_MasterData->view_by_month($bulan, $tahun); // Panggil fungsi view_by_month yang ada di M_MasterData
            }else{ // Jika filter nya 3 (per tahun)
                $tahun = $_GET['tahun'];
                
                $ket = 'Data Transaksi Tahun '.$tahun;
                $transaksi = $this->M_MasterData->view_by_year($tahun); // Panggil fungsi view_by_year yang ada di M_MasterData
            }
        }else{ // Jika user tidak mengklik tombol tampilkan
            $ket = 'Semua Data Transaksi';
            $transaksi = $this->M_MasterData->view_all(); // Panggil fungsi view_all yang ada di M_MasterData
        }
        
        $data['ket'] = $ket;
        $data['transaksi'] = $transaksi;
        
        ob_start();
        $this->load->view('print', $data);
        $html = ob_get_contents();
        ob_end_clean();
        
        require_once('./assets/html2pdf/html2pdf.class.php');
        $pdf = new HTML2PDF('P','A4','en');
        $pdf->WriteHTML($html);
        $pdf->Output('Data Transaksi.pdf', 'D');
    }
}