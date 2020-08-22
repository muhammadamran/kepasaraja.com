<?php 
include "include/connection.php";

// ADD
if(isset($_POST["submit"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $password     = $_POST['password'];
  $user_role    = $_POST['user_role'];
  $full_name    = $_POST['full_name'];
  $jenis_kelamin= $_POST['jenis_kelamin'];
  $email        = $_POST['email'];
  $alamat       = $_POST['alamat'];
  $no_hp        = $_POST['no_hp'];
  $jabatan      = $_POST['jabatan'];
  $unit         = $_POST['unit'];
  $date_user    = $_POST['date_user'];

    $nama = $_FILES['foto']['name'];
    $file_tmp = $_FILES['foto']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/images/user/'.$nama);

  $query = mysql_query("INSERT INTO tb_user 
    (user_id,username,password,user_role,full_name,jenis_kelamin,email,alamat,no_hp,jabatan,unit,date_user,foto) 
    VALUES 
    ('','$username','$password','$user_role','$full_name','$jenis_kelamin','$email','$alamat','$no_hp','$jabatan','$unit','$date_user','$nama')
    ");
  if ($query) {
    header("Location: ./users.php?ntf=1");  
  } else {
    header("Location: ./users.php?ntf=6");
  }
}

// EDIT
if(isset($_POST["update"]))    
{    
  $user_id      = $_POST['user_id'];
  $username     = $_POST['username'];
  $user_role    = $_POST['user_role'];
  $full_name    = $_POST['full_name'];
  $jenis_kelamin= $_POST['jenis_kelamin'];
  $email        = $_POST['email'];
  $alamat       = $_POST['alamat'];
  $no_hp        = $_POST['no_hp'];
  $jabatan      = $_POST['jabatan'];
  $unit         = $_POST['unit'];
  $date_user    = $_POST['date_user'];

  $query = mysql_query("UPDATE tb_user SET 
    username ='$username',
    user_role = '$user_role',
    full_name = '$full_name',
    jenis_kelamin = '$jenis_kelamin',
    email = '$email',
    alamat = '$alamat',
    no_hp = '$no_hp',
    jabatan = '$jabatan',
    unit = '$unit',
    email = '$email',
    date_user = '$date_user'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./users.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
}

// CHANGE PASSWORD
if(isset($_POST["changepassword"]))    
{    
  $user_id     = $_POST['user_id'];
  $password    = $_POST['password'];

  $query = mysql_query("UPDATE tb_user SET 
    password ='$password'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./users.php?ntf=4");                                                  
  } else {
    echo "Updated Failed - Please contact your Administrator";
  }
} 

// UBAH FOTO
if(isset($_POST["uploadfoto"]))    
{    
  $user_id           = $_POST['user_id'];

  $nama = $_FILES['foto']['name'];
  $file_tmp = $_FILES['foto']['tmp_name'];

  move_uploaded_file($file_tmp, './assets/images/user/'.$nama);
  
  $query = mysql_query("UPDATE tb_user SET 
    foto = '$nama'
    WHERE user_id ='$user_id'");
  if($query){
    header("Location: ./users.php?ntf=5");                                                  
  } else {
    header("Location: ./users.php?ntf=6");  
  }
} 

// DELETE
if(isset($_POST['delete']))
{
  $user_id    = $_POST['user_id'];

  if($user_id){
    $query = mysql_query("DELETE FROM tb_user WHERE user_id = '$user_id'");
    if($query){
     header("Location: ./users.php?ntf=3");                     
   } else {
    header("Location: ./users.php?ntf=6");  
  }
} else {
  header("Location: ./users.php?ntf=6");  
}
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
    <title>DPA RSKG-Users</title>
    <link rel="icon" type="assets/image/png" href="assets/images/logo/logo.png"/>
</head>
<style type="text/css">
    .lingkaran1{
    width: 40px;
    height: 40px;
    background: #dac52c;
    border-radius: 100%;
  }

  .lingkaran2{
    width: 50px;
    height: 50px;
    background: gray;
    border-radius: 100%;
  }

  .lingkaran3{
    width: 150px;
    height: 150px;
    background: gray;
    border-radius: 100%;
  }
</style>
<body>
    <div class="dashboard-main-wrapper">
       <div class="dashboard-header">
        <?php include "include/header.php" ?>
        </div>
        <?php include "include/sidebar.php" ?>
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Users Page</h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="index.php?ntf=0" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Users Page</li>
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
                        <label class="modal-title">Tambah Users</label>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="col-sm-12">
                            <div class="form-group">
                              <label>File Foto</label><br>
                              <input type="file" name="foto">
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Username<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="username" placeholder="Username ..." required="required">
                                <input type="hidden" class="form-control" name="user_id">
                                <input type="hidden" class="form-control" name="date_user" value="<?php echo date('Y-m-d'); ?>">
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Password<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="password" value="user123123" required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Full Name<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="full_name" placeholder="Full Name ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Role<font style="color: red">*</font></label>
                                <select class="form-control" name="user_role" style="width: 100%;">
                                  <option value="">-- Pilih Role --</option>
                                  <option value="Superadmin">Superadmin</option>
                                  <option value="admin">Admin</option>
                                  <option value="user">User</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Jenis Kelamin<font style="color: red">*</font></label>
                                <select class="form-control" name="jenis_kelamin" style="width: 100%;">
                                  <option value="">-- Pilih Jenis Kelamin --</option>
                                  <option value="Pria">Pria</option>
                                  <option value="Wanita">Wanita</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email@xyz.com ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>No. HP</label>
                                <input type="text" class="form-control" name="no_hp" placeholder="08xxxxxxx ...">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Jabatan<font style="color: red">*</font></label>
                                <input type="text" class="form-control" name="jabatan" placeholder="Jabatan ..." required="required">
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                                <select name="unit" class="form-control" required="required">
                                    <option value="">-- Pilih Bagian/Instalasi/Komite --</option>
                                    <?php
                                    //Membuat coneksi ke database 
                                    $con = mysqli_connect("localhost",'root',"","rskg_care");
                                    if (!$con){
                                      die("coneksi database gagal:".mysqli_connect_error());
                                    }
                                    
                                    //Perintah sql untuk menampilkan semua data pada tabel department
                                    $sql="SELECT * FROM tb_bagian";

                                    $hasil=mysqli_query($con,$sql);
                                    $no=0;
                                    while ($data = mysqli_fetch_array($hasil)) {
                                    $no++;
                                    ?>
                                    <option value="<?php echo $data['nama_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                    <?php 
                                    }
                                    ?>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ..."></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-block btn-primary">Submit</button>
                            <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- END MODAL ADD -->
                <!-- ALERT -->
                <?php include 'include/alert/success.php' ?>
                <!-- END ALERT -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn bg-primary btn-flat" data-toggle="modal" data-target="#modal-add" title="Tambah Users"><i class="nav-icon far fa-plus-square"></i> Tambah Users
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Foto</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Role</th>
                                                <th>Full Name</th>
                                                <th>Detail User</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $con=mysqli_connect("localhost","root","","rskg_care");
                                            if (mysqli_connect_errno())
                                            {
                                                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                            }
                                            $result = mysqli_query($con,"SELECT * FROM tb_user ORDER BY user_id DESC");

                                            if(mysqli_num_rows($result)>0){
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    echo "<tr>";
                                                    echo "<td>".$row['user_id'] . "</td>";
                                                     if ($row['foto']==NULL){
                                                        echo "<td><img src='assets/images/user/avatar.png' class='lingkaran2'></td>";
                                                      }else{
                                                        echo "<td><img src='assets/images/user/$row[foto]' class='lingkaran2'></td>";
                                                      }
                                                    echo "<td>".$row['username'] . "</td>";
                                                    echo "<td>***********</td>";
                                                    echo "<td>".$row['user_role'] . "</td>";
                                                    echo "<td>".$row['full_name'] . "</td>";
                                                    echo "<td align='center'>
                                                            <a href='#' data-toggle='modal' data-target='#detail$row[user_id]' title='Edit'><span class='badge badge-info'><i class='fa fa-info'></i> Detail Users</span></a>
                                                          </td>";
                                                   echo "<td align= '' width='150px'>
                                                            <a href='#' data-toggle='modal' data-target='#edit$row[user_id]' title='Edit'><span class='badge badge-success'><i class='fa fa-edit'></i> </span></a>
                                                            <a href='#' data-toggle='modal' data-target='#delete$row[user_id]' title='Delete'><span class='badge badge-danger'><i class='fas fa-times'></i> </span></a>
                                                            <a href='#' data-toggle='modal' data-target='#updatefoto$row[user_id]' title='Ganti Foto'><span class='badge badge-default'><i class='fas fa-camera'></i> </span></a>
                                                            <a href='#' data-toggle='modal' data-target='#change$row[user_id]' title='Ganti Password'><span class='badge badge-dark'><i class='fas fa-lock'></i> </span></a>
                                                            </td>";
                                                    echo "</tr>";
                                                    ?>
                                                    <!-- DETAIL -->
                                                    <div class="modal fade" id="detail<?php echo $row['user_id'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Lihat Detail Data Users</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <div align="center">
                                                                  <img src="assets/images/user/<?php echo $row['foto']; ?>" class="lingkaran3">
                                                                </div>
                                                                <hr>
                                                                <label>Detail Data Users</label>
                                                                <h6>Jenis Kelamin : <b><u><?php echo $row['jenis_kelamin'];?></u></b></h6>
                                                                <h6>Email : <b><u><?php echo $row['email'];?></u></b></h6>
                                                                <h6>Alamat : <b><u><?php echo $row['alamat'];?></u></b></h6>
                                                                <h6>No. HP : <b><u><?php echo $row['no_hp'];?></u></b></h6>
                                                                <h6>Jabatan : <b><u><?php echo $row['jabatan'];?></u></b></h6>
                                                                <h6>Bidang/Instalasi/Komite : <b><u><?php echo $row['unit'];?></u></b></h6>
                                                                <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $row['user_id'];?>" required>
                                                              </div>
                                                              <button type="submit" name="delete" class="btn btn-primary btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DETAIL -->

                                                    <!-- UPDATE -->
                                                    <div class="modal fade" id="edit<?php echo $row['user_id'];?>">
                                                      <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Update Data Users</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <form action="" method="POST">
                                                            <div class="modal-body">
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Username<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="username" placeholder="Username ..." required="required" value="<?php echo $row['username'] ?>">
                                                                    <input type="hidden" class="form-control" name="user_id" value="<?php echo $row['user_id'] ?>">
                                                                    <input type="hidden" class="form-control" name="date_user" value="<?php echo $row['date_user'] ?>">
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Full Name<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="full_name" placeholder="Full Name ..." required="required" value="<?php echo $row['full_name'] ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Role<font style="color: red">*</font></label>
                                                                    <select class="form-control" name="user_role" style="width: 100%;">
                                                                      <option value="<?php echo $row['user_role'] ?>"><?php echo $row['user_role'] ?></option>
                                                                      <option value="">-- Pilih Role --</option>
                                                                      <option value="Superadmin">Superadmin</option>
                                                                      <option value="admin">Admin</option>
                                                                      <option value="user">User</option>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Jenis Kelamin<font style="color: red">*</font></label>
                                                                    <select class="form-control" name="jenis_kelamin" style="width: 100%;">
                                                                      <option value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
                                                                      <option value="">-- Pilih Jenis Kelamin --</option>
                                                                      <option value="Pria">Pria</option>
                                                                      <option value="Wanita">Wanita</option>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input type="email" class="form-control" name="email" placeholder="Email@xyz.com ..." value="<?php echo $row['email']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>No. HP</label>
                                                                    <input type="text" class="form-control" name="no_hp" placeholder="08xxxxxxx ..." value="<?php echo $row['no_hp']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Jabatan<font style="color: red">*</font></label>
                                                                    <input type="text" class="form-control" name="jabatan" placeholder="Jabatan ..." required="required" value="<?php echo $row['jabatan']; ?>">
                                                                  </div>
                                                                </div>
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Bagian/Instalasi/Komite<font style="color: red">*</font></label>
                                                                    <select name="unit" class="form-control" required="required">
                                                                        <option value="<?php echo $row['unit']; ?>"><?php echo $row['unit']; ?></option>
                                                                        <option value="">-- Pilih Bagian/Instalasi/Komite --</option>
                                                                        <?php
                                                                        //Membuat coneksi ke database 
                                                                        $con = mysqli_connect("localhost",'root',"","rskg_care");
                                                                        if (!$con){
                                                                          die("coneksi database gagal:".mysqli_connect_error());
                                                                        }
                                                                        
                                                                        //Perintah sql untuk menampilkan semua data pada tabel department
                                                                        $sql="SELECT * FROM tb_bagian";

                                                                        $hasil=mysqli_query($con,$sql);
                                                                        $no=0;
                                                                        while ($data = mysqli_fetch_array($hasil)) {
                                                                        $no++;
                                                                        ?>
                                                                        <option value="<?php echo $data['nama_bg'];?>"><?php echo $data['nama_bg'];?></option>
                                                                        <?php 
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                              <div class="row">
                                                                <div class="col-sm-12">
                                                                  <div class="form-group">
                                                                    <label>Alamat</label>
                                                                    <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat ..."><?php echo $row['alamat']; ?></textarea>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="col-sm-12">
                                                              <div class="form-group">
                                                                <button type="submit" name="update" class="btn btn-block btn-primary">Submit</button>
                                                                <button type="button" class="btn btn-block btn-warning" data-dismiss="modal">Close</button>
                                                              </div>
                                                            </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE -->

                                                    <!-- DELETE -->
                                                    <div class="modal fade" id="delete<?php echo $row['user_id'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Delete Karyawan RSKG</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <div align="center">
                                                                  <img src="assets/images/user/<?php echo $row['foto']; ?>"  class="lingkaran3">
                                                                </div>
                                                                <hr>
                                                                <label>Hapus Users?</label>
                                                                <h6>Username : <b><u><?php echo $row['username'];?></u></b></h6>
                                                                <h6>Fullname : <b><u><?php echo $row['full_name'];?></u></b></h6>
                                                                <h6>Role : <b><u><?php echo $row['user_role'];?></u></b></h6>
                                                                <h6>Email : <b><u><?php echo $row['email'];?></u></b></h6>
                                                                <h6>Jenis Kelamin : <b><u><?php echo $row['jenis_kelamin'];?></u></b></h6>
                                                                <h6>Alamat : <b><u><?php echo $row['alamat'];?></u></b></h6>
                                                                <h6>No. HP : <b><u><?php echo $row['no_hp'];?></u></b></h6>
                                                                <h6>Jabatan : <b><u><?php echo $row['jabatan'];?></u></b></h6>
                                                                <h6>Bidang/Instalasi/Komite : <b><u><?php echo $row['unit'];?></u></b></h6>
                                                                <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $row['user_id'];?>" required>
                                                              </div>
                                                              <button type="submit" name="delete" class="btn btn-primary btn-block btn-flat">Yes</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">No</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END DELETE -->

                                                    <!-- UPDATE FOTO -->
                                                    <div class="modal fade" id="updatefoto<?php echo $row['user_id'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Ubah Foto Profile</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="" enctype="multipart/form-data">
                                                              <div class="form-group">
                                                                <div align="center">
                                                                  <img src="assets/images/user/<?php echo $row['foto']; ?>"  class="lingkaran1">
                                                                </div>
                                                                <hr>
                                                                <label>Upload File</label>
                                                                <input type="file" name="foto" placeholder="Upload ...">
                                                                <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'];?>" required>
                                                              </div>
                                                              <button type="submit" name="uploadfoto" class="btn btn-primary btn-block btn-flat">Submit</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE FOTO -->

                                                    <!-- UPDATE PASSWORD -->
                                                    <div class="modal fade" id="change<?php echo $row['user_id'];?>" role="dialog">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <label class="modal-title">Input Password Baru</label>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                              <span aria-hidden="true">&times;</span>
                                                            </button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <form method="post" action="">
                                                              <div class="form-group">
                                                                <label>Password Baru</label>
                                                                <input type="password" name="password" class="form-control" placeholder="Password Baru ..." required>
                                                                <input type="hidden" name="user_id" class="form-control" placeholder="client name" value="<?php echo $row['user_id'];?>" required>
                                                              </div>
                                                              <button type="submit" name="changepassword" class="btn btn-primary btn-block btn-flat">Ganti Password</button>
                                                              <button type="button" class="btn btn-warning btn-block btn-flat" data-dismiss="modal">Close</button>
                                                            </form>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <!-- END UPDATE PASSWORD -->
                                                <?php } } mysqli_close($con); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                  <th>ID</th>
                                                  <th>Foto</th>
                                                  <th>Username</th>
                                                  <th>Password</th>
                                                  <th>Role</th>
                                                  <th>Full Name</th>
                                                  <th>Detail User</th>
                                                  <th>Action</th>
                                                </tr>
                                            </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "include/footer.php" ?>
    <?php include 'include/thirdparty.php'; ?>
</body>
</html>