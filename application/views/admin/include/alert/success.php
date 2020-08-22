<?php 

mysql_connect('localhost', 'root', '');
mysql_select_db('rskg_care'); 
$role = mysql_query("SELECT * FROM tb_user WHERE username = '$user' ");
$data = mysql_fetch_array($role);

$ntf	= $_GET['ntf'];

// CODE 1 : FOR SUCCESS PROCESS RECORD
if ($ntf == 1) {
	?>
	<div class="alert alert-success alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fa fa-check-circle"></i> Create Success!</h4>
		<label>Data Berhasil di Tambah!</small>
	</div>
	<?php
// CODE 2 : FOR DUPLICATE RECORD
} elseif ($ntf == 2) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></small>
		<h4><i class="fa fa-meh"></i> Record Duplicate!</h4>
		<small>Silahkan hubungin IT!</small>
	</div>
	<?php
// CODE 3 : FOR FAILED PROCESS RECORD	
} elseif ($ntf == 3) {
	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></small>
		<h4><i class="fa fa-times-circle"></i> Data has been deleted!</h4>
		<small>Data Berhasil di Hapus!</small>
	</div>
	<?php
// CODE 4 : RECORD HAS BEEN UPDATED
} elseif ($ntf == 4) {
	?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fa fa-thumbs-up"></i> Update Success!</h4>
		<label>Data Berhasil di Update!</small>
	</div>
	<?php
} elseif ($ntf == 5) {
	?>
	<div class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fa fa-thumbs-up"></i> Update Lampiran Success!</h4>
		<label>Lampiran Berhasil di Update!</small>
	</div>
	<?php
} elseif ($ntf == 6) {
	?>
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fa fa-user-times"></i> Ada Yang Tidak Beres!</h4>
		<label>Silahkan Lapor Ke IT!</small>
	</div>
	<?php
} elseif ($ntf == 66) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fas fa-envelope"></i> Update Akomodasi Berhasil!</h4>
		<label>Data Telah di Update dan Dikirim Ke Email!</small>
	</div>
	<?php
} elseif ($ntf == 65) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fas fa-envelope"></i> Update Transportasi Berhasil!</h4>
		<label>Data Telah di Update dan Dikirim Ke Email!</small>
	</div>
	<?php
} elseif ($ntf == 64) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fas fa-envelope"></i> Update Registrasi Berhasil!</h4>
		<label>Data Telah di Update dan Dikirim Ke Email!</small>
	</div>
	<?php
} elseif ($ntf == 63) {
	?>
	<div class="alert alert-warning alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<small>Hai, <?php echo $data['full_name'];?></label>
		<h4><i class="fas fa-envelope"></i> Konfirmasi Berhasil!</h4>
		<label>Data Telah di Dikirim Ke Email Peserta!</small>
	</div>
	<?php
} elseif ($ntf == 100) {
	?>
	<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">
				<i class="notika-icon notika-close"></i>
			</span>
		</button> Hai, <a href="" class="alert-link"><?php echo $data['full_name']; ?></a>.
		<br>
		Selamat Datang di Sistem Informasi Dokumen, Pelaporan & Akreditasi RS. Khusus Ginjal Ny. R.A. Habibie. Enjoyed!
	</div>
	<?php
}
?>