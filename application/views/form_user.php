<html>
<head>
	<title>Form</title>
	<?php echo $style ?>
	<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />
    <!-- Bootstrap Core CSS -->
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
	.this{width: 300px;
		background: #082314;
		padding: 10px;
		color: wheat;
		position: relative;
		left: calc(50% - 12em);
		border-radius: 10px;
	}
	.those {
		left: calc(50% - 12em);
		position: relative;
		background-image:url(<?= base_url('asset/img/icon/logo_sdh.png')?>);
		height: 200px;
		width: 380px;
		background-repeat: no-repeat;
		background-size: 100% 100%
	}
	input{
		background: none repeat scroll 0% 0% rgb(49, 49, 71);
		border: 1px solid black;
		border-radius: 8px;
		font-size: 1.3em;
		color: #BDB4B4;
	}
	input:hover{
		background:  rgb(0, 132, 125); color: #fff
	}
</style>

</head>
<body>
<a href="<?= base_url()?>"><div class="those"></div></a>
<h2 style="text-align:center">Register Form</h2>
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