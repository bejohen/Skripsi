<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body>
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			<div class="one" style="width:1000px;">
				<h1><?php echo $dataDetail['nama_kamar']?> <em><?php echo "Rp. ".number_format($dataDetail['harga'],0,".",","); ?></em></h1>
				
				<p><img src="<?php echo ASSET_SAYA ?>kamar/<?php echo $dataDetail['foto1']?>"  style="height:200px; width:240px;" alt="">
				<img src="<?php echo ASSET_SAYA ?>kamar/<?php echo $dataDetail['foto2']?>" style="height:200px; width:240px;" alt="">
				<img src="<?php echo ASSET_SAYA ?>kamar/<?php echo $dataDetail['foto3']?>" style="height:200px; width:240px;" alt="">
				<img src="<?php echo ASSET_SAYA ?>kamar/<?php echo $dataDetail['foto4']?>" style="height:200px; width:240px;" alt=""></br>
				
				<p><?php echo $dataDetail['deskripsi']; ?></p>			

				<h3>Fasilitas</h3>
				
				<ul class="features">
					<?php foreach($dataFasilitas as $value){ ?>
					<li><?php echo $value['nama_fasilitasinclude'] ?></li>
					<?php } ?>
				</ul>
				
				<form action="<?php echo base_url().'reservasi/pesan/'.$this->uri->segment(3); ?>" class="form-availability" method="post">
				<h3>PIlihan No. Kamar</h3>
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td>No. Kamar</td>
							<td>Posisi Lantai</td>
							<td>Fasilitas Tambahan</td>
						</tr>
					</thead>

					<input type="hidden" name="checkin" value="<?php echo $ReservasiData['checkin'] ?>" class="datepicker-from required">
					<input type="hidden" name="checkout" value="<?php echo $ReservasiData['checkout'] ?>" class="datepicker-to required">
					<tbody>
						<?php 
						$i = 0;
						$i_det = 0;
						foreach ($nomorkamar as $value) {
							$i_det = 0;
						?>
						<tr>
							<td><input type="checkbox" style="float:left; width:20px; margin-top:7px;" name="no_ruang[<?php echo $i ?>]" class="name" value="<?php echo $value['id_detil_kamar'] ?>"><div style="float:left;"><?php echo $value['no_ruang']; ?></td>
							<td>Lantai <?php echo $value['lantai_kamar']; ?></td>
							<td><?php foreach ($fasilitastambahan as $value) 
							  { ?>
							<input type="text" style="float:left; width:20px;margin-left:12px;margin-top:7px;" name="id_fasilitastambahan[<?php echo $i ?>][<?php echo $i_det ?>]" class="name" value="<?php echo $value['id_fasilitastambahan'] ?>"><div style="float:left; "><?php echo $value['nama_fasilitastambahan'] ?></div>
							<?php 
							$i_det++ ; } 
							?></td>
						</tr>
						<?php 
							$i++; } ?>
							<input type="hidden" name="totalfastambahan" class="name" value="<?php echo $i_det; ?>">
							<input type="hidden" name="totalruang" class="name" value="<?php echo $i; ?>">
					</tbody>
				</table>
				<button type="submit" name="submit">Pesan Sekarang</button>
				</form>
			</div><!-- /main -->
		</div><!-- /main -->
		
		<aside style="display:none;">
			<!-- availability/enquiry widget -->
			<div class="availability">
				<div class="availability-inner">
					<div class="tabs">
						<ul class="tabs-nav">
							<li class="tabs-selected"><a href="#tab-1">Detil Reservasi</a>
						</ul>
						<hr>
						<form action="<?php echo base_url().'reservasi/pesan/'.$this->uri->segment(3); ?>" class="form-availability" method="post">
						<div id="tab-1">
								
								<div class="one_half">
									<label>Nomor Kamar</label>
									<input type="hidden" name="checkin" value="<?php echo $ReservasiData['checkin'] ?>" class="datepicker-from required">
									<input type="hidden" name="checkout" value="<?php echo $ReservasiData['checkout'] ?>" class="datepicker-to required">
                                    <?php foreach ($nomorkamar as $value) { 
									?>
									<input type="checkbox" style="float:left; width:20px;" name="no_ruang[]" class="name" value="<?php echo $value['id_detilkamar'] ?>"><div style="float:left; margin-top:-6px; margin-left:12px;"><?php echo $value['no_ruang']; ?></div><br/> 
                                    <?php } ?>
								</select>
								</div>
								
								<div class="clear"></div>
								<div class="one_half">
									<label>Fas. Tambahan</label>
									<?php foreach ($fasilitastambahan as $value) { ?>
									<input type="checkbox" style="float:left; width:20px;" name="id_fasilitastambahan[]" class="name" value="<?php echo $value['id_fasilitastambahan'] ?>"><div style="float:left; margin-top:-6px; margin-left:12px;"><?php echo $value['nama_fasilitastambahan'] ?></div><br/>
									<?php } ?>
								</div>
								<div class="clear"></div>
								
								
								<input type="hidden" name="form" value="availability">
								<button type="submit" name="submit">Pesan Sekarang</button>
						</form>		
						</div><!-- /tab-1 -->
						
						
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