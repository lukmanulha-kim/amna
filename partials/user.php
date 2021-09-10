<?php
if (!$_SESSION['id_user']) {
	echo "<script type='text/javascript'>window.location.href = '?page=login'</script>";
}else{
	if (isset($_GET['act'])) {
		if ($_GET['act']=='delete') {
			$ID = $_GET['id'];
			$DekripID = base64_decode($ID);
			$queryDelete = $con->query("DELETE FROM tb_user WHERE id_user='$DekripID'");
			if ($queryDelete) {
				echo "<script type='text/javascript'>window.location.href = '?page=user'</script>";
			}
		}
	}
?>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>Tambah User</b></div>
					<div class="panel-body">
						<form method="post" action="">
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan Nama Pengguna" autofocus required>
							</div>
							<div class="form-group">
								<label for="email">E-Mail</label>
								<input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" name="password" class="form-control" placeholder="Isi Password" required>
							</div>
							<input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
						</form>
					</div>
				</div>
			</div>

			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>List Undangan</b></div>
					<div class="panel-body tampildata">
						<div class="table-responsive">
							<table class="table table-striped table-responsive table-hover dataTable">
								<thead>
									<tr>
										<th>No</th>
										<th width="50%">Nama</th>
										<th>Email</th>
										<th><i class="fa fa-trash"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; $showQuery = $con->query("SELECT * FROM tb_user"); while ($data = $showQuery->fetch_row()) { ?>
									<tr>
										<td><?= $nomor++ ?></td>
										<td><?= $data[1] ?></td>
										<td><?= $data[2] ?></td>
										<td><a href="?page=user&act=delete&id=<?php echo base64_encode($data[0]);?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><i class="fa fa-trash"></i></a></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php 
	if (isset($_POST['simpan'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = sha1($_POST['password']);

		$query = $con->query("INSERT INTO tb_user VALUES (null, '$nama', '$email', '$password','0')");
		if ($query) {
			echo "<script type='text/javascript'>window.location.href = '?page=user'</script>";
		}
	}
}
?>