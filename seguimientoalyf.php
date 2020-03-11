<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Seguimiento de Inventario</title>
	
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertify/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="librerias/datatable/dataTables.bootstrap.min.css">
</head>
<body>
	<h2>Seguimiento de Inventario ALYF</h2>
	<div class="container">
		<div id="tabla"></div>
	</div>

<!-- Button trigger modal para filtros -->
<!-- Modal -->
<div class="modal fade" id="filtros" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Filtros</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php 
			include("db/conintaspel_2.php");
			//$conexion=conexion();

			$sql="SELECT NOMBRE FROM PROV02 WHERE STATUS='A' ORDER BY NOMBRE";
			$result=sqlsrv_query($coninas,$sql);
		?>
		<br>
		<div class="row">
			<div clas="col-sm-12"></div>
			<div class="col-sm-12">
				<label>PROVEEDORES</label>
				<select id="buscadorp" class="form-control input-md" width="100%">
					<option value=0>TODOS LOS PROVEEDORES</option>
					<?php
						while($row=sqlsrv_fetch_object($result)){ 
					 ?>
					 <option value="<?php echo $row->NOMBRE ?>"><?php echo $row->NOMBRE ?></option>
					<?php }; ?>
				</select>
			</div>
		</div>

		<?php 
			$sql="SELECT CVE_ART, DESCR FROM INVE02 WHERE STATUS='A' AND TIPO_ELE='P' ORDER BY CVE_ART";
			$result=sqlsrv_query($coninas,$sql);
		?>
		<br>
		<div class="row">
			<div clas="col-sm-12"></div>
			<div class="col-sm-12">
				<label>CLAVES PRODUCTOS</label>
				<select id="buscadora" class="form-control input-md" width="100%">
					<option value=0>TODOS LOS PRODUCTOS</option>
					<?php
						while($row=sqlsrv_fetch_object($result)){ 
					 ?>
					 <option value="<?php echo $row->CVE_ART ?>"><?php echo $row->CVE_ART ?></option>
					<?php }; ?>
				</select>
			</div>
		</div>

		<?php 
			$sql="SELECT CVE_ART, DESCR FROM INVE02 WHERE STATUS='A' AND TIPO_ELE='P' ORDER BY CVE_ART";
			$result=sqlsrv_query($coninas,$sql);
		?>
		<br>
		<div class="row">
			<div clas="col-sm-12"></div>
			<div class="col-sm-12">
				<label>DESCRIPCIONES</label>
				<select id="buscadord" class="form-control input-md" width="100%">
					<option value=0>TODOS LOS PRODUCTOS</option>
					<?php
						while($row=sqlsrv_fetch_object($result)){ 
					 ?>
					 <option value="<?php echo $row->DESCR ?>"><?php echo $row->DESCR ?></option>
					<?php }; 
					sqlsrv_close($coninas)?>
				</select>
			</div>
		</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="aplicar">Aplicar</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal para seleccion de campos -->
<!-- Modal -->
<div class="modal fade" id="selector" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Selector de Campos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="checkbox" name="" id="ccosto" class="form-control input-sm" value="costo" checked>Costo
        <input type="checkbox" name="" id="cfactor" class="form-control input-sm" checked>Factor
        <input type="checkbox" name="" id="calm1" class="form-control input-sm" checked>Almacén 1
        <input type="checkbox" name="" id="calm2" class="form-control input-sm" checked>Almacén 2
        <input type="checkbox" name="" id="calm3" class="form-control input-sm" checked>Almacén 3
        <input type="checkbox" name="" id="cexist" class="form-control input-sm" checked>Existencia
        <input type="checkbox" name="" id="creq" class="form-control input-sm" checked>Requisiciones
        <input type="checkbox" name="" id="cord" class="form-control input-sm" checked>Ordenes
        <input type="checkbox" name="" id="cdisp" class="form-control input-sm" checked>Disponible
        <input type="checkbox" name="" id="cmin" class="form-control input-sm" checked>Minimo
        <input type="checkbox" name="" id="ccot" class="form-control input-sm" checked>Cotizaciones
        <input type="checkbox" name="" id="cped" class="form-control input-sm" checked>Pedidos
        <input type="checkbox" name="" id="crem" class="form-control input-sm" checked>Remisiones
        <input type="checkbox" name="" id="cola" class="form-control input-sm" checked>Ola
        <input type="checkbox" name="" id="cnec" class="form-control input-sm" checked>Necesidad
        <input type="checkbox" name="" id="ccom" class="form-control input-sm" checked>Compra
        <input type="checkbox" name="" id="cneg" class="form-control input-sm" checked>Negados
        <input type="checkbox" name="" id="cminc" class="form-control input-sm" checked>Minimo Compra
        <input type="checkbox" name="" id="csug" class="form-control input-sm" checked>Sugerencia Compra
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="selecto">Aplicar</button>
      </div>
    </div>
  </div>
