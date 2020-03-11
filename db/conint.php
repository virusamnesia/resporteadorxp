<?php
	$serverName = "SERVERAPP";/*"localhost\sqlexpress, 1433";*/
	$connectionInfo = array("Database"=>"interfazxp_SQL", "UID"=>"sa","PWD"=>"Alyc2019");
	$coni= sqlsrv_connect($serverName, $connectionInfo);
	if (!$coni)
	{
		echo "Acceso Denegado!<br/>";
		die( print_r( sqlsrv_errors(),true));
		exit;
	}

?>