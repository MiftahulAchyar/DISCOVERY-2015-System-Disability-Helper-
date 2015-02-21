<!DOCTYPE html>
<html>
	<head>
		<title>detail user</title>
	</head>
	<body>
		<?php
		foreach($data as $data){
			echo " nama : ".$data['nama']."<br>";
		}
		foreach ($barang as $barang) {
			echo "<img width='100' src='".base_url('asset/img/image/'.$barang['foto'])."'><br>";
		}
		?>
	</body>
</html>