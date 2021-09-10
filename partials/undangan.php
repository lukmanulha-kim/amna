<?php
if (!$_SESSION['id_user']) {
	echo "<script type='text/javascript'>window.location.href = '?page=login'</script>";
}else{
	if (isset($_GET['act'])) {
		if ($_GET['act']=='delete') {
			$ID = $_GET['id'];
			$DekripID = base64_decode($ID);
			$queryDelete1 = $con->query("DELETE FROM tb_undangan WHERE id_undangan='$DekripID'");
			$queryDelete2 = $con->query("DELETE FROM tb_bukutamu WHERE id_undangan='$DekripID'");
			if ($queryDelete1) {
				echo "<script type='text/javascript'>window.location.href = '?page=undangan'</script>";
			}
		}
	}
?>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>Tambah Undangan</b></div>
					<div class="panel-body">
						<form method="post" action="">
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" id="nama" name="nama" class="form-control" placeholder="masukkan Nama Undangan" autofocus required>
							</div>
							<div class="form-group">
								<label for="ya">Pernah Ngundang</label><br>
								<input type="radio" id="ya" name="pernah" value="1" class="detail">&nbsp
								<label class="label label-success" for="ya">Iya</label>&nbsp&nbsp
								<input type="radio" id="tidak" name="pernah" value="0" class="detail">&nbsp
								<label class="label label-danger" for="tidak">Tidak</label>
							</div>
							<div class="form-group" id="isiamplop">
								<label for="isi">Isi Amplop</label>
								<input type="text" id="isi" name="isi" class="form-control" placeholder="masukkan Isi Amplop">
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
										<th>Pernah Ngundang</th>
										<th>Isi Amplop</th>
										<th><i class="fa fa-trash"></i></th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; $showQuery = $con->query("SELECT * FROM tb_undangan"); while ($data = $showQuery->fetch_row()) { ?>
									<tr>
										<td><?= $nomor++ ?></td>
										<td><?= $data[1] ?></td>
										<td><?php if($data[2]=='1'){echo "<label class='label label-success'>Iya</label>";}else{echo "<label class='label label-warning'>Tidak</label>";}?></td>
										<td><?php echo "Rp. ".number_format( $data[3],0,',','.'); ?></td>
										<td><a href="?page=undangan&act=delete&id=<?php echo base64_encode($data[0]);?>" class="btn btn-xs btn-danger" onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Ini?')"><i class="fa fa-trash"></i></a></td>
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
		$pernah = $_POST['pernah'];
		if($pernah==0){
		    $isi=0;
		}else{
		    $isi = $_POST['isi'];    
		}
		

		$query = $con->query("INSERT INTO tb_undangan VALUES (null, '$nama', '$pernah', '$isi')");
		if ($query) {
			echo "<script type='text/javascript'>window.location.href = '?page=undangan'</script>";
		}
	}
}
?>