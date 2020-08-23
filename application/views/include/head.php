<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <title><?php echo $row['title_head'];?></title>
    <link rel="icon" type="assets/image/png" href="<?php echo base_url('assets/img/logo/'.$row['icon']);?>"/>
    <?php } } mysqli_close($con); ?>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/elegant-icons.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/nice-select.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/jquery-ui.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/owl.carousel.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/slicknav.min.css');?>" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" type="text/css">
</head>