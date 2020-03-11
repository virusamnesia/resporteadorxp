<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Reportador XP</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos-titulos.css">
	<link rel="stylesheet" href="css/font-awesome.css">

	
</head>
<body>
	<div class="container container-fluid">
		<div class="row">
			<div class="col-md-10">
				<div class="row">
					<h1>REPORTEADOR XP</h1>
				</div>
				<div class="row">
					<p aling="right">
						<?php 
							$user="Distribuidora Alyc";
							$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sábado');
							$mes = array('Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre');
							echo 'Usuario: '.$user.', Hoy es: '.$dias[date('w')] .' '.date('d').' de '.$mes[date('m')-1].' de '.date('Y');
							//set_locale(LC_ALL,”es_ES”,”esp”);
							//echo strftime(“ %d \de %m \del %Y”); 
						?>
						<input type="hidden" name="hoy" value=<?php $hoy = date('d').'/'.date('m').'/'.date('Y'); echo $hoy;?>>
					</p>
				</div>
			</div>
			<div class="col-md-2">
				<div class="row">
					<a href="inicio.html" target="principal">
						<img src="imagenes/logo1.png" width=100 height=80 ></img>
					</a>
				</div>
			</div>
			
		</div>
		
	</div>
	

	
	<script src="js/jquery-3.2.1.js"></script>
	<script src="js/main.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>