<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?php echo base_url().'assets/images/user/'. $this->session->userdata("foto"); ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b><?php echo $this->session->userdata("fullname"); ?></b></div>
                <div class="email">CIF: <?php echo $this->session->userdata("cif"); ?></div>
                <div class="email">Email: <?php echo $this->session->userdata("email"); ?></div>
                <div class="email">Telephone: <?php echo $this->session->userdata("tlp"); ?></div>
                <div class="btn-group user-helper-dropdown">
                    <a href="<?php echo base_url()."index.php/Registrasi/editprofile"; ?>">
                        <i class="material-icons" >person</i>
                    </a>
                </div>
            </div>
        </div>
        <!-- #User Info -->

        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url()."index.php/Home"; ?>">
                        <i class="material-icons">home</i>
                        <span>Home</span>
                    </a>
                </li>
                
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Administrator -->
                <?php if($this->session->userdata('role') == 'Administrator'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexadministrator"; ?>">
                        <i class="material-icons">next_week</i>
                        <span>Data Gadai</span>
                    </a>
                </li>
                <li class="header">JATUH TEMPO NASABAH</li>
                <li>
                    <a href="<?php echo base_url()."index.php/KreditJatuhTempo/indexadministrator"; ?>">
                        <i class="material-icons col-red">warning</i>
                        <span>Kredit Jatuh Tempo</span>
                    </a>
                </li>
                <li class="header">LAPORAN BARANG GADAI</li>
                <li>
                    <a href="<?php echo base_url()."index.php/CetakLaporan/indexadmin"; ?>">
                        <i class="material-icons">insert_drive_file</i>
                        <span>Laporan Transfer Gadai</span>
                    </a>
                </li>
                <li class="header">PROMO BARANG GADAI</li>
                <li>
                    <a href="<?php echo base_url()."index.php/Promosi/indexadministrator"; ?>">
                        <i class="material-icons">assistant</i>
                        <span>Promosi Nasabah</span>
                    </a>
                </li>
                <li class="header">USERS</li>
                <li>
                    <a href="<?php echo base_url()."index.php/User"; ?>">
                        <i class="material-icons">account_circle</i>
                        <span>Data User</span>
                    </a>
                </li>
                <?php } ?>
                <!-- #Administrator -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Nasabah -->
                <?php if($this->session->userdata('role') == 'Nasabah'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexnasabah"; ?>">
                        <i class="material-icons">create_new_folder</i>
                        <span>Kredit Barang Gadai & Transaksi</span>
                    </a>
                </li>
                <li class="header">JATUH TEMPO</li>
                <li>
                    <a href="<?php echo base_url()."index.php/KreditJatuhTempo/indexnasabah"; ?>">
                        <i class="material-icons col-red">warning</i>
                        <span>Kredit Jatuh Tempo</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <?php
                    if (@$notifjat) :
                    foreach ($notifjat as $key) : 
                    ?>
                        <button type="button" class="btn bg-red waves-effect"><?= $key->jat?></button>
                    <?php 
                    endforeach;
                  endif;
                  ?> -->
                    </a>
                </li>
                <li class="header">INFORMASI PROMOSI</li>
                <li>
                    <a href="<?php echo base_url()."index.php/Promosi/indexnasabah"; ?>">
                        <img src="<?php echo base_url('assets/images/logo/logo.png');?>" width="50" height="30" />
                        <span>Cek Promosi</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <!-- <button type="button" class="btn bg-green waves-effect">0</button> -->
                    </a>
                </li>
                <!-- <li class="header">HISTORY</li>
                <li>
                    <a href="<?php echo base_url()."index.php/History/indexnasabah"; ?>">
                        <i class="material-icons">history</i>
                        <span>History Kredit Barang Gadai</span>
                    </a>
                </li> -->
                <?php } ?>
                <!-- #Nasabah -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Penaksir -->
                <?php if($this->session->userdata('role') == 'Penaksir'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexpenaksir"; ?>">
                        <i class="material-icons">next_week</i>
                        <span>Data Gadai</span>
                    </a>
                </li>
                <?php } ?>
                <!-- #Penaksir -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Pimpinan -->
                <?php if($this->session->userdata('role') == 'Pimpinan'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexpimpinan"; ?>">
                        <i class="material-icons">folder_shared</i>
                        <span>Data Penaksir Gadai</span>
                    </a>
                </li>
                <?php } ?>
                <!-- #Pimpinan -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Kasir -->
                <?php if($this->session->userdata('role') == 'Kasir'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexkasir"; ?>">
                        <i class="material-icons">monetization_on</i>
                        <span>Transaksi Gadai</span>
                    </a>
                </li>
                <li class="header">JATUH TEMPO</li>
                <li>
                    <a href="<?php echo base_url()."index.php/KreditJatuhTempo/indexkasir"; ?>">
                        <i class="material-icons col-red">warning</i>
                        <span>Kredit Jatuh Tempo</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <!-- <?php
                    if (@$notifjat) :
                    foreach ($notifjat as $key) : 
                    ?>
                        <button type="button" class="btn bg-red waves-effect"><?= $key->jat?></button>
                    <?php 
                    endforeach;
                  endif;
                  ?> -->
                    </a>
                </li>
                <li class="header">LAPORAN BARANG GADAI</li>
                <li>
                    <a href="<?php echo base_url()."index.php/CetakLaporan"; ?>">
                        <i class="material-icons">insert_drive_file</i>
                        <span>Laporan Transfer Gadai</span>
                    </a>
                </li>
                <!-- <li>
                    <a href="<?php echo base_url()."index.php/BarangGadai/indexkasir"; ?>">
                        <i class="material-icons">developer_board</i>
                        <span>Data Barang Gadai</span>
                    </a>
                </li> -->
                <?php } ?>
                <!-- #Kasir -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Manajer -->
                <?php if($this->session->userdata('role') == 'Manajer'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/Promosi/indexmanajer"; ?>">
                        <i class="material-icons">multiline_chart</i>
                        <span>Data Anggaran Promosi</span>
                    </a>
                </li>
                <?php } ?>
                <!-- #Manajer -->
<!-- -----------------------------------ROLE-------------------------------------------------- -->
                <!-- Budgeting -->
                <?php if($this->session->userdata('role') == 'Budgeting'){ ?>
                <li>
                    <a href="<?php echo base_url()."index.php/Promosi/indexbudgeting"; ?>">
                        <i class="material-icons">assistant</i>
                        <span>Promosi Nasabah</span>
                    </a>
                </li>
                <?php } ?>
                <!-- #Budgeting -->
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 <a href="javascript:void(0);">Aplikasi-Pegadaian Customer Focus</a>.
            </div>
            <div class="version" align="center">
                <b>Version: </b> 1.0.9
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>