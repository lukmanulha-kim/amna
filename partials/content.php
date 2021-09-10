<?php  ?>
<section id="content">
	<div class="container">
		<?php if (@$_SESSION['id_user']=="") { ?>
	  	<div class="jumbotron">
		  <h1>Selamat Datang</h1>
		  <p>di Aplikasi Manajemen Undangan</p>
		  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
		</div>
		<?php }else{ ?>
		<div class="jumbotron">
		  <h2>Selamat Datang <b><?php echo $_SESSION['nama'] ?></b> 😊</h2>
		  <p>di Aplikasi Manajemen Undangan</p>
		  <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p> -->
		</div>
		<!-- <div class="alert alert-info">Selamat Datang <b><?php echo $_SESSION['nama'] ?></b> 😊</div> -->
		<?php } ?> 
	</div>
</section>