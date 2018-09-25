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
			
			<h1>Review pemesanan #<?php echo $dataReservasi['id_reservasi'];?></h1>	
			<div class="one_half">
				<?php if(!empty($dataReservasi['id_reservasi'])){ ?>
				<div style="width:400px;border-bottom-style: dashed;">
					<h2>Tamu : <?php echo $dataReservasi['nama_lengkap'] ?></h2>
				</div>
				<div style="width:400px;border-bottom-style: dashed; padding-top:10px;">
					<h3>Check In <br><?php echo date("d F Y", strtotime($dataReservasi['tglcheckin'])) ?></h3>
					<h3>Check Out <br><?php echo date("d F Y", strtotime($dataReservasi['tglcheckout'])) ?></h3>
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
			<button type="submit" name="submit">Konfirmasi Pembayaran</button>
			</form>
			<form action="<?php echo base_url() ?>" class="form-availability" method="post">
			<button type="submit" name="submit">Kembali ke Beranda</button>
			</form>
			<form style="display:none;" action="<?php echo base_url().'reservasi/doDeletekonfirmasi/'.$id ?>" class="form-availability" method="post">
			<button type="submit" name="submit">Batalkan Reservasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
			</form>
				<?php }else{ ?>
					<h1 style="color:red;">Tidak ada pesanan kamar hotel saat ini</h1>	
				<?php } ?>
			</div>
			<div class="one_half last">
				<div style="width:400px;">
					<h2>Rekening Pembayaran</h2>
				</div>
				<div style="width:400px;border-style: dotted; margin-bottom:10px; padding-top:10px;">
					<center>
						<h3>Nama Bank : Bank Central Asia (BCA)</h3>
						<h2>No. Rekening : 001001001001</h2>
						<h3>a/n Hotel Garuda Wira</h3>
					</center>
				</div>
				<div style="width:400px; margin-top:40px">
					<h3>Informasi Tambahan</h3>
				</div>
				<div style="width:400px;border-style: dotted; margin-top:10px;padding:10px;">
					<p>
					<h4>Check-in Mulai: 14:00 WIB dan Check-out Hingga: 12:00 WIB <br> Tidak melakukan konfirmasi pembayaran => 2 jam, reservasi akan otomatis tercancel dan kamar yang dipilih akan tersedia kembali.</h4>
					</p>
				</div>
			</div>
		
		<!--footer-->
		
	
</body>

</html>