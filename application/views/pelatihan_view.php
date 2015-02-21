<html>
<head>
	<title>Pelatihan</title>
</head>
<body>
<div class="row"><h1 class="page-header">Data Pelatihan</h1></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="pelatihan_baru">

 <i class="fa fa-plus"></i> Pelatihan Baru
</button>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover dataTable" id="data-pelatihan">
	<thead>
		<tr role="row">
			<th tabindex="0" aria-controls="data-pelatihan" aria-label="Browser: activate to sort column ascending" rowspan="1" colspan="1">Judul</th>
			<th>Tanggal</th>
			<th>Tempat</th>
			<th>Penyelengara</th>
			<th>Banner</th>
			<th>Kategori</th>
			<th>Biaya</th>
			<th>Kontak</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach($pelatihan as $pelatihan)
		{	
			$id=$pelatihan['id'];
			$judul=$pelatihan['judul'];
			$tanggal=date("d-F-Y", strtotime($pelatihan['tanggal']));
			$tempat=$pelatihan['tempat'];
			$penyelenggara=$pelatihan['penyelenggara'];
			$banner=base_url('asset/img/image').'/'.$pelatihan['banner'];
			$kategori=$pelatihan['kategori'];
			$biaya=$pelatihan['biaya'];
			$kontak=$pelatihan['kontak'];
			echo "<tr role='row'>
			<td>".$judul."</td>
			<td>".$tanggal."</td>
			<td>".$tempat."</td>
			<td>".$penyelenggara."</td>
			<td><img src='".$banner."' width='100px'></td>
			<td>".$kategori."</td>
			<td>".$biaya."</td>
			<td>".$kontak."</td>
			<td style='text-align:center'>".
			"<a href='#' title='".$id."' data-toggle='modal' class='det' data-target='#miModal'><span class='glyphicon glyphicon-eye-open'></span></a><br>".
			"<a href='#' id='".$id."' data-toggle='modal' class='yy' data-target='#meModal'><span class='glyphicon glyphicon-edit'></span></a><br>".
			"<a href='".base_url('boy/delete_pelatihan')."/".$id."' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini ?')\" id='delete-pelatihan-".$id."'><span class='glyphicon glyphicon-remove'></span></a>
			</td>
			</tr>";
		}
		?>
	</tbody>
	</table>
</div>	
<?=$this->pagination->create_links()?>
	<!---->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Tambah Pelatihan</h2>
      </div>
      <div class="modal-body" id="modal-isi1">
      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="meModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Edit Pelatihan</h2>
      </div>
      <div class="modal-body" id="modal-isi2">
      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Edit Pelatihan</h2>
      </div>
      <div class="modal-body" id="modal-isipel">
      
      </div>
    </div>
  </div>
</div>
</body>
</html>