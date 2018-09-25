	<header>
		<a href="#" ><img width="400" src="<?php echo ASSET_SAYA ?>/travelium/img/sun_city.jpg" alt="Travelium" style="width:250px;"></a>
		
		<nav class="nav">
			<ul class="nav-ul">
				<li><a href="<?php echo base_url('pages') ?>" class="<?php echo $beranda; ?>">Beranda</a></li>
				<?php if(!empty($userLogin['id_pelanggan'])){ ?>
				<li><a  class="<?php echo $reservasi; ?>" href="<?php echo base_url('reservasi') ?>">Reservasi</a>
				<ul class="sub-menu">
						<li><a href="<?php echo base_url('reservasi') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-4.png" alt=""> Pesan Kamar</a></li>
						<li><a href="<?php echo base_url('reservasi/konfirmasi') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-3.png" alt=""> Konfirmasi Pembayaran</a></li>
						<li><a href="<?php echo base_url('reservasi/transaksi') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-6.png" alt=""> Reservasi Saya</a></li>
					</ul>
				</li>
				
				<?php } ?>
				<li><a href="<?php echo base_url('pages/galeri') ?>" class="<?php echo $galeri; ?>">Galeri Kamar</a></li>
				<li><a href="<?php echo base_url('pages/promo') ?>" class="<?php echo $promo; ?>">Fasilitas dan Promo</a></li>
				<li><a href="<?php echo base_url('pages/lokasi') ?>">Lokasi &amp; Kontak</a></li>
			</ul>
		</nav>
		<ul class="languages">
			<?php if(!empty($userLogin['id_pelanggan'])){ ?>
			<li><a style="text-decoration: none;color:rgba(255,255,255,0.7);"  href="<?php echo base_url('reservasi/changepass') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-5.png" style="margin-bottom:5px;" alt=""> Ganti Password</a></li>
			
			<li><a style="text-decoration: none;color:rgba(255,255,255,0.7);"  href="<?php echo base_url('login/logout') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-3.png" style="margin-bottom:5px;" alt=""> Keluar</a></li>
			<?php }else{ ?>
			<li><a style="text-decoration: none;color:rgba(255,255,255,0.7);"  href="<?php echo base_url('login') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-5.png" style="margin-bottom:5px;" alt=""> LOGIN</a></li>
			<li><a style="text-decoration: none;color:rgba(255,255,255,0.7);" href="<?php echo base_url('admin/pelanggan/daftar/front') ?>"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-7.png" style="margin-bottom:5px;" alt=""> REGISTRASI</a></li>
			<?php } ?>
		</ul>
		
	</header>
