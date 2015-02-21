<link id="bs1" href="<?= base_url('asset/public/css/bootstrap.min.css')?>" rel="stylesheet">
<link  id="bs3" href="<?= base_url('asset/public/css/docs.min.css')?>" rel="stylesheet">
<style type="text/css">

	*{
		padding:0px;
		margin:0px;
		font-family: calibri;
	}
	.group-thumbnails{
		margin: 3px;
		line-height: 1.4em;
		height: 300px;
		width: 300px;
		text-align: center;
		position: relative;
		box-shadow: 0px 0px 1px dimgray;
		float: left;
		display: inline-block;
	}
	.img{
		width:100%;
		height:auto;
	}
	.keterangan{
		width:100%;
		background-color:white;
		color:#4B4B4B;
	}
	.aksi{
		width:100%;
		background-color:white;
		font-size:20px;
	}
	.wrapp{
		width: 100%; height: 100%; left: 0;
	}
	 .head{width: 100%; left: 0; background: maroon; font-size: 3em; color: whitesmoke}
	 .popup .front .body{
	 	height: 100%;
position: absolute;
bottom: 0px;
display: inline-block;
	 }
</style>
<div class="head">
	<span style="left:30px">Pelatihan</span>
	<span class="popupclose glyphicon glyphicon-home" style="position: absolute; right:30px"></span>
</div>
<div class="wrapp">
	<?php 
	
		foreach($pelatihan as $pelatihan)
		{
			echo "
				<div class='group-thumbnails'>
				<div class='img' id='img".$pelatihan['id']."'>
					<img width='200' height='100' src='".base_url('asset/img/image')."/".$pelatihan['banner']."' alt='banner'>
				</div>
				<div class='keterangan' id='ket".$pelatihan['id']."'>
					<p>Judul : ".$pelatihan['judul']."</p>
					<p>Tanggal : ".$pelatihan['tanggal']."</p>
					<p>Tempat : ".$pelatihan['tempat']."</p>
					<p>Penyelenggara : ".$pelatihan['penyelenggara']."</p>
				</div>
				<div class='aksi'>
					<a href='#' class='detail'>Detail</a>
				</div>
				</div>
			";
				
			}
	?>
</div>
<script src="<?= base_url('asset/js/jquery.min.js')?>"></script>
<script src="<?= base_url('asset/js/home-pop.js')?>"></script>
<script>
	$().ready(function(){
		$('.popupclose').click(function(){
			$('#bs1').attr('href', '');
			$('#bs2').attr('href', '');
			$('#bs3').attr('href', '');
		});
	});
</script>
</body>
</html>