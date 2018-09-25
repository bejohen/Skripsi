<div id="sidebar" class="sidebar                  responsive">
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'fixed')
        } catch (e) {
        }
    </script>

    <div class="sidebar-shortcuts" id="sidebar-shortcuts">

        <div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
            
            <!--
            <button class="btn btn-success">
                    <i class="ace-icon fa fa-signal"></i>
            </button>

            <button class="btn btn-info">
                    <i class="ace-icon fa fa-pencil"></i>
            </button>

            
            <button class="btn btn-warning">
                    <i class="ace-icon fa fa-users"></i>
            </button>

            <button class="btn btn-danger">
                    <i class="ace-icon fa fa-cogs"></i>
            </button>
            -->    

        </div>

        <div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
            <!--
            <span class="btn btn-success"></span>

            <span class="btn btn-info"></span>

            <span class="btn btn-warning"></span>

            <span class="btn btn-danger"></span>
            -->
        </div>
    </div>
    <?php 
    $cur1 = $this->uri->segment(2);
    ?>
    <ul class="nav nav-list">
        <li class="<?php echo ($cur1=="dashboard") ? "active" : ""; ?>" style="height: 100%;">
            <a href="<?php echo base_url('admin/dashboard') ?>">
                <i class="menu-icon fa fa-home"></i>
                <span class="menu-text"> Home </span>
            </a>

            <b class="arrow"></b>
        </li>
			<?php if($jabatan == "admin"){?>
			<li class="<?php echo ($cur1=="petugas") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-user"></i>
                    <span class="menu-text">
                        User
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/user/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>
                   
                    <li class="">
                        <a href="<?php echo base_url('admin/user/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
					
                </ul>
            </li>

            
			<li class="<?php echo ($cur1=="tipe") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-group"></i>
                    <span class="menu-text">
                       Tipe Kamar
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/tipe/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/tipe/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			<li class="<?php echo ($cur1=="fasilitas_include" ) ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-check"></i>
                    <span class="menu-text">
                        Fasilitas Include
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/fasilitas_include/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li><li class="">
                        <a href="<?php echo base_url('admin/fasilitas_include/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			<li class="<?php echo ($cur1=="fasilitas_tambahan" ) ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-bookmark"></i>
                    <span class="menu-text">
                        Fasilitas Tambahan
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/fasilitas_tambahan/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/fasilitas_tambahan/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			
			<li class="<?php echo ($cur1=="kamar") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-building"></i>
                    <span class="menu-text">
                        Kamar
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/kamar/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/kamar/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			<li class="<?php echo ($cur1=="pelanggan") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text">
                        Pelanggan
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/pelanggan/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/pelanggan/daftar_pelanggan') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			
			<?php } ?>
			<?php if($jabatan == "front"){?>
			
			<li style="display:none;" class="<?php echo ($cur1=="booking") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-book"></i>
                    <span class="menu-text">
                        Booking
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/booking/add') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tambah
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/booking/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			<li  style="display:none;" class="<?php echo ($cur1=="pelanggan") ? "active" : ""; ?>">
                <a href="<?php echo base_url('admin/pelanggan/add') ?>">
                    <i class="menu-icon fa fa-users"></i>
                    <span class="menu-text">
                        Registrasi
                    </span>
                </a>

               
            </li>
			
			<li style="display:none;" class="<?php echo ($cur1=="reservasi") ? "active" : ""; ?>">
                <a href="<?php echo base_url('admin/reservasi/add') ?>">
                    <i class="menu-icon fa fa-shopping-cart"></i>
                    <span class="menu-text">
                        Reservasi
                    </span>

                </a>
            </li>
			<li class="<?php echo ($cur1=="konfirmasi") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-star"></i>
                    <span class="menu-text">
                        Verifikasi
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">

                    <li class="">
                        <a href="<?php echo base_url('admin/konfirmasipembayaran/listpending') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar Belum Konfirmasi
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/konfirmasipembayaran/daftar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Daftar Dikonfirmasi
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
			

			<li class="<?php echo ($cur1=="batal_reservasi") ? "active" : ""; ?>">
                <a href="<?php echo base_url('admin/reservasi/batal') ?>">
                    <i class="menu-icon fa fa-close"></i>
                    <span class="menu-text">
                        Batal Reservasi
                    </span>
                </a> 
            </li>
		
			<?php } ?>
			<?php if($jabatan == "pimpi"){ ?>
			
            <li class="<?php echo ($cur1=="laporan") ? "active" : ""; ?>">
                <a href="#" class="dropdown-toggle">
                    <i class="menu-icon fa fa-list"></i>
                    <span class="menu-text">
                        Laporan
                    </span>

                    <b class="arrow fa fa-angle-down"></b>
                </a>

                <b class="arrow"></b>

                <ul class="submenu">
					
                    <li class="">
                        <a href="<?php echo base_url('admin/laporan/filter/reservasi') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Jumlah Reservasi Bulanan
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/laporan/filter/kamar') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Tipe Kamar Terfavorite
                        </a>

                        <b class="arrow"></b>
                    </li>

                    <li class="">
                        <a href="<?php echo base_url('admin/laporan/filter/tambahan') ?>">
                            <i class="menu-icon fa fa-caret-right"></i>
                            Fasilitas Tambahan Terfavorit
                        </a>

                        <b class="arrow"></b>
                    </li>
                </ul>
            </li>
           <?php } ?>
            

    </ul><!-- /.nav-list -->

    <!-- #section:basics/sidebar.layout.minimize -->
    <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
        <i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
    </div>

    <!-- /section:basics/sidebar.layout.minimize -->
    <script type="text/javascript">
        try {
            ace.settings.check('sidebar', 'collapsed')
        } catch (e) {
        }
    </script>
</div>
