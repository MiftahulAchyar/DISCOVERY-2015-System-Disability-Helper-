<html>
<head>
	<title>Form</title>
	<?php echo $style ?>
	
	<style type="text/css" media="screen">
		form{
			z-index:9;
		}
	</style>
</head>
<body>

	<?=form_open_multipart($an)?>
		<div class="form-group">
		<label for="name">Judul : </label>
		<input type="text" name="judul" value="<?=$input_judul?>" class="form-control">
		</div>
		<div class="form-group">
		<label for="name">Tanggal : </label>
		<input type="text" name="tanggal" id='tanggal' value="<?=$input_tanggal?>" class="form-control">
		</div>
		<div class="form-group">
		<label for="name">Tempat : </label>
		<input type="text" name="tempat" value="<?=$input_tempat?>" class="form-control">
		</div>
		<div class="form-group">
		<label for="name">Penyelenggara : </label>
		<input type="text" name="penyelenggara" value="<?=$input_penyelenggara?>" class="form-control">
		</div>
		<?php if(isset($image))
			echo $image;
		?>
		<div class="form-group">
		<label for="name">Banner : </label>
		<input type="file" name="userfile">
		</div>
		<div class="form-group">
		<label for="name">Kategori : </label>
		<select name="kategori" value="<?=$input_kategori?>" class="form-control">
			<?php
				foreach ($drop_down as $pilihan) {
					echo "<option>".$pilihan['nama_kategori']."</option>";
				}
			?>
		</select>
		</div>
		<div class="form-group">
		<label for="name">Biaya : </label>
		<input type="text" name="biaya" value="<?=$input_biaya?>" class="form-control">
		</div>
		<div class="form-group">
		<label for="name">Kontak : </label>
		<input type="text" name="kontak" value="<?=$input_kontak?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="name">Details : </label>
			<textarea class="form-control" name="detail" placeholder="Iputkan Detail Pelatihan berupa kegiatan, prospek ke depan dan lainnya"><?php if(isset($input_detail))echo $input_detail; ?></textarea>
		</div>
	<input type="submit" class="btn btn-primary" value="Submit">
	</form>
	
	<?php echo $script1.$script2 ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#tanggal').datepicker({ dateFormat: 'yy/mm/dd' });
	});
</script>
</body>
</html>