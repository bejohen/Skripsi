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
			<h1>Log In ke Akun Anda</h1>
			</center>
			<div class="one_third" style="margin-left:340px;" >
				<!-- availability/enquiry widget -->
				<div class="availability">
					<div class="availability-inner">
						<div class="tabs">
							<div id="tab-1">
								<div class="space-6"></div>
								<?php if($this->session->flashdata('GagalLogin')=='Ya'){ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>ERROR!</strong><br> Email atau password salah, silakan coba kembali!
								</div>
								<?php }elseif($this->session->flashdata('GagalLogin')=='Blokir'){ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									<strong>ERROR!</strong><br> Akun anda terblokir, silahkan cek email dan ubah password!
								</div>
								<?php } ?>
								
								<?php if($this->session->flashdata('Daftar')=='Ya'){ ?>
								<div class="alert alert-danger" style="background-color:#C29E50;">
									Terima kasih telah mendaftar di website hotel sun city
								</div>
								<?php } ?>
								<form action="<?php echo base_url('login/doLogin') ?>" class="form-availability" method="post">
								<label>Email</label>
								<input type="text" name="email" class="required">
								<label>Password</label>
								<input type="password" name="password" class="required">
								<div class="one_half" style="width:100px;">
								<button type="submit" name="submit">Login</button>
								</div>
								<div class="one_half last" style="width:150px; padding-top:10px; float:right;">
								<a style="text-decoration:none;" href="<?php echo base_url('login/lupa') ?>" class="linkButton"><span class="text">Lupa Password</span></a>
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