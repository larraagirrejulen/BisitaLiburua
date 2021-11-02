function formularioa_balioztatu(){
	formulario_colorea_eguneratu();
	izena = $("#izena").val();
	posta = $("#posta").val();
	iruzkina = $("#iruzkina").val();
	if(izena.length > 0){
		if(iruzkina.length > 0){
			if(posta.length > 0){
				if(!posta_balioztatu(posta)){
					document.getElementById("posta").style.borderColor = "red";
					alert("Posta desegokia!");
				}else{
					return true;
				}
			}else{
				return true;
			}
		}else{
			document.getElementById("iruzkina").style.borderColor = "red";
			alert("Sartu nahi duzun iruzkina adierazi behar duzu!");
		}
	}else{
		document.getElementById("izena").style.borderColor = "red";
		alert("Zure izena adierazi behar duzu!");
	}
	return false;
}

function posta_balioztatu(posta){
	index = posta.indexOf("@");
	if(index > 0 && posta.indexOf("@", index + 1) == -1){
		pointIndex = posta.lastIndexOf(".");
		if(pointIndex - 1 > index && posta.length - pointIndex > 2){
			return true;
		}
	}
	return false;
}

function formulario_colorea_eguneratu(){
	document.getElementById("iruzkina").style.borderColor = "black";
	document.getElementById("izena").style.borderColor = "black";
	document.getElementById("posta").style.borderColor = "black";
}