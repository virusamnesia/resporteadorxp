


function agregardatos(nombre, apellido, email, telefono){

	cadena="nombre="+ nombre+"&apellido=" + apellido + "&email=" + email + "&telefono=" + telefono;

	$.ajax({
		type:"POST",
		url: "php/agragarDatos.php",
		data:cadena,
		success:function(r){
			if(r==1){
				alertify.success("Agregado con Exito :)");
			}
			else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});
}

function cargatabla(version, proveedor, uni, pu){

	cadena="version="+ version +
			"&proveedor=" + proveedor + 
			"&uni=" + uni + 
			"&pu=" + pu;

	$.ajax({
		type:"POST",
		url: "tablaseguimiento2.php",
		data:cadena,
		success:function(r){
			if(r==1){
				$('#tabla').load('tablaseguimiento2.php');
				alertify.success("Agregado con Exito :)");
			}
			else{
				alertify.error("Fallo el php :(");
			}
		}
		
	});
}

//Función para cargar la lectura de los datos al modal Editor de Stock Minimo
function stockmin(art,min,fac){
	$('#producto').val(art);
	$('#stock_min').val(min);
	$('#fact').val(fac);
}

//Función hacer la actualización de Stock Minimo de un producto
function up_stockmin(){
	art=$('#producto').val();
	min=$('#stock_min').val();
	fac=$('#fact').val();
	cadena="art="+ art+"&min=" + min+"&fac=" + fac;

	$.ajax({
		type:"POST",
		url: "Procedimientos/upmin.php",
		data:cadena,
		success:function(r){
			if(r=="Resource id #6"){
				alertify.success("Modificado con Exito !!");
			}
			else{
				alertify.error("Modificación no exitosa!! "+r);
			}
		}
	});

}


//Función para cargar la lectura de los datos al modal Editor de Estatus de Compra
function statuscomp(art,uni,sta){
	$('#prodpu').val(art);
	$('#produni').val(uni);
	$('#stacom').val(sta);
}

//Función hacer la actualización de Estatus de Compra de un producto
function up_statuscomp(){
	art=$('#producto').val();
	min=$('#stock_min').val();
	fac=$('#fact').val();
	cadena="art="+ art+"&min=" + min+"&fac=" + fac;

	$.ajax({
		type:"POST",
		url: "Procedimientos/suspart.php",
		data:cadena,
		success:function(r){
			if(r=="Resource id #6"){
				alertify.success("Modificado con Exito !!");
			}
			else{
				alertify.error("Modificación no exitosa!! "+r);
			}
		}
	});

}