<?=doctype('html5')?>
<title>Login</title>
<?=link_tag('asset/css/bootstrap.css')?>
<?=link_tag('asset/css/bootstrap-theme.css')?>
<?=link_tag('asset/css/login_style.css')?>
<link rel="shortcut icon" href="<?= base_url('asset/img/icon/logo_kecil.png')?>" sizes="16x16" type="image/x-icon" />
<!--body-->

<center>
	<form action="<?php echo $target; ?>" method="post" id='form-login' name='form-login' accept-charset="utf-8">
		<div id='judul'>
			<?php if(isset($judul)){echo $judul;} else {echo "Super User Login Page";} ?>
			
		</div>
		<div class="alert-danger" role="alert" style='margin-top:10px'>
			<?=$this->session->flashdata('error_login')?>
		</div>
		<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'><span class='glyphicon glyphicon-user'></span></span>
			<input type="text" class='form-control' name="<?php echo $username; ?>" placeholder="<?php echo $username; ?>">
		</div>
		<div class='input-group'>
			<span class='input-group-addon'><span class='glyphicon glyphicon-asterisk'></span></span>
			<input type='password' class='form-control' name="password" placeholder="password">
		</div>
		<button class="btn btn-primary"  style='margin-top:5px'>Login</button>
		<div class="alert-warning" role="alert" style='margin-top:10px'>
			<?=validation_errors()?>
		</div>
	</form>
</center>
<script src="<?=base_url('asset/js/jquery.min.js')?>" type="text/javascript" charset="utf-8"></script>