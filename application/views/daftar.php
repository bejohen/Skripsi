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
			<center>
			<h1>Registrasi</h1>
			</center>
			<div class="clear"></div>
			<div class="one" style="width:700px;margin-left:160px;">
				<!-- availability/enquiry widget -->
				<div class="availability">
					<div class="availability-inner">
						<div class="space-6"></div>
						<?php if($this->session->flashdata('Daftar')=='Ya'){ ?>
						<div class="alert alert-danger" style="background-color:#C29E50;">
							<strong>ERROR!</strong><br> Maaf, email yang anda masukan sudah terdaftar!
						</div>
						<?php } ?>
						<div class="tabs">
							<form action="<?php echo base_url().'admin/pelanggan/doAdd/'.$this->uri->segment(4); ?>" class="form-contact" method="post">
								<div class="one_half">
									<label>No. Identitas <span style="color:red;">*</span></label>
									<input type="text"  name="txtNoKTP" class="required">
								</div>
								<div class="one_half last">
									<label>Jenis Kelamin</label>
									<select name="txtJenisKelamin">
										<option value="P">Perempuan</option>
										<option value="L">Laki-laki</option>
									</select>
								</div>
								<div class="one_half">
									<label>Nama Lengkap <span style="color:red;">*</span></label>
									<input type="text" name="txtNamaLengkap" class="required name">
								</div>
								<div class="one_half last">
									<label>Nama Panggilan</label>
									<input type="text" name="txtNamaPanggilan">
								</div>
								<div class="one_half">
									<label>Alamat</label>
									<textarea name="txtAlamat" cols="56" rows="5"></textarea>
								</div>
								<div class="one_half last">
								</div>
								<div class="one_half">
									<label>No. Handphone</label>
									<input type="text" name="txtNohp">
								</div>
								<div class="one_half last" >
								</div>
								<div class="one_half">
									<label>Email <span style="color:red;">*</span></label>
									<input type="text" name="txtEmail" class="required">
								</div>
								<div class="one_half last">
									<label>Password <span style="color:red;">*</span></label>
									<input type="password" name="txtPassword" class="required">
								</div>
								
								<div class="one_half">
									<button type="submit" name="submit">Register</button>
								</div>
								<div class="one_half last">
								
								</div>
							</form>
						</div><!-- /tabs -->
					</div><!-- /availability-inner -->
				</div><!-- /availability -->
			</div><div class="clear"></div>

		</div><!-- /main -->
		
		<!--footer-->
		
		<?php $this->load->view('include/footer'); ?>
		
	
</body>

</html>