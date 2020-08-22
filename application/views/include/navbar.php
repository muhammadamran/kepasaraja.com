Top Bar -->
<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url()."index.php/Home"; ?>"><img src="<?php echo base_url('assets/images/logo/logo.png');?>" width="50" height="30" /></a>
        </div>
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="<?php echo base_url()."index.php/Home"; ?>"><b>Aplikasi Pegadaian Customer Focus</b></a>
        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
            <?php if($this->session->userdata('role') == 'Nasabah'){ ?>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <i class="material-icons">notifications</i>
                        <?php
                        $con=mysqli_connect("localhost","root","","db_pegadaian");
                        if (mysqli_connect_errno())
                        {
                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                        }

                        $get_reviewer = mysqli_query($con,"SELECT `id_notif`, `title`, `created_at`, COUNT(`id_notif`) AS notif FROM tb_notif WHERE `is_read`=0");
                        while($row_reviewer = mysqli_fetch_array($get_reviewer)) {
                        ?>
                        <span class="label-count"><?php echo $row_reviewer['notif'];?></span>
                        <?php } } ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <?php
                                    $con=mysqli_connect("localhost","root","","db_pegadaian");
                                    // Check connection
                                    if (mysqli_connect_errno())
                                    {
                                        echo "Failed to connect to MySQL: " . mysqli_connect_error();
                                    }

                                    $result = mysqli_query($con,"SELECT * FROM tb_notif WHERE is_read=0 ORDER BY id_notif DESC");
                                    if(mysqli_num_rows($result)>0){

                                        while($row = mysqli_fetch_array($result))
                                        {
                                    ?>
                                    <a href="javascript:void(0);">
                                        <div class="icon-circle bg-light-green">
                                            <i class="material-icons">event</i>
                                        </div>
                                        <div class="menu-info">
                                            <h4><?php echo $row['title'];?></h4>
                                            <p>
                                                <i class="material-icons">access_time</i> <?php echo $row['created_at'];?>
                                            </p>
                                        </div>
                                    </a>
                                   <!-- <?php echo form_open_multipart(site_url('BarangGadai/hidenotif/'.$row['id_notif'])); ?>
                                        <button type="submit" name="submit" class="btn btn-default btn-block" data-type="success">
                                            <div align="left">
                                                <div class="icon-circle bg-light-green">
                                                    <i class="material-icons">event</i>
                                                </div>
                                                <div class="menu-info">
                                                    <h4><?php echo $row['title'];?></h4>
                                                    <p>
                                                        <i class="material-icons">access_time</i> <?php echo $row['created_at'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </button>
                                    </form> -->
                                    <?php
                                        } } mysqli_close($con);
                                    ?>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                         <!--    <?php echo form_open_multipart(site_url('BarangGadai/hidenotif')); ?>
                                <button type="submit" name="submit" class="btn btn-default btn-block" data-type="success">
                                    View All Notification
                                </button>
                            </form>
                            <?php
                            ?> -->
                            <a href="<?php echo site_url('BarangGadai/indexnasabahnotification'); ?>">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <li class="pull-right"><a href="<?php echo site_url('login/logout'); ?>" class="js-right-sidebar" data-close="true"><i class="material-icons">input</i></a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- #Top Bar