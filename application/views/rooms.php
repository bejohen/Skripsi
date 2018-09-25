<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('include/head'); ?>

<body class="wide">
	
	<?php $this->load->view('include/topnavbar'); ?>
	<div class="wrapper">
		<div class="main" >
			<center>
			<h1>Kamar yang Tersedia</h1>
			</center>
			<?php
			$no = 0 ;
			$last = '';
			foreach($listData as $value){
			$no++;
			if($no == "2"){
				$last = " last";
				$no = 0;
			}else{
				$last = '';
			}
			 ?>
			<div class="one_half <?php echo $last;?>" style="height:490px; width:400px;margin-left:60px;">
				<h2><img src="<?php echo ASSET_SAYA ?>travelium/img/nav-7.png" alt=""><?php echo " ".$value['nama_kamar']?> </h2>
				<p><img src="<?php echo ASSET_SAYA ?>kamar/<?php echo $value['foto1']?>"  height=350 width=350 alt=""></p>
				<p><?php echo substr($value['deskripsi'],0,100); ?> <a href="detil/<?php echo $value['id_kamar']?>">Selengkapnya &rarr;</a></p>
				
				<ul class="features">
					<li><?php echo "Rp. ".number_format($value['harga'],0,".",","); ?></li>
				</ul>
			</div>
			<?php } ?>
	</div>	
		<?php $this->load->view('include/footer'); ?>
</body>

</html>