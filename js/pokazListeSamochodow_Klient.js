function pokazListeSamochodow(wybrany_rodzaj_samochodu, wybrany_oddzial_id)
{ 
	gdzie = 'listaSamochodow';
		
	$.ajax({
		type : 'get',
		url : './ActionsDB_Klient.php',
		data :
		{
			wybrany_rodzaj_samochodu : wybrany_rodzaj_samochodu,                            
			wybrany_oddzial_id : wybrany_oddzial_id
		},
		success : function(response)
		{
			var response_array = response.split("|");
			var response_array_length = response_array.length-1;            
			var response_array_length_linie = (response_array.length-1)/15;
			var response_array_rest = (response_array_length % 15)/5;
			var count = 0;
			var column;

			$('#content_rodzaje1').remove();
			$('#content_rodzaje2').remove();
											
			$('#middle').append("<div id='content_lista_samochodow'></div>");
			
			for (i=1; i<=response_array_length_linie; i++)
			{				
				var nextLiniaWithCells = $("<div id='linia"+i+"' class='linia_samochod'>" +									
												"<div class='samochod_lista_column' id='wybrany_samochod_ID_" + response_array[count++] + "'><div class='samochod_lista_column_nazwa'>" +
													response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++]+'cm3' +
												"</div></div>" +									
												"<div class='samochod_lista_column' id='wybrany_samochod_ID_" + response_array[count++] + "'><div class='samochod_lista_column_nazwa'>" +
													response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++]+'cm3' +
												"</div></div>" +									
												"<div class='samochod_lista_column' id='wybrany_samochod_ID_" + response_array[count++] + "'><div class='samochod_lista_column_nazwa'>" +
													response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++] + ' ' + response_array[count++]+'cm3' +
												"</div></div>" +
											"</div>");
				$('#content_lista_samochodow').append(nextLiniaWithCells);
			}
			
			if (response_array_rest > 0)
			{				
				var nextLinia = $("<div id='linia"+i+"' class='linia_samochod'></div>");

				var nextCell1 = $("<div id='wybrany_samochod_ID_" + response_array[count++] + "' class='samochod_lista_column'><div class='samochod_lista_column_nazwa'>" +
									response_array[count++] + " " + response_array[count++] + " " + response_array[count++] + " " + response_array[count++] + "</div></div>");
									
				$(nextLinia).append(nextCell1);
							
				if (response_array_rest === 2)
				{			
					var nextCell2 = $("<div id='wybrany_samochod_ID_" + response_array[count++] + "' class='samochod_lista_column'><div class='samochod_lista_column_nazwa'>" +
										response_array[count++] + " " + response_array[count++] + " " + response_array[count++] + " " + response_array[count++] + "</div></div>");

					$(nextLinia).append(nextCell2);					
				}	
					
				$('#content_lista_samochodow').append(nextLinia);
			}			
		}
	});

	$('#bottom2').append("<div id='pokaz_liste_opis'>" + rodzaj + " dostępne w oddziale " + nazwa_oddzialu + "</div>");

	$('#bottom2').append("<div id='pokaz_liste_powrot'>Powrót</div>");

};


$(function()
{
	$('#middle').on('click', '.content_rodzaje1_right_samochody_button', function()
	{
		numer_rodzaju_samochodu = this.id;

		$('#rodzaj_samochodow').empty();
		
		if (numer_rodzaju_samochodu === 'content_rodzaje1_right_samochody1')
		{			
			wybrany_rodzaj_samochodu = 'osobowy';			
			rodzaj = 'Samochody osobowe';
		}
		else if (numer_rodzaju_samochodu === 'content_rodzaje1_right_samochody2')
		{		
			wybrany_rodzaj_samochodu = 'kombi';			
			rodzaj = 'Samochody kombi';
		}
		else if (numer_rodzaju_samochodu === 'content_rodzaje1_right_samochody3')
		{
			wybrany_rodzaj_samochodu = 'dostawczy';			
			rodzaj = 'Samochody dostawcze';
		}		
		
		$('#rodzaj_samochodow').append("<div>" + rodzaj + "</div>");		

		if ((wybrany_oddzial_id != '') && (gdzie != 'listaSamochodow'))
		{
			pokazListeSamochodow(wybrany_rodzaj_samochodu, wybrany_oddzial_id);
		}
	});

	$('#middle').on('click', '.content_rodzaje2_oddzial', function()
	{
		nazwa_oddzialu = this.innerHTML;
		wybrany_oddzial_id = this.id.replace("wybrany_oddzial_ID_", "");

		//		document.cookie = "wybrany_oddzial_id="+wybrany_oddzial_id;

		$('#wybrany_oddzial').empty();
		$('#wybrany_oddzial').append("<div>Oddział " + nazwa_oddzialu + "</div>");
			
		if ((numer_rodzaju_samochodu != '') && (gdzie != 'listaSamochodow'))
		{
			pokazListeSamochodow(wybrany_rodzaj_samochodu, wybrany_oddzial_id);
		}
	});
});




