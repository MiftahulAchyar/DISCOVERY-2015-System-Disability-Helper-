<!DOCTYPE html>
<html>
<head>
<style>
	table{height: 100%; width:100%}
	tr{height: 30%; width:100%; text-align: center;}
</style>
</head>
<body>
<table>
	<tr><td colspan="3"><h1>Loading...</h1></td></tr>
	<tr>
		<td></td>
		<td><img src="<?= base_url()?>asset/img/gif/loading.gif"></img></td>
		<td></td>
	</tr>
	<tr></tr>
</table>
<script src="<?= base_url()."asset/admin/bower_components/jquery/dist/jquery.min.js"?>"></script>
<script>
$().ready(function(){
	var t1 = $(window).height();
	var t2 = $(window).width();
	t1 = parseInt(t1);
	t2 = parseInt(t2);
	$('table').css('height',t1);
	$(window).resize(function(){
		
		$('table').css({'height':t1+'px'});
		$('tr').css('width',t2+'px')
	});
});
</script>
</body>
</html>