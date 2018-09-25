<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body class="wide">
	
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main">
			<center>
			<h1>Tipe kamar Dan Fasilitas Kamar</h1>
			</center>
			<div class="one" style="width:1000px;">
				<ul class="deals" style="text-align:justify;">
					Sun City memiliki 45 buah kamar dengan menawarkan 2 tipe kamar yang dibedakan berdasarkan fasilitas dan pilihan tempat tidur. Informasi kamar pada Sun City,
terdapat 2 tipe kamar hotel yaitu : <br>
a.	Kamar standar dengan pilihan tempat tidur single atau twin<br>
b.	Kamar superior dengan pilihan tempat tidur single atau twin
				</ul>
				
			<p class="alert yellow">#Galeri Kamar</p>
			</div>
			<div class="popup-gallery">
				
				<div class="one_half">
					<h2><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-2.png" alt=""> Standar Room (Single/Twin)</h2>
					<p >
					<a href="<?php echo ASSET_SAYA ?>/travelium/img/Single_Standar_room.jpg" class="popup" rel="tag" title="Single Standar Room"><img style="width:220px;height:125px;" src="<?php echo ASSET_SAYA ?>/travelium/img/Single_Standar_room.jpg" alt=""></a>
					<a href="<?php echo ASSET_SAYA ?>/travelium/img/Twin_Standar_Room.jpg" class="popup" rel="tag" title="Twin Standar Room"><img style="width:220px;height:125px;" src="<?php echo ASSET_SAYA ?>/travelium/img/Twin_Standar_Room.jpg" alt=""></a></p>
					
					<p>Fasilitas yang terdapat pada kamar standar, yaitu :</p>
					
					<ul class="">
						<li>Tempat tidur dengan bantal, guling, dan selimut</li>
						<li>Ukuran kamar standar 9.6 meter persegi</li>
						<li>Kamar mandi serta toilet</li>
						<li>Penyejuk udara (AC)</li>
						<li>Telepon</li>
						<li>Televisi</li>
						<li>1 daya soket di dinding </li>
					</ul>
				</div>
				<div class="one_half last">
					<h2><img src="<?php echo ASSET_SAYA ?>/travelium/img/nav-7.png" alt=""> Superior Room (Single/Twin)</h2>
					<p >
					<a href="<?php echo ASSET_SAYA ?>/travelium/img/Single_Superior_Room.jpg" class="popup" rel="tag" title="Single Superior Room"><img style="width:220px;height:125px;" src="<?php echo ASSET_SAYA ?>/travelium/img/Single_Superior_Room.jpg" alt=""></a>
					<a href="<?php echo ASSET_SAYA ?>/travelium/img/Twin_Superior_Room.jpg" class="popup" rel="tag" title="Twin Superior Room"><img style="width:220px;height:125px;" src="<?php echo ASSET_SAYA ?>/travelium/img/Twin_Superior_Room.jpg" alt=""></a></p>
					
					<p>Fasilitas yang terdapat pada kamar superior, yaitu :</p>
					
					<ul class="">
						<li>Tempat tidur dengan bantal, guling, dan selimut</li>
						<li>Ukuran kamar 12 meter persegi</li>
						<li>Kamar mandi serta toilet</li>
						<li>Penyejuk udara (AC)</li>
						<li>2 daya soket di dinding</li>
						<li>Telepon</li>
						<li>Televisi</li>
						<li>Ruang penyimpanan pakaian</li>
					</ul>
				</div>
				
		</div>
	</div>	
	
		<?php $this->load->view('include/footer'); ?>
	
</body>

</html>