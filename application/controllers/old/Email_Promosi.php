<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_Promosi extends CI_Controller {

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
        $this->email->from('no-reply@pegadaian.com', 'Promo Pegadaian');

        // Email penerima
        $mails = $this->input->post('email');
        $this->email->to(implode(', ', $mails)); // Ganti dengan email tujuan
        
        // $to_email = $this->input->post('email');
        // $to_mail = explode(',', $to_email);
        
        // Email penerima
        // $this->email->to($this->input->post("email")); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

        // Subject email
        $this->email->subject('Promo Pegadaian | Aplikasi Pegadaian Customer Fokus');

        // Isi email
        $this->email->message('<!DOCTYPE html><html lang="en"><head> <meta charset="utf-8"/> <title>Promo Pegadaian!</title> <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport"/> <meta content="" name="description"/> <meta content="" name="author"/></head><body style="font-family: Helvetica, Arial, sans-serif;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;-moz-osx-font-smoothing: grayscale;padding:20px;"> <div style="max-width: 600px;margin: 0 auto;background-color: #ddd;padding:10px 20px;border-radius:10px;"> <h4 align="center" style="text-align:center;margin:20px 0;font-size:18px;">Email Reminder Promo Pegadaian!</h4> <p style="text-align: center;font-size: 16px;letter-spacing: .5px;">Hai, Sahabat Pegadaian<span style="font-weight:600"></span></p><p style="text-align: center;font-size: 14px;">Pegadaian Sedang ada promo menarik nih dengan Tema Promo  <b>'.$this->input->post("title_promosi").'</b>. dengan Tipe Promo untuk  <b>'.$this->input->post("tipe_promo").'</b> Berikut Kode Promo  <b>'.$this->input->post("kode_promo").'</b>, Berlaku pada tanggal <b>'.$this->input->post("create_date").'</b> sampai dengan <b>'.$this->input->post("expired_date").'</b>.</p><p style="text-align: center;margin-top: 20px;"><a href="http://127.0.0.1/app-pegadaian-customer-focus/index.php" target="_blank" style="font-size: 16px;font-weight: 600;letter-spacing: .5px;border-radius:5px;display: inline-block;background-color: #00acac;color: #fff !important;padding: 10px 15px;text-decoration: none;">Cek Promo</a></p></div></body></html>
    	');

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo '<script>alert("Email berhasil dikirim kepada Nasabah");location.href = "<?php echo base_url()."index.php/Promosi/indexbudgeting"; ?>"</script>';
        } else {
            // echo '<script>alert("Email gagal dikirim");history.go(-1)</script>';
            show_error($this->email->print_debugger());
        }
        redirect('Promosi/indexbudgeting');
    }
}