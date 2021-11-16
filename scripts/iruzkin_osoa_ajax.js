function iruzkinOsoa(identifikadorea){

    var dest = "../php/iruzkin_osoa.php";

		$.ajax({
			url: dest,
			data: {"id": identifikadorea},
			type: "POST",
			success: function(data){
        if($('#'+identifikadorea).html().length > 20){
          $('#'+identifikadorea).html(data.substring(0,17)+"...");
        }else{
          $('#'+identifikadorea).html(data);
        }

			}
		})
}
