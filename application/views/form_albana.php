<html>
<head>
	<title>Form</title>
	<?php echo $style ?>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />
	<link href="<?= base_url()."asset/admin/bower_components/bootstrap/dist/css/bootstrap.min.css"?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/css/bootstrap-theme.css')?>">
    <!-- MetisMenu CSS -->
    <link href="<?= base_url()."asset/admin/bower_components/metisMenu/dist/metisMenu.min.css"?>" rel="stylesheet">

    <!-- Social Buttons CSS -->
    <link href="<?= base_url()."asset/admin/bower_components/bootstrap-social/bootstrap-social.css"?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?= base_url()."asset/admin/dist/css/sb-admin-2.css"?>" rel="stylesheet">
    <link href="<?= base_url()?>asset/admin/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?= base_url()."asset/admin/bower_components/font-awesome/css/font-awesome.min.css"?>" rel="stylesheet" type="text/css">

<style>
	input{
		background: none repeat scroll 0% 0% rgb(49, 49, 71);
		border: 1px solid black;
		border-radius: 8px;
		font-size: 1.3em;
		color: #BDB4B4;
	}
	input:hover{
		background: rgb(187, 253, 250);
		color: #161212;
	}
	.th-albana{
		font-size: 2em;
		text-align: center;
	}
	.isi-albana{
		background: darkgreen;
		width: 500px;
		position: relative;
		left: calc(50% - 250px);
		padding: 25px;
		border-radius: 20px 0;
		color: whitesmoke;}

	.those {
		left: calc(50% - 12em);
		position: relative;
		background-image:url(<?= base_url('asset/img/icon/logo_sdh.png')?>);
		height: 200px;
		width: 380px;
		background-repeat: no-repeat;
		background-size: 100% 100%
	}
</style>

</head>
<body>
<a href="<?= base_url()?>"><div class="those"></div></a>
<div class="th-albana">Posting Barang yang Ingin Anda Sumbangkan ^-^</div>
<div class="isi-albana">
	<?=form_open_multipart($an)?>
	<div class="form-group">
	<label for="name">Nama Barang : </label>
		<input type="text" name="nama_albana" value="<?=$input_nama_albana?>" class="form-control">
	</div>
		<?php if(isset($image))
			echo $image;
		?>
		<div>
			<label for="name">Foto albana : </label>
			<input type="file" name="userfile">
		</div>
		<div class="form-group">
			<label for="name"> 
			 Pemilik : </label>
			 <?php if(isset($admin))
			 {
			 $type1='hidden';
			 echo "<select name='pemilik1' class='form-control'>";
			 	foreach ($dropdown_nama as $nama) {
			 		echo "<option>".$nama['nama']."</option>";
			 	}
			 echo "</select>";
			 }else{$type1='text';} ?>
			<input type='<?=$type1?>' name='pemilik' value='<?=$input_pemilik?>' class='form-control' readonly>
		</div>
		<div class="form-group">
			<label for="name">Lokasi Barang Saat Ini : </label>
			<input type="text" name="posisi" value="<?=$input_posisi?>" class="form-control">
		</div>
		<!-- <div class="form-group">
			<label for="name">Kontak : </label>
			<?php if(isset($kontak)){$readonly='readonly';$input_kontak=$kontak; }else{$readonly='';} ?>
			<input type="text" name="kontak" value="<?=$input_kontak?>" class="form-control" <?=$readonly?>>
		</div>
		<div class="form-group">
			<label for="name">Email : </label>
			<?php if(isset($email)){$readonly='readonly';$input_email=$email; }else{$readonly='';} ?>
			<input type="text" name="email" value="<?=$input_email?>" class="form-control"  <?=$readonly?>>
		</div> -->
		<div class="form-group">
			<label for="name">Kategori : </label>
			<select name="kategori" value="<?=$input_kategori?>" class="form-control">
				<?php
					foreach ($drop_down as $pilihan) {
						echo "<option>".$pilihan['nama']."</option>";
					}
				?>
			</select>
		</div>
	<?=form_submit('subimt', 'submit')?>
	</form>
</div>
	<?php echo $script2 ?>
</body>
</html>