<!DOCTYPE html>
<!--[if (IE 8)&!(IEMobile)]>
<html lang="en" class="ie8">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<?php $this->load->view('include/head'); ?>
<body  class="wide">
	<!--topnavbar-->
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			
			<h1>ID Reservasi #<?php echo $id;?></h1>	
			<div class="one_half">
				<div style="width:400px;border-bottom-style: dashed;">
					<h2>Tamu : <?php echo $dataReservasi['nama_lengkap'] ?></h2>
				</div>
				<div style="width:400px;border-bottom-style: dashed; padding-top:10px;">
					<h3>Chekin <br><?php echo date("d F Y", strtotime($dataReservasi['tglcheckin'])) ?></h3>
					<h3>Chekout <br><?php echo date("d F Y", strtotime($dataReservasi['tglcheckout'])) ?></h3>
				</div>
				<div style="width:400px;padding-top:10px;">
					<h3>Rincian Harga</h3>
						<table>
						<?php foreach($dataDetilReservasi as $value){?>
							<tr>
								<td>- <?php echo $value['nama_kamar'] ?> x <?php echo $value['jumlah'] ?></td>
								<td>:</td>
								<td>Rp.</td>
								<td><?php echo number_format($value['harga_kamar'],0,',','.') ?></td>
							</tr>
						<?php } ?>
						<?php foreach($dataReservasiTambahan as $value){?>
							<tr>
								<td>- <?php echo $value['nama_fasilitastambahan'] ?> ( <?php echo $value['no_ruang'] ?> )</td>
								<td>:</td>
								<td>Rp.</td>
								<td><?php echo number_format($value['total_harga'],0,',','.') ?></td>
							</tr>
						<?php } ?>
						</table>
				</div>
				
				<div style="width:400px;border-bottom-style: dashed; padding-top:10px;">
					<h2>Total Harga : Rp. <?php echo number_format($dataReservasi['total_harga_reservasi'],0,',','.') ?></h2>
				</div>
				
				<ul class="deals">
					
				</ul>
			
			<form action="<?php echo base_url().'reservasi/konfirmasi/'.$id ?>" class="form-availability" method="post">
			</form>
			</div>
			<div class="one_half last">
				<div style="width:400px;">
					<h2>  </h2>
				</div>
				<div style="width:400px;border-style: dotted; margin-bottom:10px; margin-top:100px; padding-top:10px;">
					<center>
						<h2>
						<?php
						if($dataReservasi['status_reservasi']=='0'){
							echo "Menunggu Pembayaran";
						}elseif($dataReservasi['status_reservasi']=='1'){
							echo "Menunggu verifikasi";
						}elseif($dataReservasi['status_reservasi']=='3'){
							echo "Invalid";
						}elseif($dataReservasi['status_reservasi']=='4'){
							if(empty($dataReservasi['alasan_pembatalan'])){
								echo "Spam";
							}else{
								echo "Pembatalan Reservasi, Alasan : ".$dataReservasi['alasan_pembatalan']; 
							}
						}else{ echo "Valid"; ?>
							<br><a  style="color:red;" target="_blank" href="<?php echo base_url().'reservasi/download/'.$id ?>">Download Voucher</a>
						<?php
						}
						?>
						</h2>
					</center>
				</div>
			</div>
			</div>
		
		<!--footer-->
		
		<?php $this->load->view('include/footer'); ?>
		
	
</body>

</html>