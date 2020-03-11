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
			 <option value="<?php echo $row->CVE_ART ?>"><?php echo $row->DESCR ?></option>
			<?php }; 
			sqlsrv_close($coninas)?>
		</select>
	</div>
</div>



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