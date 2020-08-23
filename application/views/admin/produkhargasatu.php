<?php 
// UANG
function matauang($angka){
    $hasil = "Rp " . number_format($angka,2,',','.');
    return $hasil;
}
// DATE
function tanggal_indo($tanggal, $cetak_hari = false)
{
	$hari = array ( 1 =>    'Senin',
		'Selasa',
		'Rabu',
		'Kamis',
		'Jumat',
		'Sabtu',
		'Minggu'
	);
	$bulan = array (1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$split    = explode('-', $tanggal);
	$tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

	if ($cetak_hari) {
		$num = date('N', strtotime($tanggal));
		return $hari[$num] . ', ' . $tgl_indo;
	}
	return $tgl_indo;
}
?>
<!doctype html>
<html lang="en">
<style type="text/css">
	.lingkaran1{
		width: 40px;
		height: 40px;
		background: #ffffff;
		border-radius: 100%;
	}
	.lingkaran2{
		width: 100px;
		height: 100px;
	}

	.lingkaran3{
		width: 150px;
		height: 150px;
		background: #fff;
		border-radius: 100%;
	}

	.lingkaran4{
		width: 100px;
		height: 100px;
		background: #fff;
		border-radius: 100%;
	}
</style>
<body>
	<div class="dashboard-main-wrapper">
		<div class="dashboard-header">
			<?php require ('include/header.php'); ?>
		</div>
		<?php require ('include/sidebar.php'); ?>
		<div class="dashboard-wrapper">
			<div class="container-fluid  dashboard-content">
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="page-header">
							<h2 class="pageheader-title">Produk & Harga I Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminHome";?>" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Produk & Harga I Page</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL ADD -->
				<div class="modal fade" id="modal-add">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<label class="modal-title">Tambah Produk Harga I</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminProdukHargaSatu/create" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<label>Gambar Produk<font style="color: red">*</font></label>
												<input type="file" class="form-control" name="gambar_produk" placeholder="Gambar Produk..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Nama Produk<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Harga Produk<font style="color: red">*</font></label>
												<input type="number" class="form-control" name="harga_produk" placeholder="Harga Produk..." required="required">
												<input type="hidden" class="form-control" name="status_produk" value="4">
												<input type="hidden" class="form-control" name="date_harga" value="<?php echo date('Y-m-d') ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="col-sm-12">
									<div class="form-group">
										<button type="submit" name="submit" class="btn btn-block btn-primary">Simpan</button>
										<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- END MODAL ADD -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Produk Harga"><i class="nav-icon far fa-plus-square"></i> Tambah Produk Harga I
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr align="center">
												<th>ID</th>
												<th>Gambar Produk</th>
												<th>Nama Produk</th>
												<th>Harga</th>
												<th>Status</th>
												<th>Tanggal Update</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$con=mysqli_connect("localhost","root","","db_kepasaraja");
											if (mysqli_connect_errno())
											{
												echo "Failed to connect to MySQL: " . mysqli_connect_error();
											}
											$result = mysqli_query($con,"SELECT * FROM tb_produk WHERE status_produk=4 ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr align='center'>";
													echo "<td>".$row['id'] . "</td>";
													?>
													<?php
													if ($row['gambar_produk']==NULL) {
													?>
														<td align="center">
															<h6><font style="color: red"><b><i>Anda belum mengupload Gambar Produk</i></b></font></h6>
														</td>
													<?php
													}else{
													?>
														<td align="center">
															<img src="<?php echo base_url('assets/img/produk/'.$row['gambar_produk'])?>" class="lingkaran2">
														</td>
													<?php
													}
													?>
													<?php
													echo "<td>".$row['nama_produk'] . "</td>";
													echo "<td>".matauang($row['harga_produk']) . "</td>";
													echo "<td>".$row['status_produk'] . "</td>";
													echo "<td>".tanggal_indo($row['date_harga'], true) . "</td>";
													echo "<td width='300px'>
													<a href='#' data-toggle='modal' data-target='#gambar$row[id]' title='Upload Gambar Produk'><span class='btn btn-warning btn-sm'><small>Gambar Produk</small></span></a>
													<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='btn btn-success btn-sm'><small>Edit</small></span></a>
													<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='btn btn-danger btn-sm'><small>Hapus</small></span></a>
													</td>";
													echo "</tr>";
													?>

													<!-- GAMBAR PRODUK -->
													<div class="modal fade" id="gambar<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Upload Gambar Produk</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProdukHargaSatu/updategambar/'.$row['id']));?>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>ID</label>
																				<input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Gambar Produk</label>
																				<input type="file" class="form-control" name="gambar_produk">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<button type="submit" name="updategambar" class="btn btn-block btn-primary">Simpan</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
																</form>
															</div>
														</div>
													</div>
													<!-- END GAMBAR KATEGORI -->

													<!-- UPDATE -->
													<div class="modal fade" id="edit<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Update Produk Harga I</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProdukHargaSatu/update/'.$row['id']));?>
																<div class="modal-body">
																	<div class="row">
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>ID</label>
																				<input type="text" class="form-control" name="id" value="<?php echo $row['id']; ?>" readonly>
																			</div>
																		</div>
																		<div class="col-sm-12">
																		<hr>
																			<div align="center">
																				<h3>Gambar Produk</h3>
																				<hr>
																				<?php
																				if ($row['gambar_produk']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Gambar Produk</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/produk/'. $row['gambar_produk'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<br>
																			<hr>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Nama Produk</label>
																				<input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk..." value="<?php echo $row['nama_produk']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Harga Produk</label>
																				<input type="number" class="form-control" name="harga_produk" placeholder="Harga Produk..." value="<?php echo $row['harga_produk']; ?>">
																				<input type="hidden" class="form-control" name="status_produk" placeholder="Harga Produk..." value="4">
																				<input type="hidden" class="form-control" name="date_harga" value="<?php echo date('Y-m-d') ?>">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<button type="submit" name="update" class="btn btn-block btn-primary">Simpan</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
																</form>
															</div>
														</div>
													</div>
													<!-- END UPDATE -->

													<!-- DELETE -->
													<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Hapus Produk Harga I</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<?php echo form_open_multipart(site_url('AdminProdukHargaSatu/delete/'.$row['id'])); ?>
																		<div class="form-group">
																			<label>Anda yakin akan menghapus data ini?</label>
																			<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																			<hr>
																			<div align="center">
																				<h3>Gambar Produk</h3>
																				<hr>
																				<?php
																				if ($row['gambar_produk']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Gambar</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/produk/'. $row['gambar_produk'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<br>
																			<hr>
																			<h6>Nama Produk : <b><u><?php echo $row['nama_produk'];?></u></b></h6>
																			<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>" required>
																		</div>
																		<button type="submit" name="delete" class="btn btn-danger btn-block btn-flat">Yes</button>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END DELETE -->
												<?php } } mysqli_close($con); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>