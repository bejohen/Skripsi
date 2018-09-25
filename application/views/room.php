<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body>
	
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			
				<h2>Pesan Kamar </h2>
				
				
				<h3>Silahkan menentukan tanggal checkin dan checkout
					di formulir yang telah disediakan untuk selanjutnya melakukan proses reservasi</h3>
				
			
				<p class="alert yellow">Hotel Garuda Wira</p>
			</div>
				
			
		
		<aside>
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
								<label>Check in</label>
								<input type="text" name="checkin" placeholder="mm/dd/yyyy" class="datepicker-from required">
								<label>Check out</label>
								<input type="text" name="checkout"  placeholder="mm/dd/yyyy" class="datepicker-from required">
								<div class="clear"></div>
								<input type="hidden" name="form" value="availability">
								<button type="submit" name="submit">Cek Ketersediaan Kamar</button>
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
		
		</aside>
		<?php $this->load->view('include/footer'); ?>
</body>

</html>