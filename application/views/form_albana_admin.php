<html>
<head>
	<title>Form</title>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />

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