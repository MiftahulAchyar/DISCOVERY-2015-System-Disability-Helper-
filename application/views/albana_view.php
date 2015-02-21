<html>
<head>
	<title>Albana</title>
</head>
<body>
<div class="row"><h1 class="page-header">Data Albana <small> (alat bantu untuk semua)</small></h1></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="albana_baru">
 <i class="fa fa-plus"></i> Tambah Albana
</button>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover dataTable">
		<tr>
			<th>Barang</th>
			<th>Foto</th>
			<th>Pemiik</th>
			<th>Lokasi Saat Ini</th>
			<th>Kategori</th>
			<th>Action</th>
		</tr>
		<?php
		foreach($albana as $albana)
		{	
			$id=$albana['id'];
			$nama_albana=$albana['nama_albana'];
			$foto=base_url('asset/img/image').'/'.$albana['foto'];
			$pemiik=$albana['pemilik'];
			$posisi=$albana['posisi'];
			$kategori=$albana['kategori'];
			echo "<tr>
			<td>".$nama_albana."
			<td><img src='".$foto."' width='100px'>
			<td>".$pemiik."
			<td>".$posisi."
			<td>".$kategori."
			<td style='text-align:center'>".
			"<a href='#' id='".$id."' data-toggle='modal' class='zz' data-target='#meModal'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;&nbsp;".
			"<a href='".base_url('boy/delete_albana')."/".$id."' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini ?')\" id='delete-albana-".$id."'><span class='glyphicon glyphicon-remove'></span></a>
			</td>
			</tr>";
		}
		?>
	</table>
	</div>
	<?=$this->pagination->create_links()?>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Tambah Albana</h2>
      </div>
      <div class="modal-body" id="modal-isi3">
      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="meModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Edit Albana</h2>
      </div>
      <div class="modal-body" id="modal-isi4">
      
      </div>
    </div>
  </div>
</div>
</body>
</html>