<html>
<head>
	<title>Form</title>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />

</head>
<body>
<a href="<?= base_url()?>"><div class="those"></div></a>
<h4 style="text-align:center">Form Tambah Users</h4>
<div class="this">
	<?=form_open($an)?>
	<div class="form-group">
	<label for="name">Nama Lengkap : </label>
		<input type="text" name="nama" value="<?=$input_nama?>" class="form-control">
	</div>
		<div class="form-group">
			<label for="name">Password : </label>
			<input type="password" name="password" value="<?=$input_password?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="name">Email : </label>
			<input type="text" name="email" value="<?=$input_email?>" class="form-control">
		</div>
		<div class="form-group">
			<label for="name">Kontak : </label>
			<input type="text" name="telp" value="<?=$input_telp?>" class="form-control">
		</div>
	<?=form_submit('subimt', 'submit')?>
	</form>
</div>

	<?php echo $script2 ?>
	    <script src="<?= base_url()."asset/admin/bower_components/jquery/dist/jquery.min.js"?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?= base_url()."asset/admin/bower_components/bootstrap/dist/js/bootstrap.min.js"?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?= base_url()."asset/admin/bower_components/metisMenu/dist/metisMenu.min.js"?>"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?= base_url()."asset/admin/dist/js/sb-admin-2.js"?>"></script>

</body>
</html>