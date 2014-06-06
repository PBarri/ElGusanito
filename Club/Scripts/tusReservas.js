// Lanzador del primer slideDown
$(document).ready(function() {
	$("#botonModificar1").click(function() {
		if($("#mod1").is(":hidden")) {
			$("#mod1").slideDown();
		} else {
			$("#mod1").slideUp();
		}
	});
});
// Lanzador del segundo slideDown
$(document).ready(function() {
	$("#botonModificar2").click(function() {
		if($("#mod2").is(":hidden")) {
			$("#mod2").slideDown();
		} else {
			$("#mod2").slideUp();
		}
	});
});
// Lanzador del tercer slideDown
$(document).ready(function() {
	$("#botonModificar3").click(function() {
		if($("#mod3").is(":hidden")) {
			$("#mod3").slideDown();
		} else {
			$("#mod3").slideUp();
		}
	});
});
// Lanzador del cuarto slideDown
$(document).ready(function() {
	$("#botonModificar4").click(function() {
		if($("#mod4").is(":hidden")) {
			$("#mod4").slideDown();
		} else {
			$("#mod4").slideUp();
		}
	});
});
// Lanzador del quinto slideDown
$(document).ready(function() {
	$("#botonModificar5").click(function() {
		if($("#mod5").is(":hidden")) {
			$("#mod5").slideDown();
		} else {
			$("#mod5").slideUp();
		}
	});
});
// Script para comprobar si quieres eliminar
function borrar() {
	return confirm("¿Está usted seguro de que quiere eliminar la reserva? \n Esta acción no podrá ser desecha");
}

// Script para comprobar si quieres modificar la primera reserva
function modificarUno() {
	var hora = document.getElementById("modHora1").value;
	var fecha = document.getElementById("fecha1").value;
	var mensaje = "";
	var errores = "";
	
	if(hora == "0"){
		errores += "No ha seleccionado una hora";
	}
	if(fecha == ""){
		errores += "No ha seleccionado una fecha";
		return false;
	}

	if(errores != "") {
		alert(errores);
		return false;
	} else {
		mensaje += "¿Está usted seguro de que quiere modificar la reserva? \n";
		mensaje += "Hora: " + hora + "\n";
		mensaje += "Fecha: " + fecha + "\n";

		return confirm(mensaje);
	}
}

// Script para comprobar si quieres modificar la segunda reserva
function modificarDos() {
	var hora = document.getElementById("modHora2").value;
	var fecha = document.getElementById("fecha2").value;
	var mensaje = "";
	var errores = "";
	
	if(hora == "0"){
		errores += "No ha seleccionado una hora";
	}
	if(fecha == ""){
		errores += "No ha seleccionado una fecha";
		return false;
	}

	if(errores != "") {
		alert(errores);
		return false;
	} else {
		mensaje += "¿Está usted seguro de que quiere modificar la reserva? \n";
		mensaje += "Hora: " + hora + "\n";
		mensaje += "Fecha: " + fecha + "\n";

		return confirm(mensaje);
	}
}

// Script para comprobar si quieres modificar la tercera reserva
function modificarTres() {
	var hora = document.getElementById("modHora3").value;
	var fecha = document.getElementById("fecha3").value;
	var mensaje = "";
	var errores = "";
	
	if(hora == "0"){
		errores += "No ha seleccionado una hora";
	}
	if(fecha == ""){
		errores += "No ha seleccionado una fecha";
		return false;
	}

	if(errores != "") {
		alert(errores);
		return false;
	} else {
		mensaje += "¿Está usted seguro de que quiere modificar la reserva? \n";
		mensaje += "Hora: " + hora + "\n";
		mensaje += "Fecha: " + fecha + "\n";

		return confirm(mensaje);
	}
}

// Script para comprobar si quieres modificar la cuarta reserva
function modificarCuatro() {
	var hora = document.getElementById("modHora4").value;
	var fecha = document.getElementById("fecha4").value;
	var mensaje = "";
	var errores = "";
	
	if(hora == "0"){
		errores += "No ha seleccionado una hora";
	}
	if(fecha == ""){
		errores += "No ha seleccionado una fecha";
		return false;
	}

	if(errores != "") {
		alert(errores);
		return false;
	} else {
		mensaje += "¿Está usted seguro de que quiere modificar la reserva? \n";
		mensaje += "Hora: " + hora + "\n";
		mensaje += "Fecha: " + fecha + "\n";

		return confirm(mensaje);
	}
}

// Script para comprobar si quieres modificar la quinta reserva
function modificarCinco() {
	var hora = document.getElementById("modHora5").value;
	var fecha = document.getElementById("fecha5").value;
	var mensaje = "";
	var errores = "";
	
	if(hora == "0"){
		errores += "No ha seleccionado una hora";
	}
	if(fecha == ""){
		errores += "No ha seleccionado una fecha";
		return false;
	}

	if(errores != "") {
		alert(errores);
		return false;
	} else {
		mensaje += "¿Está usted seguro de que quiere modificar la reserva? \n";
		mensaje += "Hora: " + hora + "\n";
		mensaje += "Fecha: " + fecha + "\n";

		return confirm(mensaje);
	}
}