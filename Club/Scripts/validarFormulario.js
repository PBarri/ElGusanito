function funcionUsuario(){
	
	var usuario = document.getElementById("usuario").value;
	
	if(usuario == ""){
		document.getElementById("usuario").className="error";
	}else{
		document.getElementById("usuario").className="exito";
	}
}

function funcionDNI(){
	
	var dni = document.getElementById("dni").value;
	
	if(isNaN(dni)){
		document.getElementById("dni").className="error";
	}else{
		document.getElementById("dni").className="exito";
	}	
}
function letraDNI(){
	
	var dni = document.getElementById("dni").value;
	var letra = document.getElementById("letra").value;
	var tabla = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
	var modulo = dni%23;
	
	if(letra!=tabla[modulo]){
		document.getElementById("dni").className="error";
		document.getElementById("letra").className="error";
	}else{
		document.getElementById("dni").className="exito";
		document.getElementById("letra").className="exito";
	}	
}

function esEmail(){
	
	var email1 = document.getElementById("email").value;
	var regExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	
	if(regExp.test(email1)==false){
		document.getElementById("email").className="error";
	}else{
		document.getElementById("email").className="exito";
	}
}

function email(){
	
	var email1 = document.getElementById("email").value;
	var email2 = document.getElementById("email2").value;
	var regExp = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	
	if(regExp.test(email2)==true){
		if(email1 != email2){
			document.getElementById("email2").className="error";			
		}else{
			document.getElementById("email").className="exito";
			document.getElementById("email2").className="exito";
		}
	}else{
		document.getElementById("email2").className="error";
	}
	
	if(email1==email2){
		document.getElementById("email").className="exito";
		document.getElementById("email2").className="exito";
	}else{
		document.getElementById("email2").className="error";
	}
}

function password(){
	
	var pass1 = document.getElementById("pass").value;
	var pass2 = document.getElementById("pass2").value;
	
	if(pass1!=pass2){
		document.getElementById("pass2").className="error";
	}else{
		document.getElementById("pass").className="exito";
		document.getElementById("pass2").className="exito";
	}
}

function validar(){
	
	var usuario = document.getElementById("nombreUsuario").value;
	var dni = document.getElementById("dni").value;
	var letra = document.getElementById("letra").value;
	var tabla = ["T","R","W","A","G","M","Y","F","P","D","X","B","N","J","Z","S","Q","V","H","L","C","K","E"];
	var modulo = dni%23;
	var nombre = document.getElementById("nombre").value;
	var apellido1 = document.getElementById("apellido1").value;
	var apellido2 = document.getElementById("apellido2").value;
	var email1 = document.getElementById("email1").value;
	var email2 = document.getElementById("email2").value;
	var pass1 = document.getElementById("pass").value;
	var pass2 = document.getElementById("pass2").value;
	
	var expresionMail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
	
	var errores = "";
	
	if(usuario == ""){
		errores += "El nombre de usuario no es correcto\n";
	}	
	if(dni == "" || letra == "" || letra.toUpperCase() != tabla[modulo]){
		errores += "El DNI no es correcto\n";
	}
	if(nombre == ""){
		errores += "El nombre no es correcto\n";
	}
	if(apellido1 == ""){
		errores += "El primer apellido no es correcto\n";
	}
	if(apellido2 == ""){
		errores += "El segundo apellido no es correcto\n";
	}
	if(email1 == "" || expresionMail.test(email1) == false ){
		errores += "El email no es correcto\n";
	}
	if(email1 != email2){
		errores += "Los correos no son iguales\n";
	}
	if(pass1 == ""){
		errores += "La contraseña no es correcta\n";
	}
	if(pass1 != pass2){
		errores += "Las contraseñas no coinciden\n";
	}
	
	if(errores != ""){
		alert(errores);
		return false;
	}else{
		return true;
	}
}