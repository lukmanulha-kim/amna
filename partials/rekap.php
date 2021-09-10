<?php
$queryUndangan = $con->query("SELECT id_undangan FROM tb_undangan");
$jumlahUndangan = mysqli_num_rows($queryUndangan);
$queryTamu = $con->query("SELECT id_tamu FROM tb_bukutamu");
$jumlahTamu = mysqli_num_rows($queryTamu);
$tidakHadir = $jumlahUndangan-$jumlahTamu;
?>
<section id="content">
	<div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="panel panel-info">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <div style="margin-top: 14px;">
                  <i class="fa fa-users fa-5x"></i>
                </div>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $jumlahUndangan ?></p>
                <p class="announcement-text"><b>Undangan</b></p>
              </div>
            </div>
          </div>
          <!-- <a href="#">
            <div class="panel-footer announcement-bottom">
              <div class="row">
                <div class="col-xs-6">
                  View Mentions
                </div>
                <div class="col-xs-6 text-right">
                  <i class="fa fa-arrow-circle-right"></i>
                </div>
              </div>
            </div>
          </a> -->
        </div>
      </div>

      <div class="col-lg-4">
        <div class="panel panel-success">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <div style="margin-top: 14px;">
                  <i class="fa fa-users fa-5x"></i>
                </div>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $jumlahTamu ?></p>
                <p class="announcement-text"><b>Hadir</b></p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4">
        <div class="panel panel-danger">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <div style="margin-top: 14px;">
                  <i class="fa fa-users fa-5x"></i>
                </div>
              </div>
              <div class="col-xs-6 text-right">
                <p class="announcement-heading"><?php echo $tidakHadir ?></p>
                <p class="announcement-text"><b>Tidak Hadir</b></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <a href="report/rekap_pdf.php" class="btn btn-lg btn-block btn-primary" target="_blank"><i class="fa fa-paper-plane"></i> Detail</a>
	</div>
</section>