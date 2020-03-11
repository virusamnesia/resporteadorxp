

	<div class="row">
		<div class="col-sm-12">
			
			<table class="table table-hover table-condensed table-bordered">
				<tr>
					<td>DESCRIPCION</td>
					<td>PROVEEDORES</td>
					<td>PREPACK</td>
					<td>EXISTENCIA</td>
					<td>REQUISICIONES</td>
					<td>ORDENES</td>
					<td>DISPONIBLE</td>
					<td>MINIMO</td>
					<td>OLA</td>
					<td>NECESIDAD</td>
					<td>COMPRA</td>
					<td>NEGADOS</td>
					<td>COMPRA SUGERIDA</td>
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
					<td><?php echo $rowmar->DESCU;  ?></td>
					<td><?php echo $rowmar->PROV;  ?></td>
					<td><?php echo $rowmar->UNI;  ?></td>
					<td><?php echo $rowmar->EXIST;  ?></td>
					<td><?php echo $rowmar->REQ;  ?></td>
					<td><?php echo $rowmar->ORD;  ?></td>
					<td><?php echo $rowmar->DISPO;  ?></td>
					<td><?php echo $rowmar->MINIMO;  ?></td>
					<td><?php echo $rowmar->OLA;  ?></td>
					<td><?php echo $rowmar->NECES;  ?></td>
					<td><?php echo $rowmar->COMPRA;  ?></td>
					<td><?php echo $rowmar->NEG;  ?></td>
					<td><?php echo $rowmar->C_SUG;  ?></td>
				</tr>
				<?php }  ?>
			</table>
		</div>
	</div>
