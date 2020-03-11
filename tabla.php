<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Tabla Dinamica</title>
	
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="alertify/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="alertify/css/themes/default.css">

	
</head>
<body>
	
	<div class="container">
		<div id="tabla"></div>
	</div>

<!-- Button trigger modal para registros nuevos -->
<!-- Modal -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agrega nueva persona</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label>Nombre</label>
        <input type="text" name="" id="nombre" class="form-control input-sm">
        <label>Apellido</label>
        <input type="text" name="" id="apellido" class="form-control input-sm">
        <label>Email</label>
        <input type="text" name="" id="email" class="form-control input-sm">
        <label>Telefono</label>
        <input type="text" name="" id="telefono" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">Agregar</button>
      </div>
    </div>
  </div>
</div>

<!-- Button trigger modal para edición de registros -->
<!-- Modal -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar datos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="text" hidden="" name="" id="idpersona">
        <label>Nombre</label>
        <input type="text" name="" id="nombreu" class="form-control input-sm">
        <label>Apellido</label>
        <input type="text" name="" id="apellidou" class="form-control input-sm">
        <label>Email</label>
        <input type="text" name="" id="emailu" class="form-control input-sm">
        <label>Telefono</label>
        <input type="text" name="" id="telefonou" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
    </div>
  </div>
</div>

	<script src="jquery-3.4.1.min.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
	<script src="alertify/alertify.js"></script>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('tabladinamica.php');
	});
</script>