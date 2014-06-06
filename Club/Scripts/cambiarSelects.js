function cambiarPistas(){
	var tipoPista = document.getElementById("tipoPista").value;
	var pista_1 = new Array("Seleccione la pista","1");
	var pista_2 = new Array("Seleccione la pista","2","3"); 
	var pista_3 = new Array("Seleccione la pista","4","5");
	var pista_4 = new Array("Seleccione la pista","6","7");
	var pista_5 = new Array("Seleccione la pista","8","9");
	if(tipoPista!=0){
		pista = eval("pista_"+tipoPista);
		numPistas = pista.length;
		document.getElementById("pista").length = numPistas;
		for(i=0;i<numPistas;i++){
			document.getElementById("pista").options[i].value = pista[i];
			document.getElementById("pista").options[i].text = pista[i];
		}
	}else{
		document.getElementById("pista").length=1;
		document.getElementById("pista").options[i].value = "Seleccione una pista";
		document.getElementById("pista").options[i].text = "Seleccione una pista";
	}
	document.getElementById("pista").options[0].selected = true;
}

function cambiarHora(){
	var pista = document.getElementById("pista").value;
	var hora_1 = new Array("Seleccione una hora","10:00","12:00","14:00","16:00","18:00","20:00","22:00");
	var hora_2 = new Array("Seleccione una hora","10:30","12:30","14:30","16:30","18:30","20:30","22:30");
	var hora_3 = new Array("Seleccione una hora","10:30","12:30","14:30","16:30","18:30","20:30","22:30");
	var hora_4 = new Array("Seleccione una hora","11:00","13:00","15:00","17:00","19:00","21:00","23:00");
	var hora_5 = new Array("Seleccione una hora","11:00","13:00","15:00","17:00","19:00","21:00","23:00");
	var hora_6 = new Array("Seleccione una hora","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00");
	var hora_7 = new Array("Seleccione una hora","10:00","11:00","12:00","13:00","14:00","15:00","16:00","17:00","18:00","19:00","20:00","21:00","22:00","23:00");
	var hora_8 = new Array("Seleccione una hora","10:00","12:00","14:00","16:00","18:00","20:00","22:00");
	var hora_9 = new Array("Seleccione una hora","10:00","12:00","14:00","16:00","18:00","20:00","22:00");	
	if(pista!=0){
		hora = eval("hora_"+pista);
		numHoras = hora.length;
		document.getElementById("hora").length = numHoras;
		for(i=0;i<numHoras;i++){
			document.getElementById("hora").options[i].value = hora[i];
			document.getElementById("hora").options[i].text = hora[i];
		}
	}else{
		document.getElementById("hora").length=1;
		document.getElementById("hora").options[i].value = "Seleccione una hora";
		document.getElementById("hora").options[i].text = "Seleccione una hora";
	}
	document.getElementById("hora").options[0].selected = true;
}
