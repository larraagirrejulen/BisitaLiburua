function show_checkbox(){
	posta = $("#posta").val();
	if(posta.length > 0){
		document.getElementById("publikoa").style.display = 'block';
		document.getElementById("lbl_publikoa").style.display = 'block';
	}else{
		document.getElementById("publikoa").style.display = 'none';
		document.getElementById("lbl_publikoa").style.display = 'none';
	}
}