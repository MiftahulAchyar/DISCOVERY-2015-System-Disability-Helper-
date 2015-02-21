<html>
<head>
<title>Home</title>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/home-demo.css')?>" />
		<script src="<?= base_url('asset/js/home-modernizr-2.6.2.min.js')?>"></script>
		<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/home-pop.css')?>"/>
		<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/home-component.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/jquery-ui.min.css')?>" />
		<link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/jquery-ui.theme.min.css')?>" />
	<style>
	 .back{background-image: url(<?= base_url('asset/img/icon/balonmu.png')?>);}
	 .alert-info{
	 	font-weight:bold;
	 	padding-left:5px;
	 	cursor:pointer;
	 }

	 /*-----------*/

	 #plane{
	 	top: calc(0% + 60px);
	 	animation: planemove 40s infinite;
		-webkit-animation: planemove 40s infinite;
	 	background-image: url(<?= base_url('asset/img/icon/pesawat.png')?>);
	 	background-repeat: no-repeat;
	 }
	 #city{
	 	bottom: 0;
	 	left: 0;
	 	background-image: url(<?= base_url('asset/img/icon/gedung.png')?>);
	 	background-repeat: repeat-x;
		background-size: 100% 70%;
		background-position: 100% 125%;
	 }
	 #cloud1{
	 	height: 80px;
	 	background-size: 100% 100%;
	 	background-image: url(<?= base_url('asset/img/icon/cloud1.png')?>);
	 }
	 #cloud2{
	 	height: 100%; z-index: 3;
	 	background-image: url(<?= base_url('asset/img/icon/cloud2.png')?>);
	 }
		 
	#logo{
		background-image:url(<?= base_url('asset/img/icon/logo_sdh.png')?>);
		position: absolute;
		z-index: 30;
		top: calc(50% + 3em);
		left: calc(50% - 9em);
		height: 200px;
		background-size: 100% 80%;
		width: 300px;
		background-repeat: no-repeat;
	}
	.alrt{
		width: 150px;
		background: rgba(52, 200, 111, 0.78);
		padding: 3px;
		left: calc(50% - 66px);
		color: white;
		text-align: center;
		top: calc(50% - 200px);
		position: absolute;
	}
	#popup1{
		width:500px;
		padding:15px;
		background-color:white;
		border-radius:3px;
		box-shadow:0px 0px 2px gray;
		position:fixed;
		top:90px;
		left:calc(50% - 250px);
		z-index:120;
	}
	.jud{
		font-weight:bold;
		font-family:calibri,arial;
		text-align:center;
		color:black;
		margin-bottom:5px;
	}
	p{
		text-align:justify;
		font-family:calibri,arial;	
		color:black;	
	}
	 </style>
	}
</head>
<body>
<div class="component">
	<!-- Start Nav Structure -->
	<button class="cn-button" id="cn-button">menu</button>
	<div id="logo"></div>
	<?=$this->session->flashdata('sukses')?>
	<div class="cn-wrapper" id="cn-wrapper">
		<ul>
			<li class="<?=$menu1?>"><a href="<?= $link1?>" id="<?=$menu1?>"><span><?=$menu1?></span></a></li>
			<li class="tombol about"><a href="#" id="about"><span>About</span></a></li>
			<li class="tombol albana"><a href="#" id="albana"><span>Albana</span></a></li>
			<li class="tombol pelatihan"><a href="#" id="pelatihan"><span>Pelatihan</span></a></li>
			<li class="tombol contact"><a href="#" id="contact"><span>Contact</span></a></li>
			<li class="<?=$menu2?>"><a href="<?= $link2 ?>" id="<?=$menu2?>"><span><?=$menu2?></span></a></li>
		 </ul>
	</div>
<!-- End of Nav Structure -->
</div>
<!--Background City-->
<div class="calendar">
<?php if(isset($notifikasi))
		echo "<div class='alert-info'><span class='glyphicon glyphicon-warning-sign'></span> Notifikasi Pelatihan</div>";
?>
<?php echo $calendar;?>

	<?php if(isset($notifikasi))
		{
			foreach ($notifikasi as $notifikasi) {
			$banner=base_url('asset/img/image/'.$notifikasi['banner']);
			$bg="background-image:url('".$banner."')";
			echo"<a style='opacity:1' class='box' id='".$notifikasi['id']."' href='#'><div class='notification'>";
				echo "<div class='thumbnail'><img width='50' height='50' src='".$banner."'></div>";
				echo "<div style='display:inline-block;margin-left:5px'>".character_limiter($notifikasi['judul'],20);
				echo "<br>";
				echo "Lokasi : ".character_limiter($notifikasi['tempat'],10)."<br>";

				echo "<b style='color:rgba(233,63,63,0.5)'>";
				if($notifikasi['selisih']<1){echo "hari ini";}
				else if($notifikasi['selisih']===1){echo "besok";}
				else{echo $notifikasi['selisih']." hari lagi";}
				echo "</b></div></a>";
			echo "</div>";			
			}
		}		
	?>

</div>
<a href="<?= base_url('boy')?>"><div id="admin">Admin</div></a>

<div class="sky"></div>
<div id="plane"></div>
<div id="cloud1"></div>
<div id="cloud2"></div>
<div id="city"></div>
<!-- Popup -->
<div class="popup">
	<div class="back"></div>
	<div class="front">
		<div class="body">
	<!--	Isi	-->
		</div>
	</div>
</div>
<!-- <div id='popup1'>
	<h1 class='jud'>Tentang aplikasi</h1>

	<p>Aplikasi Untuk membantu penyandang disabilitas 
	menemukan pelatihan-pelatihan dan alat bantu baik 
	dalam hal penglihatan,pendengaran, alat gerak, dan lainnya</p>

	<p>
		Pengguna umum juga dapat menyumbangkan alat bantu untuk
		membantu penyandang disabilitas.
	</p>
</div> -->
<!-- End of all -->
<script src="<?= base_url('asset/js/home-polyfills.js')?>"></script>
<script src="<?= base_url('asset/js/home-demo2.js')?>"></script>
<script src="<?= base_url('asset/js/jquery.min.js')?>"></script>
<script src="<?= base_url('asset/js/jquery-ui.custom.js')?>"></script>
<script src="<?= base_url('asset/js/home-main.js')?>"></script>
<script src="<?= base_url('asset/js/home-pop.js')?>"></script>
<script>
	$().ready(function(){
		$('.notification').click(function() {
			$(this).fadeOut('slow');
		});
		$('.about').click(function() {
			$.ajax({
				url:"<?= base_url('i/show_about')?>",
				success:function(html){
					$('.popup .front .body').html(html);
				}
			});
		});

		var i=1;
		$('.alert-info').click(function(){
			$('.notification').slideDown('sow');
		});

		$('.albana').click(function(){
			$.ajax({
				url:"<?= base_url('i/show_albana')?>",
				success:function(html){
					$('.popup .front .body').html(html);
				}
			});
		});
		$('.pelatihan').click(function(){
			$.ajax({
				url:"<?= base_url('i/show_pelatihan')?>",
				success:function(html){
					$('.popup .front .body').html(html);
				}
			});
		});
		
		$('.contact').click(function(){
			$.ajax({
				url:"<?= base_url('i/show_contact')?>",
				success:function(html){
					$('.popup .front .body').html(html);
				}
			});
		});
		

		$('.popupclose').click(function(){
			window.location.href="localhost/i_boy/"
		});
	});
</script>
</body>
</html>