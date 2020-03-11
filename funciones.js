


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

