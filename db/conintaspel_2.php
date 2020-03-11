<?php
	$serverName = "SERVERAPP";/*"localhost\sqlexpress, 1433";*/
	$connectionInfo = array("Database"=>"Aspel_SAE_Alyf", "UID"=>"sa","PWD"=>"Alyc2019", "CharacterSet" => "UTF-8");
	$coninas= sqlsrv_connect($serverName, $connectionInfo);
	if (!$coninas)
	{
		echo "Acceso Denegado!<br/>";
		die( print_r( sqlsrv_errors(),true));
		exit;
	}

?>