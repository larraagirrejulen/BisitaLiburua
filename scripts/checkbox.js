function showCheckbox(){
	posta = $("#posta").val();
	if(posta.length > 0){
		document.getElementById("posta").disabled = false;
	}else{
		document.getElementById("posta").disabled = true;
	}
}

console.log($("#posta"))

$("#posta").addEventListenner("change", showCheckbox());