<?php
require('../config/config.php');
require('../assets/fpdf/fpdf.php');

$nomor = 1;
$queryUndangan = $con->query("SELECT id_undangan FROM tb_undangan");
$jumlahUndangan = mysqli_num_rows($queryUndangan);
$queryTamu = $con->query("SELECT * FROM tb_bukutamu inner join tb_undangan on tb_bukutamu.id_undangan=tb_undangan.id_undangan");
$jumlahTamu = mysqli_num_rows($queryTamu);
$tidakHadir = $jumlahUndangan-$jumlahTamu;

$pdf = new FPDF('P','cm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(19,1,'Rekap Data Tamu Undangan',0,1, 'C');

$pdf->Cell(19,0.5,'',0,1, 'C');

$pdf->Cell(2,0.8,'',0,0, 'C');
$pdf->Cell(5,0.8,$jumlahUndangan,1,0, 'C');
$pdf->Cell(5,0.8,$jumlahTamu,1,0, 'C');
$pdf->Cell(5,0.8,$tidakHadir,1,1, 'C');

$pdf->SetFont('Arial','',12);

$pdf->Cell(2,0.8,'',0,0, 'C');
$pdf->Cell(5,0.8,'Undangan',1,0, 'C');
$pdf->Cell(5,0.8,'Hadir',1,0, 'C');
$pdf->Cell(5,0.8,'Tidak Hadir',1,1, 'C');

$pdf->Cell(19,0.5,'',0,1, 'C');

$pdf->SetFont('Arial','B',12);

$pdf->Cell(1,0.8,'No',1,0, 'C');
$pdf->Cell(8,0.8,'Nama',1,0, 'C');
$pdf->Cell(5,0.8,'Ket',1,0, 'C');
$pdf->Cell(5,0.8,'Isi Amplop',1,1, 'C');

$pdf->SetFont('Arial','',12);
$hitungTami = mysqli_num_rows($queryTamu);
while ($dataTamu = mysqli_fetch_array($queryTamu)) {
	if ($hitungTami==0) {
		$pdf->Cell(1,0.8,$nomor++,1,0, 'C');
		$pdf->Cell(18,0.8,'Tidak Ada Data',1,1,'C');
	}else{
		$pdf->Cell(1,0.8,$nomor++,1,0, 'C');
		$pdf->Cell(8,0.8,$dataTamu['nama'],1,0);
		$pdf->Cell(5,0.8,'Hadir',1,0, 'C');
		$pdf->Cell(5,0.8,'Rp. '.number_format($dataTamu['isiamplop'],0,',','.'),1,1);
	}
}

$IsiAmplop = $con->query("SELECT sum(tb_bukutamu.isiamplop) as total From tb_bukutamu inner join tb_undangan on tb_bukutamu.id_undangan=tb_undangan.id_undangan")->fetch_array();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(1,0.8,'',1,0);
$pdf->Cell(13,0.8,'Total',1,0);
$pdf->Cell(5,0.8,'Rp. '.number_format($IsiAmplop[0],0,',','.'),1,1);

$queryTidakHadir = $con->query("SELECT * FROM tb_undangan WHERE id_undangan NOT IN (SELECT id_undangan FROM tb_bukutamu)");

$pdf->SetFont('Arial','',12);
$no = 1;
while ($dataTH = mysqli_fetch_array($queryTidakHadir)) {
	$pdf->Cell(1,0.8,$no++,1,0, 'C');
	$pdf->Cell(8,0.8,$dataTH['nama'],1,0);
	$pdf->Cell(5,0.8,'Tidak Hadir',1,0, 'C');
	$pdf->Cell(5,0.8,'Rp. -',1,1);
}

$pdf->Output('I','Rekap Data Tamu Undangan.pdf');
?>