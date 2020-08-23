<?php 
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
							<h2 class="pageheader-title">Produk Kategori Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminHome";?>" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Produk Kategori Page</li>
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
								<label class="modal-title">Tambah Produk Kategori</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminProdukKategori/create" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Gambar Kategori<font style="color: red">*</font></label>
												<input type="file" class="form-control" name="gambar_kategori" placeholder="Gambar Kategori..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Nama Kategori<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori..." required="required">
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
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Produk Kategori
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr align="center">
												<th>ID</th>
												<th>Gambar Kategori</th>
												<th>Nama Kategori</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_kategori ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr align='center'>";
													echo "<td>".$row['id'] . "</td>";
													?>
													<?php
													if ($row['gambar_kategori']==NULL) {
													?>
														<td align="center">
															<h6><font style="color: red"><b><i>Anda belum mengupload Gambar</i></b></font></h6>
														</td>
													<?php
													}else{
													?>
														<td align="center">
															<img src="<?php echo base_url('assets/img/kategori/'.$row['gambar_kategori'])?>" class="lingkaran2">
														</td>
													<?php
													}
													?>
													<?php
													echo "<td>".$row['nama_kategori'] . "</td>";
													echo "<td width='300px'>
													<a href='#' data-toggle='modal' data-target='#gambar$row[id]' title='Upload Logo'><span class='btn btn-warning btn-sm'><small>Logo</small></span></a>
													<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='btn btn-success btn-sm'><small>Edit</small></span></a>
													<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='btn btn-danger btn-sm'><small>Hapus</small></span></a>
													</td>";
													echo "</tr>";
													?>

													<!-- GAMBAR KATEGORI -->
													<div class="modal fade" id="gambar<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Upload Logo</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProdukKategori/updategambar/'.$row['id']));?>
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
																				<label>Gambar Kategori</label>
																				<input type="file" class="form-control" name="gambar_kategori">
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
																	<label class="modal-title">Update Produk Kategori</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProdukKategori/update/'.$row['id']));?>
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
																				<label>Nama Kategori</label>
																				<input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori..." value="<?php echo $row['nama_kategori']; ?>">
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
																	<label class="modal-title">Hapus Produk Kategori</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<?php echo form_open_multipart(site_url('AdminProdukKategori/delete/'.$row['id'])); ?>
																		<div class="form-group">
																			<label>Anda yakin akan menghapus data ini?</label>
																			<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																			<hr>
																			<div align="center">
																				<h3>Gambar Kategori</h3>
																				<hr>
																				<?php
																				if ($row['gambar_kategori']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Gambar</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/kategori/'. $row['gambar_kategori'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<br>
																			<hr>
																			<h6>Nama Kategori : <b><u><?php echo $row['nama_kategori'];?></u></b></h6>
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