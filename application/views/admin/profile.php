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
	.lingkaran{
		width: 150px;
		height: 150px;
		background: #ffffff;
		border-radius: 100%;
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
							<h2 class="pageheader-title">Profile Page</h2>
							<p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
							<div class="page-breadcrumb">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminHome";?>" class="breadcrumb-link">Home</a></li>
										<li class="breadcrumb-item active" aria-current="page">Profile Page</li>
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
								<label class="modal-title">Tambah Profile</label>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" action="<?php echo base_url() ?>index.php/AdminProfile/create" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="row">	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Icon<font style="color: red">*</font></label>
												<input type="file" class="form-control" name="icon" placeholder="Icon..." required="required">
											</div>
										</div>	
										<div class="col-sm-12">
											<div class="form-group">
												<label>Title<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="title_head" placeholder="Title..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Email<font style="color: red">*</font></label>
												<input type="email" class="form-control" name="mail" placeholder="Email..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Slogan<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="slogan" placeholder="Slogan..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL Facebook<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="facebook" placeholder="URL Facebook..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL Twitter<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="twitter" placeholder="URL Twitter..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL LinkendIn<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="linkendin" placeholder="URL LinkendIn..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>URL Instagram<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="instagram" placeholder="URL Instagram..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>No. Telephone<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="telepone" placeholder="No. Telephone..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Pesan<font style="color: red">*</font></label>
												<input type="text" class="form-control" name="pesan" placeholder="Pesan..." required="required">
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">
												<label>Alamat<font style="color: red">*</font></label>
												<textarea type="text" class="form-control" name="alamat" placeholder="Alamat" required="required"></textarea>
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
								<button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Agenda Rapat"><i class="nav-icon far fa-plus-square"></i> Tambah Profile
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered second" style="width:100%">
										<thead>
											<tr align="center">
												<th>ID</th>
												<th>Detail</th>
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
											$result = mysqli_query($con,"SELECT * FROM tb_profile ORDER BY id DESC");

											if(mysqli_num_rows($result)>0){
												while($row = mysqli_fetch_array($result))
												{
													echo "<tr align='center'>";
													echo "<td>".$row['id'] . "</td>";
													echo "<td>
													<a href='#' data-toggle='modal' data-target='#detail$row[id]' title='Edit'><span class='btn btn-primary'><i class='fa fa-eye'></i> </span></a>
													</td>";
													echo "<td width='300px'>
													<a href='#' data-toggle='modal' data-target='#icon$row[id]' title='Upload Logo'><span class='btn btn-warning btn-sm'><small>Icon</small></span></a>
													<a href='#' data-toggle='modal' data-target='#logo$row[id]' title='Upload Logo'><span class='btn btn-warning btn-sm'><small>Logo</small></span></a>
													<a href='#' data-toggle='modal' data-target='#edit$row[id]' title='Edit'><span class='btn btn-success btn-sm'><small>Edit</small></span></a>
													<a href='#' data-toggle='modal' data-target='#delete$row[id]' title='Delete'><span class='btn btn-danger btn-sm'><small>Hapus</small></span></a>
													</td>";
													echo "</tr>";
													?>
													<!-- DETAIL -->
													<div class="modal fade" id="detail<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Detail Profile</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<form method="post" action="">
																		<div class="form-group">
																			<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																			<hr>
																			<div align="center">
																				<h3>Icon</h3>
																				<hr>
																				<?php
																				if ($row['icon']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Icon</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/logo/'. $row['icon'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<br>
																			<hr>
																			<div align="center">
																				<h3>Logo</h3>
																				<hr>
																				<?php
																				if ($row['logo']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Logo</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/brand/'. $row['logo'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<hr>
																			<h6>Title : <b><u><?php echo $row['title_head'];?></u></b></h6>
																			<h6>Email : <b><u><?php echo $row['mail'];?></u></b></h6>
																			<h6>Slogan : <b><u><?php echo $row['slogan'];?></u></b></h6>
																			<h6>URL Facebook : <b><u><?php echo $row['facebook'];?></u></b></h6>
																			<h6>URL Twitter : <b><u><?php echo $row['twitter'];?></u></b></h6>
																			<h6>URL LinkendIn : <b><u><?php echo $row['linkendin'];?></u></b></h6>
																			<h6>URL Instagram : <b><u><?php echo $row['instagram'];?></u></b></h6>
																			<h6>No. Telepone : <b><u><?php echo $row['telepone'];?></u></b></h6>
																			<h6>Pesan : <b><u><?php echo $row['pesan'];?></u></b></h6>
																			<h6>Alamat : <br><b><u><?php echo $row['alamat'];?></u></b></h6>
																			<input type="hidden" name="id" class="form-control" value="<?php echo $row['id'];?>" required>
																		</div>
																		<button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Tutup</button>
																	</form>
																</div>
															</div>
														</div>
													</div>
													<!-- END DETAIL -->

													<!-- ICON -->
													<div class="modal fade" id="icon<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Upload Icon</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProfile/updateicon/'.$row['id']));?>
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
																				<label>Icon</label>
																				<input type="file" class="form-control" name="icon">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<button type="submit" name="updateicon" class="btn btn-block btn-primary">Simpan</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
																</form>
															</div>
														</div>
													</div>
													<!-- END ICON -->

													<!-- LOGO -->
													<div class="modal fade" id="logo<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Upload Logo</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProfile/updatelogo/'.$row['id']));?>
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
																				<label>Logo</label>
																				<input type="file" class="form-control" name="logo">
																			</div>
																		</div>
																	</div>
																	<div class="form-group">
																		<button type="submit" name="updatelogo" class="btn btn-block btn-primary">Simpan</button>
																		<button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Tutup</button>
																	</div>
																</div>
																</form>
															</div>
														</div>
													</div>
													<!-- END LOGO -->

													<!-- UPDATE -->
													<div class="modal fade" id="edit<?php echo $row['id'];?>" role="dialog">
														<div class="modal-dialog modal-xl">
															<div class="modal-content">
																<div class="modal-header">
																	<label class="modal-title">Update Profile</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<?php echo form_open_multipart(site_url('AdminProfile/update/'.$row['id']));?>
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
																				<label>Title</label>
																				<input type="text" class="form-control" name="title_head" placeholder="Menu..." value="<?php echo $row['title_head']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Email</label>
																				<input type="email" class="form-control" name="mail" placeholder="URL..." value="<?php echo $row['mail']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Slogan</label>
																				<input type="text" class="form-control" name="slogan" placeholder="Slogan..." value="<?php echo $row['slogan']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>URL Facebook</label>
																				<input type="text" class="form-control" name="facebook" placeholder="URL Facebook..." value="<?php echo $row['facebook']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>URL Twitter</label>
																				<input type="text" class="form-control" name="twitter" placeholder="URL Twitter..." value="<?php echo $row['twitter']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>URL LinkendIn</label>
																				<input type="text" class="form-control" name="linkendin" placeholder="URL LinkendIn..." value="<?php echo $row['linkendin']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>URL Instagram</label>
																				<input type="text" class="form-control" name="instagram" placeholder="URL Instagram..." value="<?php echo $row['instagram']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>No. Telephone</label>
																				<input type="text" class="form-control" name="telepone" placeholder="No. Telephone..." value="<?php echo $row['telepone']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Pesan</label>
																				<input type="text" class="form-control" name="pesan" placeholder="Pesan..." value="<?php echo $row['pesan']; ?>">
																			</div>
																		</div>
																		<div class="col-sm-12">
																			<div class="form-group">
																				<label>Alamat</label>
																				<textarea type="text" class="form-control" name="alamat" placeholder="Alamat"><?php echo $row['alamat']; ?></textarea>
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
																	<label class="modal-title">Hapus Profile</label>
																	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">&times;</span>
																	</button>
																</div>
																<div class="modal-body">
																	<?php echo form_open_multipart(site_url('AdminProfile/delete/'.$row['id'])); ?>
																		<div class="form-group">
																			<label>Anda yakin akan menghapus data ini?</label>
																			<h6>ID : <b><u><?php echo $row['id'];?></u></b></h6>
																			<hr>
																			<div align="center">
																				<h3>Icon</h3>
																				<hr>
																				<?php
																				if ($row['icon']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Icon</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/logo/'. $row['icon'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<br>
																			<hr>
																			<div align="center">
																				<h3>Logo</h3>
																				<hr>
																				<?php
																				if ($row['logo']==NULL) { ?>
																					<h6><font style="color: red"><b><i>Anda belum mengupload Logo</i></b></font></h6>
																				<?php }else{ ?>
																					<img src="<?php echo base_url().'assets/img/brand/'. $row['logo'];?>" class="lingkaran3" alt="User profile picture">   
																				<?php } ?>
																			</div>
																			<hr>
																			<h6>Title : <b><u><?php echo $row['title_head'];?></u></b></h6>
																			<h6>Email : <b><u><?php echo $row['mail'];?></u></b></h6>
																			<h6>Slogan : <b><u><?php echo $row['slogan'];?></u></b></h6>
																			<h6>URL Facebook : <b><u><?php echo $row['facebook'];?></u></b></h6>
																			<h6>URL Twitter : <b><u><?php echo $row['twitter'];?></u></b></h6>
																			<h6>URL LinkendIn : <b><u><?php echo $row['linkendin'];?></u></b></h6>
																			<h6>URL Instagram : <b><u><?php echo $row['instagram'];?></u></b></h6>
																			<h6>No. Telepone : <b><u><?php echo $row['telepone'];?></u></b></h6>
																			<h6>Pesan : <b><u><?php echo $row['pesan'];?></u></b></h6>
																			<h6>Alamat : <br><b><u><?php echo $row['alamat'];?></u></b></h6>
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