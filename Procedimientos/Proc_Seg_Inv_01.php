<?php 
	
	$fecha=date('Y').'/'.date('m').'/'.date('d');

	include("../db/conintaspel.php");
	include("../db/conint.php");
	echo "<title> Seguimiento Inventario Alyc</title>";
	$bandera=0;
	$querysel="SELECT ART FROM SEG_INV_ALYC WHERE FECHA='$fecha' ORDER BY ART";
	$ressel=sqlsrv_query($coni,$querysel);
	if(!$ressel){
		echo "Error en la consulta: $querysel !!!";
		exit;
	}
	else{
		$rowsel=sqlsrv_fetch_object($ressel);
		if($rowsel!=NULL){
			echo "<br><br><h1>Proceso Cancelado por registros existentes en fecha: $fecha !!!</h1>";
			$bandera=0;
			exit;
		}
		else{
		$bandera=1;
		}
	}

	if($bandera==1){
		$querymar="SELECT ART, DESCU, PROV, FAMILIA, ESTATUS_COM, COSTO, UNI, FACTOR, ALM1, ALM2, ALM3, EXIST, REQ, ORD, DISPO, MINIMO, COT, PED, REM, OLA, NECES, COMPRA, NEG, MIC, C_SUG FROM SEG_INV ORDER BY ART";
		$resmar=sqlsrv_query($coninas,$querymar);
		if(!$resmar){
			echo "Error en la consulta: $querymar !!!";
			exit;
		}
		echo "<h1>Inicia Proceso: ".$fecha."!!!</h2>";
		$cont=0;
		while($rowmar=sqlsrv_fetch_object($resmar)){
			$queryins="INSERT INTO SEG_INV_ALYC (ART ,DESCU ,PROV , FAMILIA, ESTATUS_COM,COSTO ,UNI ,FACTOR ,ALM1 ,ALM2 ,ALM3 ,EXIST ,REQ ,ORD ,DISPO ,MINIMO ,COT ,PED ,REM ,OLA ,NECES ,COMPRA ,NEG ,MIC ,C_SUG,FECHA) VALUES('$rowmar->ART', '$rowmar->DESCU', '$rowmar->PROV', '$rowmar->FAMILIA', '$rowmar->ESTATUS_COM', $rowmar->COSTO, '$rowmar->UNI', $rowmar->FACTOR, $rowmar->ALM1, $rowmar->ALM2, $rowmar->ALM3, $rowmar->EXIST, $rowmar->REQ, $rowmar->ORD, $rowmar->DISPO, $rowmar->MINIMO, $rowmar->COT, $rowmar->PED, $rowmar->REM, $rowmar->OLA, $rowmar->NECES, $rowmar->COMPRA, $rowmar->NEG, $rowmar->MIC, $rowmar->C_SUG,'$fecha')";
			$resins=sqlsrv_query($coni,$queryins);
			if(!$resins){
				echo "Error en la consulta: $queryins !!!";
			}
			else{
				$cont++;
			}
		 }
		 echo "<br><br><h1>Finaliza proceso</h1>";	
	}
	else{
		echo "<br><br><h1>Proceso Cancelado por registros existentes en fecha: $fecha !!!</h1>";
	}
 ?>
