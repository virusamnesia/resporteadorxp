

	<div class="row">
		<div class="col-sm-12">
			
			<table class="table table-hover table-condensed table-bordered">
				<caption>
					<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
						Agregar nuevo 
						<span class="glyphicon glyphicon-plus"></span>
					</button>
				</caption>
				<tr>
					<td>ARTICULO</td>
					<td>DESCRIPCION</td>
					<td>PROVEEDORES</td>
					<td>COSTO</td>
					<td>PREPACK</td>
					<td>FACTOR</td>
					<td>ALMACEN 1</td>
					<td>ALMACEN 2</td>
					<td>ALMACEN 3</td>
					<td>EXISTENCIA</td>
					<td>REQUISICIONES</td>
					<td>ORDENES</td>
					<td>DISPONIBLE</td>
					<td>MINIMO</td>
					<td>COTIZACIONES</td>
					<td>PEDIDOS</td>
					<td>REMISIONES</td>
					<td>OLA</td>
					<td>NECESIDAD</td>
					<td>COMPRA</td>
					<td>NEGADOS</td>
					<td>MINIMO COMPRA</td>
					<td>COMPRA SIGUERIDA</td>
				</tr>
				<?php 
					include("db/conintaspel.php");
					$querymar="SELECT ART, DESCU, PROV, COSTO, UNI, FACTOR, ALM1, ALM2, ALM3, EXIST, REQ, ORD, DISPO, MINIMO, COT, PED, REM, OLA, NECES, COMPRA, NEG, MIC, C_SUG FROM SEG_INV WHERE REQ > 0 OR MINIMO > 0";
					$resmar=sqlsrv_query($coninas,$querymar);
					if(!$resmar){
						echo "Error en la consulta: $querymar !!!";
						exit;
					}
					while($rowmar=sqlsrv_fetch_object($resmar)){
				 ?>
				<tr>
					<td><?php echo $rowmar->ART;  ?></td>
					<td><?php echo $rowmar->DESCU;  ?></td>
					<td><?php echo $rowmar->PROV;  ?></td>
					<td><?php echo $rowmar->COSTO;  ?></td>
					<td><?php echo $rowmar->UNI;  ?></td>
					<td><?php echo $rowmar->FACTOR;  ?></td>
					<td><?php echo $rowmar->ALM1;  ?></td>
					<td><?php echo $rowmar->ALM2;  ?></td>
					<td><?php echo $rowmar->ALM3;  ?></td>
					<td><?php echo $rowmar->EXIST;  ?></td>
					<td><?php echo $rowmar->REQ;  ?></td>
					<td><?php echo $rowmar->ORD;  ?></td>
					<td><?php echo $rowmar->DISPO;  ?></td>
					<td><?php echo $rowmar->MINIMO;  ?></td>
					<td><?php echo $rowmar->COT;  ?></td>
					<td><?php echo $rowmar->PED;  ?></td>
					<td><?php echo $rowmar->REM;  ?></td>
					<td><?php echo $rowmar->OLA;  ?></td>
					<td><?php echo $rowmar->NECES;  ?></td>
					<td><?php echo $rowmar->COMPRA;  ?></td>
					<td><?php echo $rowmar->NEG;  ?></td>
					<td><?php echo $rowmar->MIC;  ?></td>
					<td><?php echo $rowmar->C_SUG;  ?></td>
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
