function formularioa_balioztatu(){
	izena = $("#izena").val();
	posta = $("#posta").val();
	iruzkina = $("#iruzkina").val();
	if(izena.length > 0 && iruzkina.length > 0){
		if(posta.length > 0){
			if(!posta_balioztatu(posta)){
				alert("Posta desegokia!");
			}else{
				return true;
			}
		}else{
			return true;
		}
	}else{
		alert("Derrigorrezko parametroak bete behar dituzu!");
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