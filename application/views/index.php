<!DOCTYPE html>
<html lang="eng">
<?php require ('include/head.php'); ?>
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
		width: 55%;
		height: 100px;
	}
</style>
<body>
	<div id="preloder">
		<div class="loader"></div>
	</div>
	<div class="humberger__menu__overlay"></div>
	<div class="humberger__menu__wrapper">
		<div class="humberger__menu__logo">
			<a href="#"><img src="<?php echo base_url('assets/img/brand/brand.png');?>" alt=""></a>
		</div>
		<div class="humberger__menu__cart">
			<ul>
				<li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
				<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
			</ul>
			<div class="header__cart__price">item: <span>$150.00</span></div>
		</div>
		<div class="humberger__menu__widget">
			<div class="header__top__right__language">
				<img src="<?php echo base_url('assets/img/language.png');?>" alt="">
				<div>English</div>
				<span class="arrow_carrot-down"></span>
				<ul>
					<li><a href="#">Spanis</a></li>
					<li><a href="#">English</a></li>
				</ul>
			</div>
			<div class="header__top__right__auth">
				<a href="#"><i class="fa fa-user"></i> Login</a>
			</div>
		</div>
		<nav class="humberger__menu__nav mobile-menu">
			<ul>
				<li class="active"><a href="<?php echo base_url()."index.php/Home";?>">Home</a></li>
				<li><a href="./shop-grid.html">Shop</a></li>
				<li><a href="#">Pages</a>
					<ul class="header__menu__dropdown">
						<li><a href="./shop-details.html">Shop Details</a></li>
						<li><a href="./shoping-cart.html">Shoping Cart</a></li>
						<li><a href="./checkout.html">Check Out</a></li>
						<li><a href="./blog-details.html">Blog Details</a></li>
					</ul>
				</li>
				<li><a href="./blog.html">Blog</a></li>
				<li><a href="./contact.html">Contact</a></li>
			</ul>
		</nav>
		<div id="mobile-menu-wrap"></div>
		<div class="header__top__right__social">
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
		    ?>
			<a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
			<a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
			<a href="<?php echo $row['linkendin']; ?>" target="_balnk"><i class="fa fa-linkedin"></i></a>
			<a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
			<?php } } mysqli_close($con); ?>
		</div>
		<div class="humberger__menu__contact">
			<ul>
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
			    ?>
				<li><i class="fa fa-envelope"></i> <?php echo $row['mail'];?></li>
				<li><?php echo $row['slogan'];?></li>
				<?php } } mysqli_close($con); ?>
			</ul>
		</div>
	</div>
	<header class="header">
		<div class="header__top">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6">
						<div class="header__top__left">
							<ul>
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
							    ?>
								<li><i class="fa fa-envelope"></i> <?php echo $row['mail'];?></li>
								<li><?php echo $row['slogan'];?></li>
								<?php } } mysqli_close($con); ?>
							</ul>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<div class="header__top__right">
							<div class="header__top__right__social">
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
							    ?>
								<a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
								<a href="<?php echo $row['linkendin']; ?>" target="_balnk"><i class="fa fa-linkedin"></i></a>
								<a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-pinterest-p"></i></a>
								<?php } } mysqli_close($con); ?>
							</div>
							<div class="header__top__right__language">
								<img src="<?php echo base_url('assets/img/indonesia.png');?>" alt="">
								<div>INA</div>
								<!-- <span class="arrow_carrot-down"></span>
								<ul>
									<li><a href="#">Spanis</a></li>
									<li><a href="#">English</a></li>
								</ul> -->
							</div>
							<div class="header__top__right__auth">
								<a href="#"><i class="fa fa-user"></i> Login</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="header__logo">
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
					    ?>
						<a href="<?php echo base_url()."index.php/Home";?>"><img src="<?php echo base_url('assets/img/brand/'.$row['logo']);?>" alt=""></a>
						<?php } } mysqli_close($con); ?>
					</div>
				</div>
				<div class="col-lg-6">
					<nav class="header__menu">
						<ul>
							<li class="active"><a href="<?php echo base_url()."index.php/Home";?>">Home</a></li>
							<li><a href="./shop-grid.html">Shop</a></li>
							<li><a href="#">Pages</a>
								<ul class="header__menu__dropdown">
									<li><a href="./shop-details.html">Shop Details</a></li>
									<li><a href="./shoping-cart.html">Shoping Cart</a></li>
									<li><a href="./checkout.html">Check Out</a></li>
									<li><a href="./blog-details.html">Blog Details</a></li>
								</ul>
							</li>
							<li><a href="./blog.html">Blog</a></li>
							<li><a href="./contact.html">Contact</a></li>
						</ul>
					</nav>
				</div>
				<!-- <div class="col-lg-3">
					<div class="header__cart">
						<ul>
							<li><a href="#"><i class="fa fa-heart"></i> <span>0</span></a></li>
							<li><a href="#"><i class="fa fa-shopping-bag"></i> <span>0</span></a></li>
						</ul>
						<div class="header__cart__price">Total Belanja: <span>Rp. -</span></div>
					</div>
				</div> -->
			</div>
			<div class="humberger__open">
				<i class="fa fa-bars"></i>
			</div>
		</div>
	</header>
	<section class="hero">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="hero__categories">
						<div class="hero__categories__all">
							<i class="fa fa-bars"></i>
							<span>Semua Kategori</span>
						</div>
						<ul>
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
						    ?>
							<li><a href="#"><?php echo $row['nama_kategori']; ?></a></li>
							<?php } } mysqli_close($con); ?>	
						</ul>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="hero__search">
						<div class="hero__search__form">
							<form action="#">
								<div class="hero__search__categories">
									Cari Kategori
									<span class="arrow_carrot-down"></span>
								</div>
								<input type="text" placeholder="Cari kebutuhan anda disini...">
								<button type="submit" class="site-btn">KLIK DISNI</button>
							</form>
						</div>
						<div class="hero__search__phone">
							<div class="hero__search__phone__icon">
								<i class="fa fa-phone"></i>
							</div>
							<div class="hero__search__phone__text">
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
							    ?>
								<h5><?php echo $row['telepone']; ?></h5>
								<span><small><?php echo $row['pesan']; ?></small></span>
								<?php } } mysqli_close($con); ?>
							</div>
						</div>
					</div>
					<div class="hero__item set-bg" data-setbg="<?php echo base_url('assets/img/hero/banner.jpg');?>">
						<div class="hero__text">
							<span>FRUIT FRESH</span>
							<h2>Vegetable <br />100% Organic</h2>
							<p>Free Pickup and Delivery Available</p>
							<a href="#" class="primary-btn">SHOP NOW</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="categories">
		<div class="container">
			<div class="row">
				<div class="categories__slider owl-carousel">
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
				    ?>
					<div class="col-lg-3">
						<div class="categories__item set-bg" data-setbg="<?php echo base_url('assets/img/kategori/'.$row['gambar_kategori']);?>">
							<h5><a href="#"><?php echo $row['nama_kategori']; ?></a></h5>
						</div>
					</div>
					<?php } } mysqli_close($con); ?>
				</div>
			</div>
		</div>
	</section>
	<section class="featured spad">
		<div class="container">
			<!-- <div class="row">
				<div class="col-lg-12">
					<?php
				    $con=mysqli_connect("localhost","root","","db_kepasaraja");
				    if (mysqli_connect_errno())
				    {
				        echo "Failed to connect to MySQL: " . mysqli_connect_error();
				    }
				    $result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status=4 ORDER BY id DESC");

				    if(mysqli_num_rows($result)>0){
				        while($row = mysqli_fetch_array($result))
				        {
				    ?>
					<div class="section-title">
						<h2><?php echo $row['judul']; ?></h2>
					</div>
					<div class="featured__controls">
						<ul>
							<li class="active" data-filter="*"><?php echo $row['opsi']; ?></li>
						</ul>
					</div>
					<?php } } mysqli_close($con); ?>
				</div>
			</div> -->
			<!-- <div class="row featured__filter">
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
			    ?>
				<div class="col-lg-3 col-md-4 col-sm-6 mix vegetables fresh-meat">
					<div class="featured__item">
						<div class="featured__item__pic set-bg" data-setbg="<?php echo base_url('assets/img/produk/'.$row['gambar_produk']);?>">
							<ul class="featured__item__pic__hover">
								<li><a href="#"><i class="fa fa-heart"></i></a></li>
								<li><a href="#"><i class="fa fa-retweet"></i></a></li>
								<li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
							</ul>
						</div>
						<div class="featured__item__text">
							<h6><a href="#"><?php echo $row['nama_produk']; ?></a></h6>
							<h5><?php echo matauang($row['harga_produk']); ?></h5>
						</div>
					</div>
				</div>
				<?php } } mysqli_close($con); ?>
			</div> -->
		</div>
	</section>
	<div class="banner">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner__pic">
						<img src="<?php echo base_url('assets/img/banner/banner-1.jpg');?>" alt="">
					</div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="banner__pic">
						<img src="<?php echo base_url('assets/img/banner/banner-2.jpg');?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="latest-product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<?php
					    $con=mysqli_connect("localhost","root","","db_kepasaraja");
					    if (mysqli_connect_errno())
					    {
					        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					    }
					    $result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status=1 ORDER BY id DESC");

					    if(mysqli_num_rows($result)>0){
					        while($row = mysqli_fetch_array($result))
					        {
					    ?>
						<h4><?php echo $row['judul']; ?></h4>
						<?php } } mysqli_close($con); ?>
						<div class="latest-product__slider owl-carousel">
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00<small><sup>1/2KG</sup></small></span>
										<small style="text-decoration: line-through;">Crab Pool Security</small>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<?php
					    $con=mysqli_connect("localhost","root","","db_kepasaraja");
					    if (mysqli_connect_errno())
					    {
					        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					    }
					    $result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status=2 ORDER BY id DESC");

					    if(mysqli_num_rows($result)>0){
					        while($row = mysqli_fetch_array($result))
					        {
					    ?>
						<h4><?php echo $row['judul']; ?></h4>
						<?php } } mysqli_close($con); ?>
						<div class="latest-product__slider owl-carousel">
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6">
					<div class="latest-product__text">
						<?php
					    $con=mysqli_connect("localhost","root","","db_kepasaraja");
					    if (mysqli_connect_errno())
					    {
					        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					    }
					    $result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status=3 ORDER BY id DESC");

					    if(mysqli_num_rows($result)>0){
					        while($row = mysqli_fetch_array($result))
					        {
					    ?>
						<h4><?php echo $row['judul']; ?></h4>
						<?php } } mysqli_close($con); ?>
						<div class="latest-product__slider owl-carousel">
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
							<div class="latest-prdouct__slider__item">
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-1.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
										<h6>Crab Pool Security</h6>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-2.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
								<a href="#" class="latest-product__item">
									<div class="latest-product__item__pic">
										<img src="<?php echo base_url('assets/img/latest-product/lp-3.jpg');?>" alt="">
									</div>
									<div class="latest-product__item__text">
										<h6>Crab Pool Security</h6>
										<span>$30.00</span>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="from-blog spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="section-title from-blog__title">
						<?php
					    $con=mysqli_connect("localhost","root","","db_kepasaraja");
					    if (mysqli_connect_errno())
					    {
					        echo "Failed to connect to MySQL: " . mysqli_connect_error();
					    }
					    $result = mysqli_query($con,"SELECT * FROM tb_judul WHERE status=5 ORDER BY id DESC");

					    if(mysqli_num_rows($result)>0){
					        while($row = mysqli_fetch_array($result))
					        {
					    ?>
						<h2><?php echo $row['judul']; ?></h2>
						<?php } } mysqli_close($con); ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="<?php echo base_url('assets/img/blog/blog-1.jpg');?>" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">Cooking tips make cooking simple</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="<?php echo base_url('assets/img/blog/blog-2.jpg');?>" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6">
					<div class="blog__item">
						<div class="blog__item__pic">
							<img src="<?php echo base_url('assets/img/blog/blog-3.jpg');?>" alt="">
						</div>
						<div class="blog__item__text">
							<ul>
								<li><i class="fa fa-calendar-o"></i> May 4,2019</li>
								<li><i class="fa fa-comment-o"></i> 5</li>
							</ul>
							<h5><a href="#">Visit the clean farm in the US</a></h5>
							<p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<footer class="footer spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="footer__about">
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
					    ?>
						<div class="footer__about__logo">
							<a href="<?php echo base_url()."index.php/Home";?>"><img src="<?php echo base_url('assets/img/brand/'.$row['logo']);?>" class="lingkaran3" alt=""></a>
						</div>
						<ul>
							<li>Alamat: <?php echo $row['alamat']; ?></li>
							<li>Kontak: <?php echo $row['telepone']; ?></li>
							<li>Email: <?php echo $row['mail']; ?></li>
						</ul>
					<?php } } mysqli_close($con); ?>
					</div>
				</div>
				<div class="col-lg-6 col-md-12">
					<div class="footer__widget">
						<h6>Join Our Newsletter Now</h6>
						<p>Get E-mail updates about our latest shop and special offers.</p>
						<form action="#">
							<input type="text" placeholder="Enter your mail">
							<button type="submit" class="site-btn">Subscribe</button>
						</form>
						<div class="footer__widget__social">
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
						    ?>
							<a href="<?php echo $row['facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="<?php echo $row['twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="<?php echo $row['linkendin']; ?>" target="_balnk"><i class="fa fa-linkedin"></i></a>
							<a href="<?php echo $row['instagram']; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
							<?php } } mysqli_close($con); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="footer__copyright">
						<div class="footer__copyright__text"><p>&copy; Copyright <?php echo date('Y'); ?> All rights reserved | kepasaraja.com </p></div>
							<div class="footer__copyright__payment"><img src="<?php echo base_url('assets/img/payment-item.png');?>" alt=""></div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<script src="<?php echo base_url('assets/js/jquery-3.3.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.nice-select.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery.slicknav.js');?>"></script>
		<script src="<?php echo base_url('assets/js/mixitup.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/owl.carousel.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/main.js');?>"></script>
	</body>
	</html>