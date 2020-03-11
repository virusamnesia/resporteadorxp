<?php 
	//$ver=$_POST['version'];
	$prov=$_POST['proveedor'];
	$art=$_POST['art'];
	$desc=$_POST['desc'];
	$ccost=$_POST['cost'];
	$cfact=$_POST['fact'];
	$calm1=$_POST['alm1'];
	$calm2=$_POST['alm2'];
	$calm3=$_POST['alm3'];
	$cexis=$_POST['exis'];
	$creq=$_POST['req'];
	$cord=$_POST['ord'];
	$cdisp=$_POST['disp'];
	$cmin=$_POST['min'];
	$ccot=$_POST['cot'];
	$cped=$_POST['ped'];
	$crem=$_POST['rem'];
	$cola=$_POST['ola'];
	$cnec=$_POST['nec'];
	$ccom=$_POST['com'];
	$cneg=$_POST['neg'];
	$cminc=$_POST['minc'];
	$csug=$_POST['sug'];
	if (($prov<>"") OR ($art<>"") OR ($desc<>"")){
		$condicion=" ";
		if ($prov<>"0"){
			$condicion=$condicion."AND PROV LIKE '%".$prov."%' ";
		}
		if ($art<>"0"){
			$condicion=$condicion."AND ART LIKE '%".$art."%' ";
		}
		if ($desc<>"0"){
			$condicion=$condicion."AND DESCU LIKE '%".$desc."%' ";
		}
	}
	else{
		$condicion="";
	}
 ?>

	<div class="row">
		<div class="col-sm-12">
			
			<table class="table table-hover table-condensed table-bordered " id="tablasegload">
				<caption>
					<button class="btn btn-primary" data-toggle="modal" data-target="#filtros">
						Filtros 
						<span class="glyphicon glyphicon-search"></span>
					</button>
					<button class="btn btn-primary" data-toggle="modal" data-target="#selector">
						Seleccionar Campos
						<span class="glyphicon glyphicon-th"></span>
					</button>
				</caption>
				<thead>
					<tr>
						<?php 
						echo " <td width='95px'  bgcolor='#DCF2F4'>ARTICULO</td>";
						echo " <td width='130px'  bgcolor='#DCF2F4'>DESCRIPCION</td>";
						echo " <td width='140px'  bgcolor='#DCF2F4'>PROVEEDORES</td>";
						if($ccost=="true"){echo " <td width='70px'  bgcolor='#DCF2F4'>COSTO</td>";}
						echo " <td width='95px'  bgcolor='#DCF2F4'>PREPACK</td>";
						if($cfact=="true"){echo " <td width='70px'  bgcolor='#DCF2F4'>FACTOR</td>";}
						if($calm1=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>ALMACEN 1</td>";}
						if($calm2=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>ALMACEN 2</td>";}
						if($calm3=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>ALMACEN 3</td>";}
						if($cexis=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>EXISTENCIA</td>";}
						if($creq=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>REQUISICIONES</td>";}
						if($cord=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>ORDENES</td>";}
						if($cdisp=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>DISPONIBLE</td>";}
						if($cmin=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>MINIMO</td>";}
						if($ccot=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>COTIZACIONES</td>";}
						if($cped=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>PEDIDOS</td>";}
						if($crem=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>REMISIONES</td>";}
						if($cola=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>OLA</td>";}
						if($cnec=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>NECESIDAD</td>";}
						if($ccom=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>COMPRA</td>";}
						if($cneg=="true"){echo " <td width='100px'  bgcolor='#DCF2F4'>NEGADOS</td>";}
						if($cminc=="true"){echo "<td bgcolor='#DCF2F4'>MINIMO COMPRA</td>";}
						if($csug=="true"){echo "<td bgcolor='#DCF2F4'>COMPRA SIGUERIDA</td>";}
						$regs=0;
						$sumexist=0;
						$sumreq=0;
						$sumord=0;
						$sumdisp=0;
						$sumcot=0;
						$sumped=0;
						$sumrem=0;
						$sumneg=0;
						$sumsug=0;
						 ?>
					</tr>
				</thead>
				<tbody>
				<?php 
					include("db/conintaspel_2.php");
					$querymar="SELECT ART, DESCU, PROV, COSTO, UNI, FACTOR, ALM1, ALM2, ALM3, EXIST, REQ, ORD, DISPO, MINIMO, COT, PED, REM, OLA, NECES, COMPRA, NEG, MIC, C_SUG FROM SEG_INV WHERE (COT > 0 OR MINIMO > 0)".$condicion." ORDER BY ART";
					$resmar=sqlsrv_query($coninas,$querymar);
					if(!$resmar){
						echo "Error en la consulta: $querymar !!!";
						exit;
					}
					while($rowmar=sqlsrv_fetch_object($resmar)){
				 ?>
				 
				<tr>
					<?php 
					echo "<td width='95px'> $rowmar->ART </td>";
					echo "<td width='130px'> $rowmar->DESCU </td>"; $regs=$regs+1;
					echo "<td width='140px'> $rowmar->PROV</td>";
					if($ccost=="true"){echo "<td width='70px'> ".ROUND($rowmar->COSTO,2)." </td>";}
					echo "<td width='95px'> $rowmar->UNI </td>";
					if($cfact=="true"){echo "<td width='70px'> $rowmar->FACTOR </td>";}
					if($calm1=="true"){echo "<td width='100px'> ".ROUND($rowmar->ALM1,2)." </td>";}
					if($calm2=="true"){echo "<td width='100px'> ".ROUND($rowmar->ALM2,2)." </td>";}
					if($calm3=="true"){echo "<td width='100px'> ".ROUND($rowmar->ALM3,2)." </td>";}
					if($cexis=="true"){echo "<td width='100px'> ".ROUND($rowmar->EXIST,2)." </td>"; $sumexist=$sumexist+$rowmar->EXIST;}
					if($creq=="true"){echo "<td width='100px'> ".ROUND($rowmar->REQ,2)." </td>"; $sumreq=$sumreq+$rowmar->REQ;}
					if($cord=="true"){echo "<td width='100px'> ".ROUND($rowmar->ORD,2)." </td>"; $sumord=$sumord+$rowmar->ORD;}
					if($cdisp=="true"){echo "<td width='100px'> ".ROUND($rowmar->DISPO,2)." </td>"; $sumdisp=$sumdisp+$rowmar->DISPO;}
					if($cmin=="true"){echo "<td width='100px'> ".ROUND($rowmar->MINIMO,2)." </td>";}
					if($ccot=="true"){echo "<td width='100px'> ".ROUND($rowmar->COT,2)." </td>"; $sumcot=$sumcot+$rowmar->COT;}
					if($cped=="true"){echo "<td width='100px'> ".ROUND($rowmar->PED,2)." </td>"; $sumped=$sumped+$rowmar->PED;}
					if($crem=="true"){echo "<td width='100px'> ".ROUND($rowmar->REM,2)." </td>"; $sumrem=$sumrem+$rowmar->REM;}
					if($cola=="true"){echo "<td width='100px'> ".ROUND($rowmar->OLA,2)." </td>";}
					if($cnec=="true"){echo "<td width='100px'> ".ROUND($rowmar->NECES,2)." </td>";}
					if($ccom=="true"){echo "<td width='100px'> ".ROUND($rowmar->COMPRA,2)." </td>";}
					if($cneg=="true"){echo "<td width='100px'> ".ROUND($rowmar->NEG,2)." </td>"; $sumneg=$sumneg+$rowmar->NEG;}
					if($cminc=="true"){echo "<td width='100px'> ".ROUND($rowmar->MIC,2)." </td>";}
					if($csug=="true"){echo "<td width='100px'> ".ROUND($rowmar->C_SUG,2)." </td>"; $sumsug=$sumsug+$rowmar->C_SUG;}
					 ?>
					<!--
					<td>
						<button class="btn btn-warning glyphicon glyphicon-pencil" data-toggle="modal" data-target="#modalEdicion"></button>
					</td>
					<td>
						<button class="btn btn-danger glyphicon glyphicon-remove"></button>
					</td>
				-->
				</tr>

				<?php } ?>
				<tfoot>
				<tr>
					<?php 
					echo " <td width='95px'  bgcolor='#94DCE3'> TOTALES </td>";
					echo " <td width='130px'  bgcolor='#94DCE3'> ".ROUND($regs,2)." </td>";
					echo " <td width='140px'  bgcolor='#94DCE3'> </td>";
					if($ccost=="true"){echo " <td width='70px'  bgcolor='#94DCE3'></td>";}
					echo " <td width='95px'  bgcolor='#94DCE3'> </td>";
					if($cfact=="true"){echo " <td width='70px'  bgcolor='#94DCE3'> </td>";}
					if($calm1=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> </td>";}
					if($calm2=="true"){echo " <td width='100px'  bgcolor='#94DCE3'></td>";}
					if($calm3=="true"){echo " <td width='100px'  bgcolor='#94DCE3'></td>";}
					if($cexis=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumexist,2)." </td>";}
					if($creq=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumreq,2)." </td>";}
					if($cord=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumord,2)." </td>";}
					if($cdisp=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumdisp,2)."</td>";}
					if($cmin=="true"){echo " <td width='100px'  bgcolor='#94DCE3'>  </td>";}
					if($ccot=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumcot,2)." </td>";}
					if($cped=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumped,2)." </td>";}
					if($crem=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumrem,2)." </td>";}
					if($cola=="true"){echo " <td width='100px'  bgcolor='#94DCE3'>  </td>";}
					if($cnec=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> </td>";}
					if($ccom=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> </td>";}
					if($cneg=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumneg,2)." </td>";}
					if($cminc=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> </td>";}
					if($csug=="true"){echo " <td width='100px'  bgcolor='#94DCE3'> ".ROUND($sumsug,2)." </td>";}
					 ?>
				</tr>
				</tfoot>
				</tbody>
			</table>
		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function() {
	    $('#tablasegload').DataTable();
	} );
</script>