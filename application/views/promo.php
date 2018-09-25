<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body class="wide">
	
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			<center>
			<h1>Fasilitas dan Kebijakan Hotel</h1>
			</center>
			<div class="one" style="width:1000px;">
				<h2>Fasilitas Hotel</h2>
				<div class="one_fourth" style="height:160px;">
					<h4 style="border-bottom:1px solid #CCC;"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt=""> Internet</h4>
					<ul class="">
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Wi-Fi tersedia di lobby hotel dan kamar hotel, fasilitas ini tidak dipungut biaya</li>
					</ul>
				</div>
				<div class="one_fourth" style="height:160px;">
					<h4 style="border-bottom:1px solid #CCC;"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt=""> Layanan Hotel</h4>
					<ul class="">
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Layanan kamar 24 jam</li>
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Staff front desk 24 jam</li>
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Keamanan 24 jam</li>
					</ul>
				</div>
				<div class="one_fourth" style="height:160px;">
					<h4 style="border-bottom:1px solid #CCC;"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt=""> Makanan dan Minuman</h4>
					<ul class="">
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Bisa dibeli di Bar & Kitchen</li>
					</ul>
				</div>
				<div class="one_fourth last" style="height:160px;">
					<h4 style="border-bottom:1px solid #CCC;"><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt=""> Umum</h4>
					<ul class="">
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Tersedia area merokok</li>
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Tersedia tempat parkir mobil dan motor</li>
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Tersedia tempat sholat</li>
						<li style="list-style:none;margin-left:15px;border-bottom:1px solid #CCC;">Tersedia Bar&Kitchen</li>
					</ul>
				</div>
			</div>
			<div class="one" style="width:1000px;">
				<h2>Kebijakan Hotel</h2>
				<ul class="">
						<li style="list-style:none;">a. Minimum umur pelanggan adalah 17 tahun</li>
						<li style="list-style:none;">b. Pasangan yang belum menikah tidak diperbolehkan menginap dalam 1 kamar</li>
						<li style="list-style:none;">c. Maksimum hunian 2 orang dewasa dan 1 anak (dibawah 5 tahun), anak-anak di atas umur 5 tahun diharuskan menggunakan extra bed</li>
						<li style="list-style:none;border-bottom:1px solid #CCC">d. Check-in Mulai: 14:00 WIB dan Check-out Hingga: 12:00 WIB </li>
					</ul>
			</div>
			
			<div class="one" style="width:1000px; display:none">
				<center>
				<h1>Info Promo</h1>
				<h2 style="color:red;">Promo liburan lebaran 20%</h2>
				</center>
			</div>
		
	</div>	
	
		<?php $this->load->view('include/footer'); ?>
	
</body>

</html>