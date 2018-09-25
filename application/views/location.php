<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('include/head'); ?>
<body>
	<?php $this->load->view('include/topnavbar'); ?>	
	<div class="wrapper">
		<div class="main">
			<div class="one">
				<h3>Lokasi dan Kontak Kami</h3>
				<p></p>
				<p>&nbsp;<img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt="">&nbsp; Jl. Letjen R.Suprapto No.88, Tanah Tinggi, Johar Baru, Jakarta Pusat, DKI Jakarta</p>
				<ul class="contact">
					<li style="list-style:none;color:#000;" class="phone"><a href="#">+62 896 6827 4304</a></li>
					<li style="list-style:none;color:#000;" class="chat"><a href="#">+62 896 6827 4304</a></li>
					<li style="list-style:none;color:#000;" class="email"><a href="#">suncity@gmail.com</a></li>
				</ul>
				
			</div>	
		</div><!-- /main -->		
			
			
				<aside>
			<h3>Hubungi Kami</h3>
			
			<form action="http://live.bobosh.com/travelium/form.php" id="form-contact" method="post">
				<label>Name <span style="color:red;">*</span><em>(required)</em></label>
				<input type="text" name="name" class="required name" size="28">
				<label>Message <span style="color:red;">*</span><em>(required)</em></label>
				<textarea name="message" cols="56" rows="8" class="required"></textarea>
				
				
				<label>Email <span style="color:red;">*</span><em>(required)</em></label>
				<input type="text" name="email" class="required email" size="28">
				
				<input type="hidden" name="form" value="contact">
				<button type="submit" name="submit">Kirim Pesan</button>
			</form>
		</aside>
		
		
		
	<?php $this->load->view('include/footer'); ?>
	
</body>

</html>