</div>
	<script src="librerias/jquery-3.4.1.min.js"></script>
	<script src="librerias/funciones.js"></script>
	<script src="librerias/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<script src="librerias/alertify/alertify.js"></script>
	<script src="librerias/select2/js/select2.js"></script>
	<script src="librerias/datatable/jquery.dataTables.min.js"></script>
	<script src="librerias/datatable/dataTables.bootstrap.min.js"></script>
</body>
</html>


<script type="text/javascript">
	$(document).ready(function(){
		proveedor=$('#buscadorp').val();
		art=$('#buscadora').val();
		desc=$('#buscadord').val();
		cost=$('#ccosto').prop('checked');
		fact=$('#cfactor').prop('checked');
		alm1=$('#calm1').prop('checked');
		alm2=$('#calm2').prop('checked');
		alm3=$('#calm3').prop('checked');
		exis=$('#cexist').prop('checked');
		req=$('#creq').prop('checked');
		ord=$('#cord').prop('checked');
		disp=$('#cdisp').prop('checked');
		min=$('#cmin').prop('checked');
		cot=$('#ccot').prop('checked');
		ped=$('#cped').prop('checked');
		rem=$('#crem').prop('checked');
		ola=$('#cola').prop('checked');
		nec=$('#cnec').prop('checked');
		com=$('#ccom').prop('checked');
		neg=$('#cneg').prop('checked');
		minc=$('#cminc').prop('checked');
		sug=$('#csug').prop('checked');
		$('#tabla').load('tablaseguimiento2alyf.php',{proveedor,art,desc,cost,fact,alm1,alm2,alm3,exis,req,ord,disp,min,cot,ped,rem,ola,nec,com,neg,minc,sug});
	});
</script>

<!--
<script type="text/javascript">
	$(document).ready(function(){
		version=0;
		proveedor="";
		uni="";
		pu="";
		cargatabla(version, proveedor, uni, pu);
	});
</script>
-->
<script type="text/javascript">
	$(document).ready(function(){
		$('#aplicar').click(function(){
			proveedor=$('#buscadorp').val();
			art=$('#buscadora').val();
			desc=$('#buscadord').val();;
			cost=$('#ccosto').prop('checked');
			fact=$('#cfactor').prop('checked');
			alm1=$('#calm1').prop('checked');
			alm2=$('#calm2').prop('checked');
			alm3=$('#calm3').prop('checked');
			exis=$('#cexist').prop('checked');
			req=$('#creq').prop('checked');
			ord=$('#cord').prop('checked');
			disp=$('#cdisp').prop('checked');
			min=$('#cmin').prop('checked');
			cot=$('#ccot').prop('checked');
			ped=$('#cped').prop('checked');
			rem=$('#crem').prop('checked');
			ola=$('#cola').prop('checked');
			nec=$('#cnec').prop('checked');
			com=$('#ccom').prop('checked');
			neg=$('#cneg').prop('checked');
			minc=$('#cminc').prop('checked');
			sug=$('#csug').prop('checked');
			$('#tabla').load('tablaseguimiento2alyf.php',{proveedor,art,desc,cost,fact,alm1,alm2,alm3,exis,req,ord,disp,min,cot,ped,rem,ola,nec,com,neg,minc,sug});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#selecto').click(function(){
			proveedor=$('#buscadorp').val();
			art=$('#buscadora').val();
			desc=$('#buscadord').val();
			cost=$('#ccosto').prop('checked');
			fact=$('#cfactor').prop('checked');
			alm1=$('#calm1').prop('checked');
			alm2=$('#calm2').prop('checked');
			alm3=$('#calm3').prop('checked');
			exis=$('#cexist').prop('checked');
			req=$('#creq').prop('checked');
			ord=$('#cord').prop('checked');
			disp=$('#cdisp').prop('checked');
			min=$('#cmin').prop('checked');
			cot=$('#ccot').prop('checked');
			ped=$('#cped').prop('checked');
			rem=$('#crem').prop('checked');
			ola=$('#cola').prop('checked');
			nec=$('#cnec').prop('checked');
			com=$('#ccom').prop('checked');
			neg=$('#cneg').prop('checked');
			minc=$('#cminc').prop('checked');
			sug=$('#csug').prop('checked');
			$('#tabla').load('tablaseguimiento2alyf.php',{proveedor,art,desc,cost,fact,alm1,alm2,alm3,exis,req,ord,disp,min,cot,ped,rem,ola,nec,com,neg,minc,sug});
		});
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#buscador').load('buscadoralyf.php');
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#buscadorp').select2();
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#buscadora').select2();
	});
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#buscadord').select2();
	});
</script>