$(function()
{
	$('#button_Kontakt').on('click', function()
	{			
		if (gdzie !== 'kontakt')
		{
			gdzie = 'kontakt';
			
			$('#middle').empty();
			$('#middle').append("<div id='content_Kontakt'><div id='picture' style='overflow:both; position:absolute;'></div><div id='content_Kontakt_right'></div></div>");
			
			$('#rodzaj_samochodow').empty();
			$('#wybrany_oddzial').empty();

			$('#content_Kontakt_right').css({ 'background':'#BEB', 'height':'430px', 'minwidth':'600px' });
			
			$.ajax({
				type : 'get',
				url : './ActionsDB_Klient.php',
				data :
				{
					rodzaj : 'oddzialy_kontakt'
				},
				success : function(response)
				{		
					var response_array = response.split("|");
					var response_array_length = response_array.length-1;
	
					table = document.createElement("table");
					table.style.margin = "10px 30px 0 50px";
					table.style.font = "bold italic 13px Arial";
					
					for (i=0; i<response_array_length;)
					{
						tr = document.createElement("tr");
						
						for (j=0; j<5; j++)
						{								
							td = document.createElement("td");
							td.style.padding = "10px 20px 0 0";
							
							if (j === 3)		td.innerHTML = "tel.: "+response_array[i++];
							else if (j === 4)	td.innerHTML = "e-mail: "+response_array[i++];
							else				td.innerHTML = response_array[i++];
							
							td.style.color = "#707070";
							tr.appendChild(td);
						}
												
						$(tr).hide().appendTo(table).fadeIn(300);	   
					}
					
					$('#content_Kontakt_right').append(table);
				}
			});
			
		}
		return false;
	});
});

