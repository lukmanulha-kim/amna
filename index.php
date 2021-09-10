<?php 
error_reporting(0);
include 'config/config.php';
include 'partials/header.php';
if ($_GET['page']=="") {
	include 'partials/content.php';
}else{
	include 'partials/'.$_GET['page'].'.php';
}
include 'partials/footer.php';
?>