function validarReserva(){
	var tipoPista = document.getElementById("tipoPista").value;
	var pista = document.getElementById("pista").value;
	var hora = document.getElementById("hora").value;
	var fecha = document.getElementById("datepicker").value;
	var errores = "";
	if(tipoPista == "0"){
		errores += "No ha seleccionado un tipo de deporte \n\n";
	}
	if(pista == "0"){
		errores += "No ha seleccionado una pista \n\n";
	}
	if(hora == "0"){
		errores += "No ha seleccionado una hora \n\n";
	}
	if(fecha == ""){
		errores +="No ha seleccionado una fecha \n\n";
	}
	
	if(errores != ""){
		alert(errores);
		return false;
	}
	return true;
}