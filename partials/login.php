<?php
$query = $con->query("SELECT id_user FROM tb_user");
$cekData = mysqli_num_rows($query);
?>
<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
			  	<div class="panel panel-default">
				  <div class="panel-body">
				  	<?php if ($cekData>0){ ?>
				  	<form method="post" action="">
				  		<div class="form-group">
				  			<label for="email">E-mail</label>
				  			<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan E-Mail" autofocus></input>
				  		</div>
				  		<div class="form-group">
				  			<label for="password">Password</label>
				  			<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password"></input>
				  		</div>
			  			<input type="submit" name="login" class="btn btn-sm btn-info" value="Login">
				  	</form>
				  	<?php }else{ ?>
				  	<form method="post" action="">
				  		<div class="form-group">
				  			<label for="nama">Nama Lengkap</label>
				  			<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" autofocus></input>
				  		</div>
				  		<div class="form-group">
				  			<label for="email">E-mail</label>
				  			<input type="email" name="email" id="email" class="form-control" placeholder="Masukkan E-Mail" autofocus></input>
				  		</div>
				  		<div class="form-group">
				  			<label for="password">Password</label>
				  			<input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password"></input>
				  		</div>
			  			<input type="submit" name="signup" class="btn btn-sm btn-info" value="Daftar">
				  	</form>
				  	<?php }
				  	if (isset($_POST['login'])) {
				  		$email = $_POST['email'];
				  		$password = sha1($_POST['password']);

				  		$cek = $con->query("SELECT * from tb_user where email='$email' AND password='$password'");
				  		$row = $cek -> fetch_row();
				  		// echo $row[1];
				  		$_SESSION['id_user'] = $row[0];
				  		$_SESSION['nama'] = $row[1];
				  		
				  		// header("location:index.php");
				  		echo "<script>window.location.href='./';</script>";
				  		exit;
				  	}
				  	if (isset($_POST['signup'])) {
				  		$nama = $_POST['nama'];
				  		$email = $_POST['email'];
				  		$password = sha1($_POST['password']);

				  		$daftar = $con->query("INSERT INTO tb_user VALUES (null,'$nama','$email','$password', '1')");
				  		if ($daftar) {
				  			echo "<script>alert('Berhasil Daftar 😊. Silahkan Login');window.location.href = '?page=login'</script>";
				  		}else{
				  		    echo "Gagal-".$daftar -> error();
				  		}
				  	}

				  	?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>