

	<div class="row">
		<div class="col-sm-12">
			<h2>Tabla Dinamica</h2>
			<table class="table table-hover table-condensed table-bordered">
				<caption>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
						Agregar nuevo 
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</caption>
				<tr>
					<td>Nombre</td>
					<td>Apellido</td>
					<td>Email</td>
					<td>Telefono</td>
					<td>Editar</td>
					<td>Eliminar</td>
				</tr>
				<?php 
					include("db/conintaspel.php");
					$querymar="SELECT CLAVE, NOMBRE, RFC, EMAILPRED, TELEFONO FROM CLIE01";
					$resmar=sqlsrv_query($coninas,$querymar);
					if(!$resmar){
						echo "Error en la consulta: $querymar !!!";
						exit;
					}
					while($rowmar=sqlsrv_fetch_object($resmar)){
				 ?>
				<tr>
					<td><?php echo $rowmar->NOMBRE;  ?></td>
					<td><?php echo $rowmar->RFC;  ?></td>
					<td><?php echo $rowmar->EMAILPRED;  ?></td>
					<td><?php echo $rowmar->TELEFONO;  ?></td>
					<td>
						<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion"></button>
					</td>
					<td>
						<button class="btn btn-danger glyphicon glyphicon-remove"></button>
					</td>
				</tr>
				<?php }  ?>
			</table>
		</div>
	</div>
