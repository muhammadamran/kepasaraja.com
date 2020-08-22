<!DOCTYPE html>
<html lang="en">
<head>
	<title>Kepasaraja.com - Admin Panel</title>
	<link rel="icon" type="assets/image/png" href="<?php echo base_url('assets/img/logo/logo.png');?>"/>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/bootstrap/css/bootstrap.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/animate/animate.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/css-hamburgers/hamburgers.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/animsition/css/animsition.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/select2/select2.min.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/vendor/daterangepicker/daterangepicker.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/css/util.css');?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('template/login/css/main.css');?>">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-34">
						Account Login
					</span>
					
					<div class="wrap-input100 rs1-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" name="username" placeholder="User name">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 rs2-wrap-input100 validate-input m-b-20" data-validate="Type password">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239">
						<span class="txt1">
							Forgot
						</span>
						<a href="#" class="txt2">
							User name / password?
						</a>
					</div>
					<div class="w-full text-center">
						<a href="#" class="txt3">
							Sign Up
						</a>
					</div>
				</form>
				<div class="login100-more" style="background-image: url(<?php echo base_url('template/login/images/bg-02.png');?>"></div>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	<script src="<?php echo base_url('template/login/vendor/jquery/jquery-3.2.1.min.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/animsition/js/animsition.min.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/bootstrap/js/popper.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/bootstrap/js/bootstrap.min.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/select2/select2.min.js');?>"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
	<script src="<?php echo base_url('template/login/vendor/daterangepicker/moment.min.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/daterangepicker/daterangepicker.js');?>"></script>
	<script src="<?php echo base_url('template/login/vendor/countdowntime/countdowntime.js');?>"></script>
	<script src="<?php echo base_url('template/login/js/main.js');?>"></script>
</body>
</html>