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
							<h2 class="pageheader-title">Judul Produk Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminHome";?>" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Judul Produk Page</li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- MODAL ADD I -->
				<!-- <div class="modal fade" id="modal-add">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<label class="modal-title">Tambah Judul Produk</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminProdukJudul/createsatu" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Judul<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="judul" placeholder="Judul..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Sub-Judul<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="opsi" placeholder="Sub-Judul..." required="required">
												<input type="hidden" class="form-control" name="status" value="4">
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
				</div> -->
				<!-- END MODAL ADD I -->
				<!-- MODAL ADD II -->
				<div class="modal fade" id="modal-add-dua">
					<div class="modal-dialog modal-xl">
						<div class="modal-content">
							<div class="modal-header">
								<label class="modal-title">Tambah Judul Produk</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminProdukJudul/createdua" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Judul<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="judul" placeholder="Judul..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Status<font style="color: red">*</font></label>
												<select class="form-control" name="status" required="required">
													<option value="">-- Pilih Status Judul Produk --</option>
													<option value="1">List 1</option>
													<option value="2">List 2</option>
													<option value="3">List 3</option>
													<option value="5">Artikel</option>
												</select>
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
				<!-- END MODAL ADD II -->
				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
						<div class="card">
							<div class="card-header">
								<!-- <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Judul"><i class="nav-icon far fa-plus-square"></i> Tambah Judul Produk I
								</button> -->
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add-dua" title="Tambah Judul"><i class="nav-icon far fa-plus-square"></i> Tambah Judul Produk
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr align="center">
												<th>ID</th>
												<th>Judul</th>
												<!-- <th>Sub-Judul</th> -->
												<th>Status</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status!=4 ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr align='center'>";
													echo "<td>".$row['id'] . "</td>";
													echo "<td>".$row['judul'] . "</td>";
													// echo "<td>".$row['opsi'] . "</td>";
											?>
													<td><?= $row['status'] == 1 ? 'List 1' : $row['status'] == 2 ? 'List 2' : ($row['status'] == 3 ? 'List 3' : 'Artikel' )?></td>
											<?php
													echo "<td width='400px'>
													<a href='#' data-toggle='modal' data-target='#editdua$row[id]' title='Edit Judul Produk'><span class='btn btn-success btn-sm'><small>Edit</small></span></a>
													<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='btn btn-danger btn-sm'><small>Hapus</small></span></a>
													</td>";
													echo "</tr>";
													?>

													<!-- UPDATE I -->
													<!-- <div class="modal fade" id="editsatu<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Update Judul Produk</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProdukJudul/updatesatu/'.$row['id']));?>
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
																				<label>Judul</label>
																				<input type="text" class="form-control" name="judul" placeholder="Judul..." value="<?php echo $row['judul']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Sub-Judul</label>
																				<input type="text" class="form-control" name="opsi" placeholder="Sub-Judul..." value="<?php echo $row['opsi']; ?>">
																				<input type="hidden" class="form-control" name="status" value="<?php echo $row['status']; ?>">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<button type="submit" name="updatesatu" class="btn btn-block btn-primary">Simpan</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div> -->
												<!-- END UPDATE I -->

												<!-- UPDATE II -->
												<div class="modal fade" id="editdua<?php echo $row['id'];?>" role="dialog">
													<div class="modal-dialog modal-xl">
														<div class="modal-content">
															<div class="modal-header">
																<label class="modal-title">Update Judul Produk</label>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span>
																</button>
															</div>
															<?php echo form_open_multipart(site_url('AdminProdukJudul/updatedua/'.$row['id']));?>
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
																			<label>Judul</label>
																			<input type="text" class="form-control" name="judul" placeholder="Judul..." value="<?php echo $row['judul']; ?>">
																		</div>
																	</div>
																	<div class="col-sm-12">
																		<div class="form-group">
																			<label>Status</label>
																			<select class="form-control" name="status">
																				<option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
																				<option value="">-- Pilih Status Judul Produk --</option>
																				<option value="1">List 1</option>
																				<option value="2">List 2</option>
																				<option value="3">List 3</option>
																				<option value="5">Artikel</option>
																			</select>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<button type="submit" name="updatedua" class="btn btn-block btn-primary">Simpan</button>
																	<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																</div>
															</div>
														</form>
													</div>
												</div>
											</div>
											<!-- END UPDATE II -->

											<!-- DELETE -->
											<div class="modal fade" id="delete<?php echo $row['id'];?>" role="dialog">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<label class="modal-title">Hapus Judul Produk</label>
															<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																<span aria-hidden="true">&times;</span>
															</button>
														</div>
														<div class="modal-body">
															<?php echo form_open_multipart(site_url('AdminProdukJudul/delete/'.$row['id'])); ?>
															<div class="form-group">
																<label>Anda yakin akan menghapus data ini?</label>
																<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																<h6>Judul : <b><u><?php echo $row['judul'];?></u></b></h6>
																<!-- <h6>Opsi : <b><u><?php echo $row['opsi'];?></u></b></h6> -->
																<h6>Status : <b><u><?= $row['status'] == 1 ? 'List 1' : $row['status'] == 2 ? 'List 2' : ($row['status'] == 3 ? 'List 3' : 'Artikel' )?></u></b></h6>
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