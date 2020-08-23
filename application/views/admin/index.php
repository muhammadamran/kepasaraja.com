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
      <div class="dashboard-influence">
        <div class="container-fluid dashboard-content">
          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <div class="page-header">
                <h3 class="mb-2">Home Page</h3>
                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                <div class="page-breadcrumb">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="<?php echo base_url()."index.php/AdminHome";?>" class="breadcrumb-link">Admin Panel</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Home</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <?php
          $con=mysqli_connect("localhost","root","","db_kepasaraja");
          if (mysqli_connect_errno())
          {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
          }

          $roles = $this->session->userdata("username");
          $result = mysqli_query($con,"SELECT * FROM tb_user WHERE username='$roles'");
          if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result))
            {
              ?>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
                <div class="tab-vertical">
                  <ul class="nav nav-tabs" id="myTab3" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="home-vertical-tab" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home" aria-selected="true">Akun</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="profile-vertical-tab" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile" aria-selected="false">Change Picture</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="contact-vertical-tab" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact" aria-selected="false">Change Password</a>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent3">
                    <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-vertical-tab">
                      <?php echo form_open_multipart(site_url('AdminHome/update/'.$row['user_id']));?>
                      <div class="text-center">
                        <?php
                        if ($row['foto']==NULL) { ?>
                          <img class="lingkaran3" src="<?php echo base_url('template/assets/images/user/avatar.jpg')?>" alt="User profile picture">   
                        <?php }else{ ?>
                          <img src="<?php echo base_url().'template/assets/images/user/'. $row['foto'];?>" class="lingkaran3" alt="User profile picture">   
                        <?php } ?>
                      </div>
                      <br>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Username</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" value="<?php echo $row['username']; ?>" readonly>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" placeholder="Full Name" name="fullname" value="<?php echo $row['fullname']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $row['email']; ?>">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                          <select class="form-control" id="inputName2" name="jenis_kelamin">
                            <option value="<?php echo $row['jenis_kelamin']; ?>"><?php echo $row['jenis_kelamin']; ?></option>
                            <option value="">-- Pilih Jenis Kelamin --</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" name="update" class="btn btn-primary">Update Akun</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane fade" id="profile-vertical" role="tabpanel" aria-labelledby="profile-vertical-tab">
                    <?php echo form_open_multipart(site_url('AdminHome/updatefoto/'.$row['user_id']));?>
                    <div class="text-center">
                      <?php
                      if ($row['foto']==NULL) { ?>
                        <img class="lingkaran3" src="<?php echo base_url('template/assets/images/user/avatar.jpg')?>" alt="User profile picture">   
                      <?php }else{ ?>
                        <img src="<?php echo base_url().'template/assets/images/user/'. $row['foto'];?>" class="lingkaran3" alt="User profile picture">   
                      <?php } ?>
                    </div>
                    <br>
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Import File</label>
                      <div class="col-sm-10">
                        <input type="file" class="form-control" placeholder="File" name="foto">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" name="updatefoto" class="btn btn-primary">Update Picture</button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade" id="contact-vertical" role="tabpanel" aria-labelledby="contact-vertical-tab">
                  <?php echo form_open_multipart(site_url('AdminHome/changepassword/'.$row['user_id']));?>
                  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">New Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" placeholder="New Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" name="updatepass" class="btn btn-primary">Update Password</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      <?php } } mysqli_close ($con);?>
      <!-- <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card influencer-profile-data">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
                  <div class="text-center">
                    <?php
                    if ($this->session->userdata("foto")==NULL) { ?>
                      <img src="<?php echo base_url('template/assets/images/user/avatar.png')?>" alt="AdminLTE Logo" class="rounded-circle user-avatar-xxl">   
                    <?php }else{ ?>
                      <img src="<?php echo base_url().'template/assets/images/user/'. $this->session->userdata("foto");?>" alt="AdminLTE Logo" class="rounded-circle user-avatar-xxl">   
                    <?php } ?>
                  </div>
                </div>
                <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
                  <div class="user-avatar-info">
                    <div class="m-b-20">
                      <div class="user-avatar-name">
                        <h2 class="mb-1"><?php echo $this->session->userdata("fullname"); ?></h2>
                      </div>
                      <div class="rating-star  d-inline-block">
                        <i class="fa fa-fw fa-star"></i>
                        <i class="fa fa-fw fa-star"></i>
                        <i class="fa fa-fw fa-star"></i>
                        <i class="fa fa-fw fa-star"></i>
                        <i class="fa fa-fw fa-star"></i>
                      </div>
                    </div>
                    <div class="user-avatar-address">
                      <p class="border-bottom pb-3">
                        <span class="d-xl-inline-block d-block mb-2"><i class="fa fa-map-marker-alt mr-2 text-dark "></i> Bandung, Indonesia</span>
                        <span class="mb-2 ml-xl-4 d-xl-inline-block d-block">Joined date: <?php echo $this->session->userdata("date_make"); ?>  </span>
                        <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"> </span>
                        <br>
                        <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#foto<?php echo $this->session->userdata("user_id"); ?>" title="Edit Profile">Change Foto</span>
                        <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#addfile<?php echo $this->session->userdata("user_id"); ?>" title="Edit Profile">Edit Profile</span>
                        <span class="btn btn-outline-dark btn-xs" data-toggle="modal" data-target="#change<?php echo $this->session->userdata("user_id"); ?>" title="Change Password">Change Password</span>
                      </p>
                      <div class="mt-3">
                        <a href="#" class="badge badge-light mr-1"><?php echo $this->session->userdata("role"); ?></a> 
                        <a href="#" class="badge badge-light mr-1"><?php echo $this->session->userdata("email"); ?></a> 
                        <a href="#" class="badge badge-light"><?php echo $this->session->userdata("jenis_kelamin"); ?></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="border-top user-social-box" align="center">
              <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>-</span></div>
              <div class="user-social-media d-xl-inline-block"><span class="mr-2 youtube-color"> <i class="fab fa-youtube"></i></span><span>-</span></div>
            </div>
          </div>
        </div>
      </div> -->
      <!-- INFORMASI -->
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="card" id="headings">
            <h5 class="card-header">Informasi</h5>
            <div class="card-body">
              <h1 align="center">Admin Panel kepasaraja.com</h1>
              <br>
              <p align="center"><img src="<?php echo base_url('template/login/images/bg-02.jpg')?>" width="500px"></p>
            </div>
          </div>
        </div>
      </div>
      <!-- END INFORMASI -->
    </div>
  </div>
</body>
</html>