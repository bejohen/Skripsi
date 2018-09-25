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
								if($this->session->flashdata('GagalReset')){
								if($this->session->flashdata('GagalReset')=='Ya'){ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>ERROR!</strong><br> Email tidak terdaftar, silakan coba kembali!
								</div>
								<?php }else{ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>OK!</strong><br> Password anda telah direset, silahkan cek email anda.
								</div>
								<?php } 
								}?>
								
								<?php 
								if(!$this->session->flashdata('GagalReset')){
								?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									Silahkan masukkan alamat email anda
								</div>
								<?php } ?>
								<form action="<?php echo base_url('login/doLupa') ?>" class="form-availability" method="post">
								<label>Email</label>
								<input type="text" name="email" class="required">
								<div class="one_half" style="width:100px;">
								<button type="submit" name="submit">Reset</button>
								</div>
								<div class="one_half last" style="width:150px; padding-top:10px; float:right;">
								<a style="text-decoration:none;" href="<?php echo base_url('login/index') ?>" class="linkButton"><span class="text">Sudah punya akun ? Login di sini!</span></a>
								</form>
								</div>
							</div><!-- /tab-1 -->
						</div><!-- /tabs -->
					</div><!-- /availability-inner -->
				</div><!-- /availability -->
				<div id="registerHere"><center>Belum punya akun? <a href="<?php echo base_url('admin/pelanggan/daftar/front') ?>" class="linkButton"><span class="text">Daftar</span></a> di sini.</center></div>
			</div><div class="clear"></div>

		</div><!-- /main -->
		
		<!--footer-->
		<?php $this->load->view('include/footer'); ?>
		
</body>

</html>