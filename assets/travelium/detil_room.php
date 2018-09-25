<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body>
	
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			<h1>Single Room <em>$89</em></h1>

			<p class="ingress">Enjoy your holiday in our suspendisse ante ligula, adipiscing porta aliquam et, rutrum nec lectus. Nulla erat risus, molestie non dapibus ac, fermentum vitae felis.</p>
			
			<p><img src="img/rooms-single.jpg" alt=""></p>
			
			<p>Donec tristique hendrerit dui vitae lacinia. Suspendisse ante ligula, adipiscing porta aliquam et, rutrum nec lectus. Nulla erat risus, molestie non dapibus ac, fermentum vitae felis.</p>			

			<h2>Room amenities</h2>
			
			<ul class="features">
				<li>Free Wifi</li>
				<li>Air Conditioning</li>
				<li>HDTV</li>
				<li>Mini Bar</li>
				<li>Alarm</li>
				<li>Coffee Maker</li>
				<li>Telephone</li>
				<li>Non-smoking</li>
				<li>And much more...</li>
			</ul>
		</div><!-- /main -->
		
		<aside>
			<!-- availability/enquiry widget -->
			<div class="availability">
				<div class="availability-inner">
					<div class="tabs">
						<ul class="tabs-nav">
							<li class="tabs-selected"><a href="#tab-1">Ketersediaan</a>
							<li><a href="#tab-2">Pesan</a>
						</ul>

						<div id="tab-1">
							<form action="<?php echo base_url().'reservasi/cek'?>" class="form-availability" method="post">
								<div class="one_half">
									<label>Check in</label>
									<input type="text" name="checkin" class="datepicker-from required">
								</div>

								<div class="one_half last">
									<label>Check out</label>
									<input type="text" name="checkout" class="datepicker-to required">
								</div><div class="clear"></div>
								
								<label>Jumlah</label>
								<input type="text" name="jumlah" class="required name" size="28">
								
								
								<input type="hidden" name="form" value="availability">
								<button type="submit" name="submit">Cek</button>
							</form>
						</div><!-- /tab-1 -->
						
						<div id="tab-2" class="tabs-hide">
							<form action="http://live.bobosh.com/travelium/form.php" class="form-contact" method="post">
								<label>Pesan</label>
								<textarea name="message" cols="56" rows="5" class="required"></textarea>
								
								<label>Nama</label>
								<input type="text" name="name" class="required name" size="28">
								
								<label>Email</label>
								<input type="text" name="email" class="required email" size="28">
								
								<input type="hidden" name="form" value="contact">
								<button type="submit" name="submit">Send</button>
							</form>
						</div><!-- /tab-2 -->
					</div><!-- /tabs -->
				</div><!-- /availability-inner -->
			</div><!-- /availability -->
			
			<h4>We accept</h4>

			<ul class="payment">
				<li class="paypal">Paypal</li>
				<li class="amex">Amex</li>
				<li class="mastercard">Mastercard</li>
				<li class="visa">Visa</li>
			</ul>
		</aside>
		<?php $this->load->view('include/footer'); ?>
</body>

</html>