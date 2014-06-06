function login(){
	
	var usuario = document.getElementById("usuario").value;
	var pass = document.getElementById("password").value;
	
	if(usuario=="" || isNaN(usuario) || pass==""){
		return false;
	}else{
		return true;
	}
}
