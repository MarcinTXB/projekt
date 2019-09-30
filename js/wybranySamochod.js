function f_wybrany_samochod(wybrany_samochod_id)
{

	gdzie = 'wybranySamochod';
	
	$('#content_lista_samochodow').remove();
	$('#pokaz_liste_opis').remove();
	$('#bottom2').empty();
	
	$('#middle').append("<div id='content_wybrany'></div>");
        
	$.ajax({
		type : 'get',
		url : './ActionsDB_Klient.php',
		data :
		{
			rodzaj : 'wybrany_samochod_dane',		
            wybrany_samochod_id : wybrany_samochod_id
		},
		success : function(response)
		{	
            var response_array = response.split("|");
			var response_array_length = response_array.length-1;


			$('#content_wybrany')
				.append("<div id='content_wybrany1' style='margin:50px 0 0 80px; background:url(./pictures/Mitsubishi.png) no-repeat 3px 3px; height:186px; width:291px; overflow:both; position:absolute;'></div>" +
						"<div id='content_wybrany2_1' style='margin:84px 0 0 535px; position:absolute; color:#444; font:bold italic 14px Arial; width:400px'></div>" +
						"<div id='content_wybrany2_2' style='margin:102px 0 0 535px; position:absolute; color:#444; font:bold italic 14px Arial; width:400px'></div>");						
                        
			for (i=0; i<response_array_length; i++)
			{			            
		        if (i === 5 || i===6)	$('#content_wybrany2_2').append("<div class='content_wybrany2_2_item'>" + response_array[i] + "</div>");				
				else
				{
					if (i === 3)		content = response_array[i]+"cm3";
					else if (i === 4)	content = response_array[i]+"KM";
					else				content = response_array[i];
										
					$('#content_wybrany2_1').append("<div class='content_wybrany2_1_item'>" + content + "</div>");
				}
			}
										   
            $("<div id='wybranySamochod_button_powrot' style='margin:165px 0 0 505px; position:absolute; height:30px; width:180px; display:block;'>Powrót</div>").hide().appendTo("#content_wybrany").fadeIn(1000);
			$("<div id='wybranySamochod_button' style='margin:165px 0 0 705px; position:absolute; height:30px; width:180px; display:block;'>Rezerwuję</div>").hide().appendTo("#content_wybrany").fadeIn(1000);
        }
	});
						  
	date			= new Date();
	actualDay		= date.getDate();
	actualMonth		= date.getMonth() + 1;
	nextMonth		= date.getMonth() + 2;
	nextNextMonth	= date.getMonth() + 3;                                
	actualYear		= date.getFullYear(); 
	lastDay_caly	= new Date(date.getFullYear(), date.getMonth() + 1, 0);
	
	lastDay					= lastDay_caly.getDate();
	daysInThisMonthLeft		= (lastDay-actualDay);
	lastDayNextMonth_caly	= new Date(date.getFullYear(), date.getMonth() + 2, 0);
	lastDayNextMonth		= lastDayNextMonth_caly.getDate();
					
	ile_miesiecy_od = 1;
	
	if (daysInThisMonthLeft < 30)
	{
		daysNextMonthNeeded = (30-daysInThisMonthLeft);
		ile_miesiecy_od = 2;                                        
		if ((daysInThisMonthLeft+lastDayNextMonth) < 30)
		{				
			daysNextNextMonthNeeded = 30 - (daysInThisMonthLeft + lastDayNextMonth);
			ile_miesiecy_od = 3;
		}                                
	}
                  
	$.ajax({       
		type : 'get',
		url : './ActionsDB_Klient.php',
		data :
		{
			rodzaj : 'wybrany_samochod_rezerwacje',
			wybrany_samochod_id : wybrany_samochod_id
		},      
		success : function(response)
		{				
			response_array = response.split("|");
			response_array_length = response_array.length-1;
			
			response_array.sort();
			
			//alert(response_array);


			/*
			data_rezerwacji = new Array();
			
			for(i=0;i<response_array_length;i++)
			{			
				rok			= response_array[i].substring(0,4);
				miesiac		= response_array[i].substring(5,7);
				dzien		= response_array[i].substring(8,10);

				data_rezerwacji[i] = {
										"rok"		: rok,
										"miesiac"	: miesiac,
										"dzien"		: dzien }
										
				alert(data_rezerwacji[i].rok + " " + data_rezerwacji[i].miesiac + " " + data_rezerwacji[i].dzien);
				

			}
				
			alert('End');
			
			data_rezerwacji.sort(function(a, b)
			{
				return a.miesiac-b.miesiac
			});

			for(i=0;i<response_array_length;i++)
			{
				alert(data_rezerwacji[i].rok + " " + data_rezerwacji[i].miesiac + " " + data_rezerwacji[i].dzien);
			}
			
			*/



			$('#content_wybrany')
				.append("<div style='background:#458967; margin:360px 0 0 35px; height:20px; width:64px; position:absolute;'></div>" +
						"<div id='content_wybrany4' style='margin:360px 0 0 100px; width:1000px; position:absolute;'></div>");
			
			
			/*
			if (nextMonth     < 10)	{ nextMonth     = '0' + nextMonth; }
			if (nextNextMonth < 10)	{ nextNextMonth = '0' + nextNextMonth; } */
			
			
				
				
				
			
			if (actualMonth   < 10)		{ actualMonth   = '0' + actualMonth; }
			j = -1;
			

			for (i=actualDay; i<=lastDay; i++)
			{					
				actualDay_plus_j = actualDay + (++j);				
				actualDay_plus_j < 10 ?	(actualDay_plus_j_with_0 = '0' + actualDay_plus_j) : (actualDay_plus_j_with_0 = actualDay_plus_j);
				data_array = [actualYear, actualMonth, actualDay_plus_j_with_0];				
			
				$('#content_wybrany4')
					.append("<div class='content_wybrany4_item' style='position:relative; " + (response_array.indexOf(data_array.join('-')) > -1 ? 'color:#810;' : 'color:#FB0;') +
								"'>" + (actualDay_plus_j) + "</div>");					
			}
			
            if (ile_miesiecy_od > 1)
			{				
				data_month = (date.getMonth() + 2) < 10 ? ('0' + (date.getMonth() + 2)) : (date.getMonth() + 2);				
				
				for (i=1; i<=daysNextMonthNeeded; i++)
				{					
					i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);					
					data_array = [actualYear, data_month, i_with_0];
									
					$('#content_wybrany4')
						.append("<div class='content_wybrany4_item' style='position:relative; " + (response_array.indexOf(data_array.join('-')) > -1 ? 'color:#810;' : 'color:#FB0;') +
									"'>" + i + "</div>");					
				}
                                
				if (ile_miesiecy_od === 3)
				{
					data_month = (date.getMonth() + 3) < 10 ? ('0' + (date.getMonth() + 3)) : (date.getMonth() + 3);				
					
					for (i=1; i<=daysNextNextMonthNeeded; i++)
					{						
						i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);					
						data_array = [actualYear, data_month, i_with_0];						
						
						$('#content_wybrany4')
							.append("<div class='content_wybrany4_item' style='position:relative; " + (response_array.indexOf(data_array.join('-')) > -1 ? 'color:#810;' : 'color:#FB0;') +
										"'>" + i + "</div>");						
					}
				}
			}		
						
						
						
			$('#content_wybrany')
				.append("<div id='content_wybrany5' style='color:#254; font:bold italic 12px Arial; margin:387px 0 0 100px; position:absolute; width:500px;'>" +
							"Dni na żółto - samochód dostępny<br>Dni na czerwono - samochód już zarezerwowany" +
						"</div>");
			
		}
	});
}        



$(function()
{
	$('#middle').on('click', '.samochod_lista_column', function()
	{                
		wybrany_samochod_id = this.id.replace("wybrany_samochod_ID_", "");
		f_wybrany_samochod(wybrany_samochod_id);                
	});
});














		