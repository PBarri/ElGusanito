function esEmail() {

	var email1 = document.getElementById("correo").value;
	var regExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;

	if(regExp.test(email1) == false) {
		document.getElementById("correo").className = "error";
		alert("El correo no es correcto,por favor revíselo");
	} else {
		document.getElementById("correo").className = "exito";
	}
}

function Persona() {
	var persona = document.getElementById("persona").value;

	if(persona == "" || !isNaN(persona)) {
		document.getElementById("persona").className = "error";
		alert("El nombre y apellido no es correcto,por favor revíselo");
	} else {
		document.getElementById("persona").className = "exito";
	}
}

function Asunto() {
	var asunto = document.getElementById("asunto").value;

	if(asunto == "") {
		document.getElementById("asunto").className = "error";
		alert("El asunto esta vacio,por favor revíselo");
	} else {
		document.getElementById("asunto").className = "exito";
	}
}

function Mensaje() {
	var mensaje = document.getElementById("mensaje").value;

	if(mensaje == "") {
		document.getElementById("mensaje").className = "error";
		alert("El mensaje esta vacio,por favor revíselo");
	} else {
		document.getElementById("mensaje").className = "exito";
	}
}

function Validar() {
	var email1 = document.getElementById("correo").value;
	var regExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	var regExp2 = /^[\D]+$/;
	var mensaje = document.getElementById("mensaje").value;
	var persona = document.getElementById("persona").value;
	var asunto = document.getElementById("asunto").value;
	var error = 0;

	if(mensaje == "" || persona == "" || regExp2.test(persona)==false || asunto == "") {
		error = 1;
	}
	if(email1 == "" || regExp.test(email1) == false) {
		error = 1;
	}
	if(error != 0) {
		alert("El formulario de registro contiene errores. Reviselo por favor");
		return false;
	}
	return true;
}