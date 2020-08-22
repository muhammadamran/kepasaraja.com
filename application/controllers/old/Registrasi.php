<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model('M_MasterData');

	}

	
	public function index()
	{
		$this->load->view('registrasi');
	}

	public function editprofile()
	{	
		$data = array(
			'vprofile'=>$this->M_MasterData->get_profile()
		);
		$this->load->view('profile',$data);
	}

	public function create()
	{
		if(isset($_POST['submit']))
		{
			$foto = $this->input->post('foto');
			$ktp = $this->input->post('ktp');
			$NPWP = $this->input->post('NPWP');
			$bank = $this->input->post('bank');
			$no_rek = $this->input->post('no_rek');
			$an = $this->input->post('an');
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$full_name = $this->input->post('full_name');
			$nama_ibu = $this->input->post('nama_ibu');
			$agama = $this->input->post('agama');
			$tlp = $this->input->post('tlp');
			$email = $this->input->post('email');
			$tempatlahir = $this->input->post('tempatlahir');
			$tgl_lahir = $this->input->post('tgl_lahir');
			$usia = $this->input->post('usia');
			$jk = $this->input->post('jk');
			$alamat = $this->input->post('alamat');
			$usia = $this->input->post('usia');
			$jk = $this->input->post('jk');
			$alamat = $this->input->post('alamat');
			$alamat_current = $this->input->post('alamat_current');
			$status_hubungan = $this->input->post('status_hubungan');
			$warganegara = $this->input->post('warganegara');
			$pendidikan = $this->input->post('pendidikan');
			$nm_pendidikan = $this->input->post('nm_pendidikan');
			$pekerjaan = $this->input->post('pekerjaan');
			$nm_perusahaan = $this->input->post('nm_perusahaan');
			$gaji = $this->input->post('gaji');
			$jumlah_tanggungan = $this->input->post('jumlah_tanggungan');
			$provinsi = $this->input->post('provinsi');
			$kota = $this->input->post('kota');
			$user_create = $this->input->post('user_create');
			$user_role = $this->input->post('user_role');

			$data = array(
				'foto' => $foto,
				'ktp' => $ktp,
				'NPWP' => $NPWP,
				'bank' => $bank,
				'no_rek' => $no_rek,
				'an' => $an,
				'username' => $username,
				'password' => $password,
				'full_name' => $full_name,
				'nama_ibu' => $nama_ibu,
				'agama' => $agama,
				'tlp' => $tlp,
				'email' => $email,
				'tempatlahir' => $tempatlahir,
				'tgl_lahir' => $tgl_lahir,
				'usia' => $usia,
				'jk' => $jk,
				'alamat' => $alamat,
				'alamat_current' => $alamat_current,
				'status_hubungan' => $status_hubungan,
				'warganegara' => $warganegara,
				'pendidikan' => $pendidikan,
				'nm_pendidikan' => $nm_pendidikan,
				'pekerjaan' => $pekerjaan,
				'nm_perusahaan' => $nm_perusahaan,
				'gaji' => $gaji,
				'jumlah_tanggungan' => $jumlah_tanggungan,
				'provinsi' => $provinsi,
				'kota' => $kota,
				'user_create' => $user_create,
				'user_role' => $user_role
			);
			// var_dump($data);die();
			$this->M_MasterData->input_registrasi('tb_user', $data);
		}
		$this->load->view('registrasi_success');
	}

	public function update($user_id)
	{
		if(isset($_POST['update']))
		{	
			$data = array(
				'ktp' => $this->input->post('ktp'),
				'NPWP' => $this->input->post('NPWP'),
				'bank' => $this->input->post('bank'),
				'no_rek' => $this->input->post('no_rek'),
				'an' => $this->input->post('an'),
				'username' => $this->input->post('username'),
				// 'password' => $this->input->post('password'),
				'full_name' => $this->input->post('full_name'),
				'nama_ibu' => $this->input->post('nama_ibu'),
				'agama' => $this->input->post('agama'),
				'tlp' => $this->input->post('tlp'),
				'email' => $this->input->post('email'),
				'tempatlahir' => $this->input->post('tempatlahir'),
				'tgl_lahir' => $this->input->post('tgl_lahir'),
				'usia' => $this->input->post('usia'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'usia' => $this->input->post('usia'),
				'jk' => $this->input->post('jk'),
				'alamat' => $this->input->post('alamat'),
				'alamat_current' => $this->input->post('alamat_current'),
				'status_hubungan' => $this->input->post('status_hubungan'),
				'warganegara' => $this->input->post('warganegara'),
				'pendidikan' => $this->input->post('pendidikan'),
				'nm_pendidikan' => $this->input->post('nm_pendidikan'),
				'pekerjaan' => $this->input->post('pekerjaan'),
				'nm_perusahaan' => $this->input->post('nm_perusahaan'),
				'gaji' => $this->input->post('gaji'),
				'jumlah_tanggungan' => $this->input->post('jumlah_tanggungan'),
				'provinsi' => $this->input->post('provinsi'),
				'kota' => $this->input->post('kota')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_data_user('tb_user',$data, $user_id);
		} 
		redirect('Registrasi/editprofile');	
	}

	public function changepassword($user_id)
	{
		if(isset($_POST['updatepass']))
		{	
			$data = array(
				'password' => $this->input->post('password')
			);
			// var_dump($data);die();
			$this->M_MasterData->update_password_user('tb_user',$data, $user_id);
		} 
		redirect('Login');	
	}

	public function delete(){
		
		$user_id['user_id'] = $this->uri->segment(3);
		
		$this->M_MasterData->DeleteDataUsers('tb_user',$user_id);

		redirect('Registrasi');	
	}
}