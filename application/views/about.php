<link id="bs1" href="<?= base_url('asset/public/css/bootstrap.min.css')?>" rel="stylesheet">
<style type="text/css" media="screen">
	.jud{
		font-weight:bold;
		font-family:calibri,arial;
		text-align:center;
		color:#3C3C3C;
	}
	p{
		text-align:justify;
		font-family:calibri,arial;		
	}
	.isi{height: 100%}
	.about{height: 95%; width: 100%}
	.head{width: 100%; left: 0; background: red; font-size: 3em; color: whitesmoke}
</style>

<div class='about'>

<div class="head">
	<span style="left:30px">About</span>
	<span class="popupclose glyphicon glyphicon-home" style="position: absolute; right:30px"></span>
</div>
<div class="isi">
	<pre style="font-family:calibri; color: black">
		Aplikasi Untuk membantu penyandang disabilitas menemukan pelatihan-pelatihan dan alat bantu baik 
	dalam hal penglihatan,pendengaran, alat gerak, dan lainnya. 
	Pada halaman awal terdapat kalender yang dapat menampilkan jadwal pelatihan-pelatihan yang ada dalam bulan ini secara
	Real-Time,  menampilkan pemberiyahuan tentang pelatihan yang akan diselenggarakan hari ini hingga 3 hari ke depan
	agar pengguna mengetahui jadwal dengan lebih akurat.
	
		Pengguna umum juga dapat menyumbangkan alat bantu untuk
	membantu penyandang disabilitasyang masing masing memiliki kategori sehingga orang yang membutuhkan alat tersebut dapat dengan mudah
	mencari alat yang dibutuhkan.
	</pre>
</div>
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