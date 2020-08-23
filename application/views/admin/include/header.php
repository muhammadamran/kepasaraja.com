<script type="text/javascript"> 
  function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}
function display_ct() {
  var x = new Date()
  document.getElementById('ct').innerHTML = x;
  display_c();
}
</script>
<nav class="navbar navbar-expand-lg bg-white fixed-top">
  <a class="navbar-brand" href="<?php echo base_url()."index.php/AdminHome";?>"><font style="color: black"><small>kepasaraja.com</small></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse " id="navbarSupportedContent">
    <div align="center">
      <img src="<?php echo base_url('template/assets/images/icon/clock.jpg')?>" width="30px">
      <body onload=display_ct();>
        <span id='ct' ></span>
      </body>
    </div>
    <ul class="navbar-nav ml-auto navbar-right-top">
      <li class="nav-item dropdown nav-user">
        <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php
          if ($this->session->userdata("foto")==NULL) { ?>
            <img src="<?php echo base_url('template/assets/images/user/avatar.jpg')?>" alt="AdminLTE Logo" class="lingkaran1">   
          <?php }else{ ?>
            <img src="<?php echo base_url().'template/assets/images/user/'. $this->session->userdata("foto");?>" alt="AdminLTE Logo" class="lingkaran1">   
          <?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
          <div class="nav-user-info">
            <h5 class="mb-0 text-white nav-user-name"><?php echo $this->session->userdata("fullname"); ?></h5>
            <span class="status"></span><span class="ml-2">Available</span>
          </div>
          <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
          <a class="dropdown-item" href="<?php echo base_url()."index.php/Logout";?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

