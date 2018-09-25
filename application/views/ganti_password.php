<!DOCTYPE html>
<!--[if (IE 8)&!(IEMobile)]>
<html lang="en" class="ie8">
<![endif]-->
<!--[if gt IE 8]><!-->
<html lang="en">
<!--<![endif]-->

<?php $this->load->view('include/head'); ?>
<body class="wide">
	<!--topnavbar-->
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			<center>
			<h1>Reset Password Anda</h1>
			</center>
			<div class="one_third" style="margin-left:340px;" >
				<!-- availability/enquiry widget -->
				<div class="availability">
					<div class="availability-inner">
						<div class="tabs">
							<div id="tab-1">
								<div class="space-6"></div>
								<?php 
								if($this->session->flashdata('GagalUpdate')){
								if($this->session->flashdata('GagalUpdate')=='Ya'){ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>ERROR!</strong><br> Konfirmasi password harus sama
								</div>
								<?php }else{ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>OK!</strong><br> Password anda telah direset.
								</div>
								<?php } 
								}?>
								
								<?php 
								if(!$this->session->flashdata('GagalUpdate')){
								?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									Silahkan masukkan password baru anda
								</div>
								<?php } ?>
								<form action="<?php echo base_url('reservasi/doGanti') ?>" class="form-availability" method="post">
								<label>Password Baru</label>
								<input type="password" name="txtPassword" class="required">
								<label>Konfirmasi Password Baru</label>
								<input type="password" name="txtKonfirmasiPassword" class="required">
								<div class="one_half" style="width:100px;">
								<button type="submit" name="submit">Reset</button>
								</div>
								<div class="one_half last" style="width:150px; padding-top:10px; float:right;">
								<a style="text-decoration:none;display:none;" href="<?php echo base_url('login/index') ?>" class="linkButton"><span class="text">Sudah punya akun ? Login di sini!</span></a>
								</form>
								</div>
							</div><!-- /tab-1 -->
						</div><!-- /tabs -->
					</div><!-- /availability-inner -->
				</div><!-- /availability -->
				<div id="registerHere" style="display:none;"><center>Belum punya akun? <a href="<?php echo base_url('admin/pelanggan/daftar/front') ?>" class="linkButton"><span class="text">Daftar</span></a> di sini.</center></div>
			</div><div class="clear"></div>

		</div><!-- /main -->
		
		<!--footer-->
		<?php $this->load->view('include/footer'); ?>
		
</body>

</html>