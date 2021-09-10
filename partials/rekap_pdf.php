<?php

$content = "
	<html> 
	<body>
		<h1>HTML2PDF WORK !</h1> 
		'Selamat datang di rachmat.ID'
	</body>
	</html>
	";
	require __DIR__.'/assets/html2pdf_v5.2-master/vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$html2pdf = new Html2Pdf('P','A4','fr', true, 'UTF-8', array(15, 15, 15, 15), false); 
	$html2pdf->writeHTML($content);
	$html2pdf->output();
?>