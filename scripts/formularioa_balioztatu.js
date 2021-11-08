function formularioa_balioztatu(){
	izena = $("#izena").val();
	posta = $("#posta").val();
	iruzkina = $("#iruzkina").val();
	
	if(izena.length > 0){
		if(iruzkina.length > 0){
			if(posta.length > 0){
				if(!posta_balioztatu()){
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

function iruzkina_balioztatu(){
	iruzkina = $("#iruzkina").val();
	if(iruzkina.length > 0){
		document.getElementById("iruzkina").style.borderColor = "black";
	}else{
		document.getElementById("iruzkina").style.borderColor = "red";
	}
}

function izena_balioztatu(){
	izena = $("#izena").val();
	if(izena.length > 0){
		document.getElementById("izena").style.borderColor = "black";
	}else{
		document.getElementById("izena").style.borderColor = "red";
	}
}

function posta_balioztatu(){
	posta = $("#posta").val();
	index = posta.indexOf("@");
	if(index > 0 && posta.indexOf("@", index + 1) == -1){
		pointIndex = posta.lastIndexOf(".");
		if(pointIndex - 1 > index && posta.length - pointIndex > 2){
			document.getElementById("publikoa").style.display = 'inline-block';
			document.getElementById("lbl_publikoa").style.display = 'inline-block';
			document.getElementById("posta").style.borderColor = "green";
			return true;
		}
	}
	if(posta.length > 0){
		document.getElementById("publikoa").style.display = 'none';
		document.getElementById("lbl_publikoa").style.display = 'none';
		document.getElementById("posta").style.borderColor = "red";
		return false;
	}else{
		document.getElementById("posta").style.borderColor = "black";
		return true;
	}
}
