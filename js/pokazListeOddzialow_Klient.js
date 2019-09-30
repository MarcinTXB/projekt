$(function()
{
	$("#button_Wykaz_samochodow").on("mouseover", function()
	{
		$.ajax({
			type : 'get',
			url : './ActionsDB_Klient.php',
/*			data : {
				menu : 'oddzialy'
			}, */ 
			success : function(menu) {		
				
				var response = menu.split("|");
				var responselength = response.length-1;
		
				for (i=0; i<responselength; i++) {
					
					content2_oddzial.innerHTML = response[i];
					$("#content2").append('<li id="' + i + 1 + '" class="content2_oddzial">' + response[i] + '</li>');
				}
			}	
		});
	});
	
});




