function f_button_Wykaz_samochodow()
{	        
	if (gdzie !== 'Wykaz_rodzajow_samochodow')
	{			
		$('#middle').empty();
		$('#rodzaj_samochodow').empty();
		$('#wybrany_oddzial').empty();
		
		$('#content_rodzaje1_right').css({ 'height':'189px', 'width':'400px' });

		numer_rodzaju_samochodu = '';
		nazwa_oddzialu = '';
		wybrany_oddzial_id = '';
		
		/* if (gdzie == 'listaSamochodow') { */
		$('#content_Nasza_wypozyczalnia').remove();
	
		$('#middle')
			.append("<div id='content_rodzaje1'>" +
						"<div id='picture'></div>" +
						"<div id='content_rodzaje1_right'>" +
							"<div id='content_rodzaje1_right_samochody'>" +
								"<div id='content_rodzaje1_right_samochody1' class='content_rodzaje1_right_samochody_button'>Osobowe</div>" +
								"<div id='content_rodzaje1_right_samochody2' class='content_rodzaje1_right_samochody_button'>Osobowe kombi</div>" +
								"<div id='content_rodzaje1_right_samochody3' class='content_rodzaje1_right_samochody_button'>Dostawcze</div>" +
							"</div>" +								
						"</div>" +
					"</div>");

		/* } */
		
		gdzie = 'Wykaz_rodzajow_samochodow';		
		
		/*$("#content_rodzaje2").remove(); */
		
		$.ajax({
			type : 'get',
			url : './ActionsDB_Klient.php',
			data : {
				rodzaj : 'oddzialy'
			}, 
			success : function(response)
			{
				var response_array = response.split("|");
				var response_array_length = response_array.length/2-0.5;
		
				$('#middle')
					.append("<div id='content_rodzaje2'>" +
								"<div id='content_rodzaje2_outer'>" +
									"<div id='content_rodzaje2_inner'></div>" +											
								"</div>" +					
							"</div>");

				for (i=0; i<response_array_length; i++)
				{
					$("#content_rodzaje2_inner")
						.append("<div id='wybrany_oddzial_ID_" + response_array[i*2] + "' class='content_rodzaje2_oddzial'>" + response_array[i*2+1] + "</div>");						
				}
			}	
		});		
	}
	return false;
}





	
	
	
	
	
	
	
	
	
	
$(function()
{
	$('#button_Wykaz_samochodow').on('click', function()
	{
		f_button_Wykaz_samochodow();
	});
});

		
		
