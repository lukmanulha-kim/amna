<?php
if (!$_SESSION['id_user']) {
	echo "<script type='text/javascript'>window.location.href = '?page=login'</script>";
}else{
?>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-primary">
					<div class="panel-heading"><b>Tambah Tamu</b></div>
					<div class="panel-body">
						<form method="post" action="">
							<div class="form-group">
								<label for="nama">Pilih Tamu</label>
								<select class="form-control js-example-basic-single" name="tamu" autofocus required>
									<option value="">Pilih Tamu</option>
									<?php
									$querySelect = $con->query("SELECT * FROM tb_undangan WHERE id_undangan NOT IN (SELECT id_undangan FROM tb_bukutamu)");
									while ($rowSelect=$querySelect->fetch_row()) {
										echo "<option value='".$rowSelect[0]."'>".$rowSelect[1]."</option>";
									}
									?>
								</select>
							</div>
							<div class="form-group">
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
					<div class="panel-heading"><b>Tamu Hadir</b></div>
					<div class="panel-body tampildata">
						<div class="table-responsive">
							<table class="table table-striped table-responsive table-hover dataTable">
								<thead>
									<tr>
										<th>No</th>
										<th width="70%">Nama</th>
										<th>Isi Amplop</th>
									</tr>
								</thead>
								<tbody>
									<?php $nomor = 1; $showQuery = $con->query("SELECT tb_bukutamu.id_tamu, tb_undangan.nama, tb_bukutamu.isiamplop FROM tb_bukutamu inner join tb_undangan on tb_bukutamu.id_undangan=tb_undangan.id_undangan" ); while ($data = $showQuery->fetch_row()) { ?>
									<tr>
										<td><?= $nomor++ ?></td>
										<td><?= $data[1] ?></td>
										<td><label class="label label-success"><?php echo "Rp. ".number_format( $data[2],0,',','.'); ?></label></td>
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
		$nama = $_POST['tamu'];
		$isi = $_POST['isi'];

		$query = $con->query("INSERT INTO tb_bukutamu VALUES (null, '$nama', '$isi')");
		if ($query) {
			echo "<script type='text/javascript'>window.location.href = '?page=bukutamu'</script>";
		}
	}
}
?>