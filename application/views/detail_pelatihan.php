<!DOCTYPE html>
<html>
	<head>
		<title>detail pelatihan</title>
	</head>
	<body>
		<?php 
		foreach($data as $data){
			echo "<div style='text-align:center;box-shadow:0px 0px 2px gray;border-radius:5px;padding:5px'>";
			echo "<div class='Judul'><h1>".$data['judul']."</h1></div><br>";
			echo "<img src='" .base_url('asset/img/image').'/'.$data['banner']."'><br>";
			echo "Penyelenggara : ".$data['penyelenggara']."<br>";
			echo "biaya : ".$data['biaya']."<br>";
			echo "detail : ".$data['detail']."<br>";	
			echo "</div>";	
		}
		?>
	</body>
</html>