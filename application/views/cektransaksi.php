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
			
			<h1>Reservasi Saya</h1>	
			<div class="one_half" style="display:none;">
				<form action="<?php echo base_url().'reservasi/transaksi/cek' ?>" class="form-availability" method="post">
					<label>ID Reservasi</label>
					<input type="text" cols="56" rows="5" name="id_reservasi" class="required">
					<button type="submit" name="submit">Cek Status</button>
				</form>
			</div>
			<div class="one">
				<table cellpadding="0" cellspacing="0">
					<thead>
						<tr>
							<td>No</td>
							<td>ID Reservasi</td>
							<td>Tanggal Transaksi</td>
							<td>Total Harga</td>
							<td>Status</td>
						</tr>
					</thead>
					<tbody>
						<?php 
						$i = 0;
						foreach ($dataReservasi as $value) {
							$i++;
						?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $value['id_reservasi'];?></td>
							<td><?php echo $value['tgltransaksi'];?></td>
							<td>Rp. <?php echo number_format($value['total_harga_reservasi'],0,'.',',');?></td>
							<td>
							<?php
							if($value['status_reservasi']=='0'){
								echo "Menunggu Pembayaran";
							}elseif($value['status_reservasi']=='1'){
								echo "Menunggu verifikasi";
							}elseif($value['status_reservasi']=='3'){
								echo "Invalid";
							}elseif($value['status_reservasi']=='4'){
								if(empty($value['alasan_pembatalan'])){
									echo "Spam";
								}else{
									echo "Pembatalan Reservasi, Alasan : ".$value['alasan_pembatalan']; 
								}
							}else{ ?>
								<a style="color:red;" target="_blank" href="<?php echo base_url().'reservasi/download/'.$value['id_reservasi'] ?>">Valid</a>
							<?php
							}
							?></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>	
		
		<!--footer-->
		
		<?php $this->load->view('include/footer'); ?>
		
	
</body>

</html>