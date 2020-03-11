<?php 
	
	include("../db/conintaspel.php");

	$art=$_POST['art'];
	$min=$_POST['min'];
	$fac=$_POST['fac'];
	$minimo=$min*$fac;

	$queryup="UPDATE INVE01 SET STOCK_MIN=$minimo WHERE TRIM(CVE_ART)='$art'";
	echo $result=sqlsrv_query($coninas,$queryup);
 ?>