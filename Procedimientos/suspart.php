<?php 
	
	include("../db/conintaspel.php");

	$art=$_POST['art'];
	$uni=$_POST['uni'];

	$queryup="UPDATE INVE_CLIB01 SET CAMPLIB11='S' WHERE TRIM(CLAVE)='$art' OR TRIM(CLAVE)='$uni'";
	echo $result=sqlsrv_query($coninas,$queryup);
 ?>