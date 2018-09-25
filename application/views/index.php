<!DOCTYPE html>
<!--[if (IE 8)&!(IEMobile)]>
<html lang="en" class="ie8">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->
 
<?php $this->load->view('include/head'); ?>
<body class="home">
	<!--topnavbar-->
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="owl-carousel">
				<div>
					<img src="<?php echo ASSET_SAYA ?>/travelium/img/slider-1.jpg" alt="">

					<div style="background-image: -moz-linear-gradient(top, #C29E50 10%, #000000);
background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #C29E50), color-stop(15.0, #000000));
background-color: #DDDDDD;height:400px;" class="slides-content">
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<h2>Selamat Datang di Website</h2>
						<div class="price">Sun City</div>
					</div>
				</div>

				<div>
					<img style="height:400px;width:1080px;" src="<?php echo ASSET_SAYA ?>/travelium/img/front_hotel.jpg" alt="">		
					
					<div class="slides-content"  style="height:400px">
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<h2>Harga Terjangkau</h2>
						<div class="price">Sun City</div>
					</div>
				</div>
				
				<div>
					<img style="height:400px;width:1080px;" src="<?php echo ASSET_SAYA ?>/travelium/img/Lobby.jpg" alt="">		

					<div class="slides-content" style="height:400px">
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<p></p>
						<h2>Pikir apalagi? Ayo pesan kamar sekarang juga...</h2>
						<div class="price">Sun City</div>
					</div>
				</div>
		</div><!-- /slider -->
		
		<div class="main">
			<div class="one_third" style="width:650px;">
				<h2>Tentang Sun City</h2>
				
				<ul class="deals" style="text-align:justify;">
					Konsep awal hotel ini adalah keasrian lingkungan dan kenyamanan bagi pelanggan seperti di rumah sendiri.<p></p>Berjalannya waktu dan persaingan bisnis hotel yang semakin ketat untuk menarik minat pelanggan dengan konsep minimalis dan simple style, membuat manajemen Sun Citymerasaperlu melakukan perubahan konsep.<p></p>Pada tahun 2014, Sun Citymelakukan pergantian manajemen dan pimpinan. Bergantinya manajemen yang lebih modern dan konsep hotel membuat Sun Citymelakukan renovasi total pada tahun 2014 dan mengganti nama menjadi Sun City dengan mengusung konsep budget hotel rate yang terjangkau dan sangat mengutamakan kebersihan demi kenyamanan pelanggan.
				</ul>
				
				<p class="alert yellow">#Tentang Sun City</p>
				
			</div>
			
			
				
			
			
			<div class="one_third last">
				<!-- availability/enquiry widget -->
				<!-- availability/enquiry widget -->
			<div class="availability">
				<div class="availability-inner">
					<div class="tabs">
						<ul class="tabs-nav">
							<li class="tabs-selected"><a href="#tab-1">Reservasi</a>
							<li><a href="#tab-2">Hubungi Kami</a>
						</ul>

						<div id="tab-1">
							<form action="<?php echo base_url().'reservasi/cek'?>" class="form-availability" method="post">
								<?php if(empty($userLogin['id_pelanggan'])){ ?>
								<label>Jika ingin melakukan proses reservasi, pelanggan harus mempunyai akun, silahkan pilih menu registrasi terlebih dahulu <a style="text-decoration: none;color:rgba(255,255,255,0.7);" href="<?php echo base_url('admin/pelanggan/daftar/front') ?>">REGISTRASI SEKARANG</a>
Sudah punya akun? <a style="text-decoration: none;color:rgba(255,255,255,0.7);"  href="<?php echo base_url('login') ?>">LOGIN</a></label>
								<?php }else{ ?>
								<label>Check in</label>
								<input type="text" name="checkin" placeholder="mm/dd/yyyy" class="datepicker-from required">
								<label>Check out</label>
								<input type="text" name="checkout"  placeholder="mm/dd/yyyy" class="datepicker-from required">
								<div class="clear"></div>
								<input type="hidden" name="form" value="availability">
								<button type="submit" name="submit">Cek Ketersediaan Kamar</button>
								<?php } ?>
							</form>
						</div><!-- /tab-1 -->
						
						<div id="tab-2" class="tabs-hide">
							<form action="http://live.bobosh.com/travelium/form.php" class="form-contact" method="post">
								<label>Name <span style="color:red;">*</span><em>(required)</em></label>
							<input type="text" name="name" class="required name" size="28">
							<label>Message <span style="color:red;">*</span><em>(required)</em></label>
							<textarea name="message" cols="56" rows="8" class="required"></textarea>
							
							
							<label>Email <span style="color:red;">*</span><em>(required)</em></label>
							<input type="text" name="email" class="required email" size="28">
							
							<input type="hidden" name="form" value="contact">
							<button type="submit" name="submit">Kirim Pesan</button>
							</form>
						</div><!-- /tab-2 -->
					</div><!-- /tabs -->
				</div><!-- /availability-inner -->
			</div><!-- /availability -->
			</div><div class="clear"></div>

			
		
		<?php $this->load->view('include/gallery'); ?>
		
		</div><!-- /main -->
		<!--footer-->
		
		<?php $this->load->view('include/footer'); ?>
		
	
</body>

</html>