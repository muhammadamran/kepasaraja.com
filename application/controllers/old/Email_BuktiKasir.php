<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_BuktiKasir extends CI_Controller {

    public function index()
    {
      // Konfigurasi email
        $config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'smtpgratisemail@gmail.com',
		    'smtp_pass' => 'SMTPGratis-99',
		    'mailtype'  => 'html',
		    'charset'   => 'iso-8859-1'
		);

		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");

		// Set to, from, message, etc.
		        
		$result = $this->email->send();

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('no-reply@pegadaian.com', 'Kasir Pegadaian Bukti Transfer & Surat Gadai');

        // Email penerima
        $this->email->to($this->input->post("email")); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Info Kasir Pegadaian | Aplikasi Pegadaian Customer Fokus');

        // Isi email
        $this->email->message('<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>Bukti Transfer & Surat Gadai!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Email Reminder Bukti Transfer & Surat Gadai!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, <span style="font-weight:600">'.$this->input->post("username").'</span></p><p style="text-align: center;font-size: 14px;">Email ini berfungsi untuk memberitahu Anda bahwa Bukti transfer dan Surat Gadai tealah dikirim, pada tanggal <b>'.$this->input->post("date_tf").'</b> Dengan Nominal Transfer sebesar <b>Rp.'.$this->input->post("tf_uang").'</b>.</p><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-pegadaian-customer-focus/index.php" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Aktivitas</a></p></div></body></html>
    	');

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
        redirect('BarangGadai/indexkasir');
    }
}