<html>
<head>
	<title>Albana</title>
			<!-- Bootsssssterrrr.... -->
		<link id="bs1" href="<?= base_url('asset/public/css/bootstrap.min.css')?>" rel="stylesheet">
		<link id="bs2" href="<?= base_url('asset/public/css/bootstrap-theme.min.css')?>" rel="stylesheet">
		<link  id="bs3" href="<?= base_url('asset/public/css/docs.min.css')?>" rel="stylesheet">
		<style>
		body{overflow-x: hidden}
		.nav-tabs>li{
			width: 20%;
			text-align: center
		}
		.bs-example:after{
			content: '';
			text-transform: capitalize;
			width: 100%;top:0; left: 0;
			 background-color: transparent;
		}

		.tab-cont{
			color: auto; position: relative;
			display: inline-block; margin-left: 5px
		}
		.tab-pane > ul li img{
			width: 100px; height: 65px;
		}
		.gambar{width: 140px}
		.nama{font-size: 1.1em; font-weight: 800;}
		.tab-pane > ul{
			display: block;
			width: 100%
		}
		.tab-pane ul li{
			display: inline-block;
			width: 100%;
			position: relative;
			border-radius: 4px;
			border: 1px solid gray;
		}
		.tab-pane ul li span{
			width: 45%;
			display: block;
			position: relative;
			height: auto;
			float: left;
			line-height: 4;
			padding: 5px;
		}
		.myheader{
			z-index: 10;
			width: 100%;
			height: 40px;
			top: 0;
			left: 0;
			font-size: 30px;
		}
		#albanas{
			background-color: rgb(4, 45, 4);
			background: rgb(4, 45, 4);
			color: rgb(238, 233, 233)
		}
		.myheader, .myheader > span{position: absolute;}
		.detail{width: 20% !important; position: absolute !important; right: 0}
		.detail:hover{color: lightblue; cursor: pointer;}
		@media only screen and (max-width: 500px) {
			.tab-cont{color: transparent;}
		}
		</style>

</head>
<body>
<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
<div class="myheader" id="albanas">
<span style="left:30px">Albana <small>alat bantu untuk semua</small></span>
<span class="popupclose glyphicon glyphicon-home" style="position: absolute; right:30px"></span>
</div>
    <ul id="myTab" class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
   	   <span class='glyphicon glyphicon-globe'></span><span class="tab-cont"> &nbsp;&nbsp;&nbsp;Home</span></a>
      </li>
      <li role="presentation">
        <a href="#penglihatan" role="tab" id="penglihatan-tab" data-toggle="tab" aria-controls="penglihatan">
        <span class="glyphicon glyphicon-eye-open"></span><span class="tab-cont">&nbsp;&nbsp;Penglihatan</span>
        </a>
      </li>

      <li role="presentation">
        <a href="#pendengaran" role="tab" id="pendengaran-tab" data-toggle="tab" aria-controls="pendengaran">
        <span class="glyphicon glyphicon-headphones"></span><span class="tab-cont"> &nbsp;Pendengaran</span>
        </a>
      </li>
      <li role="presentation">
        <a href="#alat_gerak" role="tab" id="alat_gerak-tab" data-toggle="tab" aria-controls="alat_gerak">
        <span></span><span class="tab-cont"> Alat Gerak</span>
        </a>
      </li>

      <li role="presentation">
        <a href="#lainnya" role="tab" id="lainnya-tab" data-toggle="tab" aria-controls="lainnya">
        <span style="font-size:20px">?</span><span class="tab-cont">&nbsp;&nbsp;Lain-lain</span></a>
      </li>
    </ul>

    <div id="myTabContent" class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledBy="home-tab">
      <?php
      if(isset($content))
      	echo $content;
      ?>
      </div>

      <div role="tabpanel" class="tab-pane fade" id="penglihatan" aria-labelledBy="penglihatan-tab">
        <ul>
			<?php
				foreach ($penglihatan as $penglihatan) {
					echo "<li>
					<span class='gambar'><img width='100' src='".base_url().'asset/img/image/'.$penglihatan['foto']."'></span>
					<span class='nama'>".$penglihatan['nama_albana']."</span>";
					echo "<span class='glyphicon glyphicon-eye-open detail'> Detail</span></li>";
				}
			?>
			</ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="pendengaran" aria-labelledBy="pendengaran-tab">
        <ul>
			<?php
				foreach ($pendengaran as $pendengaran) {
					echo "<li>
					<span class='gambar'><img width='100' src='".base_url().'asset/img/image/'.$pendengaran['foto']."'></span>
					<span class='nama'>".$pendengaran['nama_albana']."</span>";
					echo "<span class='glyphicon glyphicon-eye-open detail'> Detail</span></li>";
				}
			?>
			</ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="alat_gerak" aria-labelledBy="alat_gerak-tab">
        <ul>
			<?php
				foreach ($alat_gerak as $alat_gerak) {
					echo "<li>
					<span class='gambar'><img width='100' src='".base_url().'asset/img/image/'.$alat_gerak['foto']."'></span>
					<span class='nama'>".$alat_gerak['nama_albana']."</span>";
					echo "<span class='glyphicon glyphicon-eye-open detail'> Detail</span></li>";
				}
			?>
			</ul>
      </div>
      <div role="tabpanel" class="tab-pane fade" id="lainnya" aria-labelledBy="lainnya-tab">
        <ul>
			<?php
				foreach ($lainnya as $lainnya) {
					echo "<li>
					<span class='gambar'><img width='100' src='".base_url().'asset/img/image/'.$lainnya['foto']."'></span>
					<span class='nama'>".$lainnya['nama_albana']."</span>";
					echo "<span class='glyphicon glyphicon-eye-open detail'> Detail</span></li>";
				}
			?>
		</ul>
      </div>
    </div>
</div>

<script src="<?= base_url('asset/js/jquery.min.js')?>"></script>
<script src="<?= base_url('asset/js/home-pop.js')?>"></script>
<script id="bs4"  src="<?= base_url('asset/public/js/bootstrap.min.js')?>"></script>
<script id="bs5"  src="<?= base_url('asset/public/js/docs.min.js')?>"></script>
<script>
	$().ready(function(){
		var boots1 = $('#bs1');
		var boots2 = $('#bs2');
		var boots3 = $('#bs3');
		var boots4 = $('#bs4');
		var boots5 = $('#bs5');
		$('.popupclose').click(function(){
			
			$('#bs1').attr('href', '');
			$('#bs2').attr('href', '');
			$('#bs3').attr('href', '');
			$('#bs4').attr('href', '');
			$('#bs5').attr('href', '');
		});
	});
</script>
</body>
</html>