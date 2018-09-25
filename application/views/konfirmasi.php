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
			
			<h1>Konfirmasi Pembayaran</h1>	
			<div class="one_half">
				<form enctype="multipart/form-data" action="<?php echo base_url().'reservasi/doAddkonfirmasi/'.$this->uri->segment(3) ?>" class="form-availability" method="post">
				<label>ID Reservasi <span style="color:red;">*</span></label>
				<input type="text" cols="56" rows="5" name="id_reservasi" class="required">
				
				<label>Bank Pengirim <span style="color:red;">*</span></label>
				<input type="text" cols="56" rows="5" name="txtNamaBank" class="required">
				
				<label>No. Rekening <span style="color:red;">*</span></label>
				<input type="text" cols="56" rows="5" name="txtNoRekening" class="required">
				
				<label>Atas Nama <span style="color:red;">*</span></label>
				<input type="text" cols="56" rows="5" name="txtNamaRek" class="required">
				
				<label>Tanggal Transfer <span style="color:red;">*</span></label>
				<input type="date" cols="56" rows="5" name="tgl_transfer" readonly value="<?php echo date('Y-m-d') ?>" class="required">
				
				<label>Bukti Pembayaran <span style="color:red;">*</span></label>
				<input type="file" cols="56" rows="5" name="bukti_bayar" class="required">
				
				<button type="submit" name="submit">Simpan</button>
				</form>
			</div>
		</div>
			
		
		<!--footer-->
		
		<?php $this->load->view('include/footer'); ?>
		
	
</body>

</html>