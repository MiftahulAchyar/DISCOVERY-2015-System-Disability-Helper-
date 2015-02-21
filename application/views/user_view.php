<html>
<head>
	<title>Users</title>
</head>
<body>
<div class="row"><h1 class="page-header">Data Users <small> </small></h1></div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal" id="user_baru">
 <i class="fa fa-plus"></i> Tambah User
</button>
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover dataTable">
		<tr>
			<th>Nama</th>
			<th>Password</th>
			<th>Email</th>
			<th>Telp</th>
			<th>Action</th>
		</tr>
		<?php
		foreach($user as $user)
		{	
			$id=$user['id'];
			$nama=$user['nama'];
			$password=$user['password'];
			$email=$user['email'];
			$telp=$user['telp'];
			echo "<tr>
			<td>".$nama."
			<td>".$password."
			<td>".$email."
			<td>".$telp."
			<td style='text-align:center'>".
			"<a href='#' title='".$id."' data-toggle='modal' class='detail' data-target='#moModal'><span class='glyphicon glyphicon-eye-open'></span></a>&nbsp;&nbsp;".
			"<a href='#' id='".$id."' data-toggle='modal' class='ww' data-target='#maModal'><span class='glyphicon glyphicon-edit'></span></a>&nbsp;&nbsp;".
			"<a href='".base_url('boy/delete_user')."/".$id."' onclick=\"return confirm('Apakah anda yakin ingin menghapus user ini ?')\" id='delete-user-".$id."'><span class='glyphicon glyphicon-remove'></span></a>
			</td>
			</tr>";
		}
		?>
	</table>
	</div>
	<?=$this->pagination->create_links()?>

<div class="modal fade" id="moModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Detail User</h2>
      </div>
      <div class="modal-body" id="modal-isidetail">
      
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Tambah User</h2>
      </div>
      <div class="modal-body" id="modal-isiuser1">
      
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="maModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title" id="myModalLabel">Edit User</h2>
      </div>
      <div class="modal-body" id="modal-isiuser">
      
      </div>
    </div>
  </div>
</div>

</body>
</html>