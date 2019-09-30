function f_rezerwowanieSamochodu()
{
	$.ajax({
		type : 'get',
		url : './ActionsDB_Klient.php',
		data :
		{
			rodzaj : 'czy_zalogowany'
		},
		success : function(response)
		{
			if (response == false)	alert("Zaloguj się");
			else if (response == true)
			{						
				$('#wybranySamochod_button').remove();
				
				$('#content_wybrany').append("<div id='content_wypozyczanie'></div>");					
				
				
				
				var content_od_do = $("<div id='content_od_do' style='background:#888; margin:60px 0 0 535px; height:30px; width:400px; padding:2px 0 0 5px; position:absolute;'>" +
										"<div id='select_od_div' style='margin:0 0 0 5px; position:absolute; overflow:both; padding:0 0 0 0;'>" +
										"Od <select id='select_od'><option value=''>możliwe daty</option></select>" +
										"</div>" +			
									"</div>");					
								
				miesiac = ["stycznia", "lutego", "marca", "kwietnia", "maja", "czerwca", "lipca", "sierpnia", "września", "października", "listopada", "grudnia"];
				

				j=-1;
				for (i=actualDay; i<=lastDay; i++)
				{	
					actualDay_plus_j = actualDay + (++j);
					actualDay_plus_j < 10 ?	(actualDay_plus_j_with_0 = '0' + actualDay_plus_j) : (actualDay_plus_j_with_0 = actualDay_plus_j);
					data_array = [actualYear, actualMonth, actualDay_plus_j_with_0];
					
					if (response_array.indexOf(data_array.join('-')) < 0)
					{						
						$(content_od_do).find('select#select_od').append("<option value='" + data_array.join('-') + "'>&nbsp;" + i + " " + miesiac[date.getMonth()] + "</option>");	
					}										
				}				
				
				ostatni_miesiac = date.getMonth() + 1;
				ostatni_dzien = lastDay;
					
				if (ile_miesiecy_od > 1)
				{
					nextMonth < 10 ? (nextMonth_with_0 = '0' + nextMonth) : (nextMonth_with_0 = nextMonth);						
					data_month = (date.getMonth() + 2) < 10 ? ('0' + (date.getMonth() + 2)) : (date.getMonth() + 2);
						
					for (i=1; i<=daysNextMonthNeeded; i++)
					{						
						i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);					
						data_array = [actualYear, data_month, i_with_0];					
						
						if (response_array.indexOf(data_array.join('-')) < 0)
						{
							$(content_od_do).find('select#select_od').append("<option value='" + data_array.join('-') + "'>&nbsp;" + i + " " + miesiac[date.getMonth() + 1] + "</option>");
						}
					}
					
					ostatni_miesiac = date.getMonth() + 2;
					ostatni_dzien = daysNextMonthNeeded;
					
					if (ile_miesiecy_od === 3)
					{
						nextNextMonth < 10 ? (nextNextMonth_with_0 = '0' + nextNextMonth) : (nextNextMonth_with_0 = nextNextMonth);
						data_month = (date.getMonth() + 3) < 10 ? ('0' + (date.getMonth() + 3)) : (date.getMonth() + 3);							
						
						for (i=1; i<=daysNextNextMonthNeeded; i++)
						{						
							i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);						
							data_array = [actualYear, data_month, i_with_0];
							
							if (response_array.indexOf(data_array.join('-')) < 0);
							{
								$(content_od_do).find('select#select_od').append("<option value='" + data_array.join('-') + "'>&nbsp;" + i + " " + miesiac[date.getMonth() + 2] + "</option>");
							}						
						}
						ostatni_miesiac = date.getMonth() + 3;
						ostatni_dzien = daysNextNextMonthNeeded;
					}
				}		
					
				$('#wybranySamochod_button_powrot').animate({top: '80px',left: '10px'},500);
				$('#content_wybrany2_1').animate({top: '80px'}, 500);
				$('#content_wybrany2_2').animate({top: '80px'}, 500)              
					.delay(200)
					.queue(function(next)
					{
						$('#content_wypozyczanie').append(content_od_do);                                          
						next();
					});
				
			}                     
		}
	});
}
	
function f_rezerwowanieSamochodu_do()
{	
	$("select option:selected").each(function()
	{                        
		od_data = $(this).val();		
		data_od_array = od_data.split('-');
		od_rok 		= data_od_array[0];
		od_miesiac	= data_od_array[1];
		od_dzien 	= data_od_array[2];		

		ile_miesiecy_do = ostatni_miesiac - od_miesiac + 1;		
		lastDay_caly_do = new Date(od_rok, parseInt(od_miesiac,10), 0);		
		lastDay_do = lastDay_caly_do.getDate();
				
		$('#select_do_div').remove();
		$('#content_od_do').append("<div id='select_do_div' style='position:relative; margin:0 0 0 163px; overflow:both;'>do <select id='select_do'><option value=''>możliwe daty</option></select></div>");
			
		//if (ile_miesiecy_do === 1)	lastDay_do = ostatni_dzien;
		
		j=-1;		
				
		for (i=parseInt(od_dzien); i<=lastDay_do; i++)
		{			
			od_dzien_plus_j = parseInt(od_dzien) + (++j);
			od_dzien_plus_j < 10 ?	(od_dzien_plus_j_with_0 = '0' + od_dzien_plus_j) : (od_dzien_plus_j_with_0 = od_dzien_plus_j);
			data_array = [od_rok, od_miesiac, od_dzien_plus_j_with_0];					
			
			if (response_array.indexOf(data_array.join('-')) < 0)
			{				
				$(content_od_do).find('select#select_do').append("<option value='" + data_array.join('-') + "' style='width:100px;'>&nbsp;" + i + " " + miesiac[od_miesiac-1] + "</option>");
			}		
		}
		
		if (ile_miesiecy_do > 1)
		{
			od_miesiac_plus_1 = parseInt(od_miesiac) + 1;
			od_miesiac_plus_1 < 10 ? (od_miesiac_plus_1_with_0 = '0' + od_miesiac_plus_1) : (od_miesiac_plus_1_with_0 = od_miesiac_plus_1);				
			
			for (i=1; i<=daysNextMonthNeeded; i++)
			{
				i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);					
				data_array = [od_rok, od_miesiac_plus_1_with_0, i_with_0];				
				
				if (response_array.indexOf(data_array.join('-')) < 0)
				{					
					$(content_od_do).find('select#select_do').append("<option value='" + data_array.join('-') + "' style='width:100px;'>&nbsp;" + i + " " + miesiac[parseInt(od_miesiac,10)] + "</option>");
				}
		
			}
			if (ile_miesiecy_do === 2)
			{
				od_miesiac_plus_2 = parseInt(od_miesiac) + 2;
				od_miesiac_plus_2 < 10 ? (od_miesiac_plus_2_with_0 = '0' + od_miesiac_plus_2) : (od_miesiac_plus_2_with_0 = od_miesiac_plus_2);					
				
				for (i=1; i<=10/* daysNextNextMonthNeeded */; i++)
				{
					i < 10 ? (i_with_0 = '0' + i) : (i_with_0 = i);
					data_array = [od_rok, od_miesiac_plus_2_with_0, i_with_0];					
					
					if (response_array.indexOf(data_array.join('-')) < 0)
					{					
						$(content_od_do).find('select#select_do').append("<option value='" + data_array.join('-') + "' style='width:100px;'>&nbsp;" + i + " " + miesiac[parseInt(od_miesiac_plus_1,10)] + "</option>");
					}
		
				}
			}
		}
	});
}

function f_rezerwowanieSamochodu_po_wpisaniu_daty()
{
	
	$("select#select_do option:selected").each(function()
	{                        
		do_data = $(this).val();
		data_od_array = do_data.split('-');
		
		do_rok		= data_od_array[0];
		do_miesiac	= data_od_array[1];
		do_dzien	= data_od_array[2];

		$("#content_od_do").remove();
		
		$.ajax({
			type : 'get',
			url : './ActionsDB_Klient.php',
			data : {
					rodzaj : 'dane_klienta'
			},
			success : function(response)
			{
				response_array = response.split("|");
					
				$('#content_wypozyczanie')
					.append("<div id='potwierdzenie'>" +
								"<div id='potwierdzenie_dane_klienta'><table style='color:#BBB;'>" +
									"<tr>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:italic 11px Arial;'>Imię i nazwisko : </td>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:bold italic 12px Arial;'>" + response_array[0] + " " + response_array[1] + "</td>" +
									"<tr>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:italic 11px Arial;'>Pesel : </td>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:bold italic 12px Arial;'>" + response_array[2] + "</td>" +
									"<tr>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:italic 11px Arial;'>Telefon : </td>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:bold italic 12px Arial;'>" + response_array[3] + "</td>" +
									"<tr>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:italic 11px Arial;'>E-mail : </td>" +
										"<td class='potwierdzenie_dane_klienta_table_tr_td' style='font:bold italic 12px Arial;'>" + response_array[4] + "</td>" +											
								"</table></div>" +									
							"</div>");				
				
				$('#wybranySamochod_button_powrot').animate({ opacity:0.2, height:10, marginTop:175 }, 400);					
				$('#wybranySamochod_button_powrot').animate({ opacity:0, left:"400px", height:0, marginTop:"180px" }, 400);				
				
							
				if (od_rok == do_rok && od_miesiac == do_miesiac && od_dzien == do_dzien)
				{
					$("<div id='potwierdzenie_daty'>" + 
						"Rezerwacja samochodu w dniu " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + "." + 
					"</div>").hide().appendTo('#potwierdzenie').delay(1000).fadeIn(10);
				}
				else
				{
					$("<div id='potwierdzenie_daty'>" +
						"Rezerwacja samochodu w dniach od " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + " do " + parseInt(do_dzien) + "." + miesiac[do_miesiac-1] + "." +
					"</div>").hide().appendTo('#potwierdzenie').delay(1000).fadeIn(10);
				}
					
				$("<div id='rezerwowanieSamochodu_button_powrot'>Anuluj</div>").hide().appendTo('#potwierdzenie').fadeIn(400);			
				$("<div id='rezerwowanieSamochodu_button'>Potwierdzam</div>").hide().appendTo('#potwierdzenie').fadeIn(400);					
			}
		});
	});
}
        
function f_rezerwowanieSamochodu_po_potwierdzeniu()
{		
		$.ajax({
			type : 'post',
			url : 'Rezerwacja.php',
			data :
			{
				rodzaj : 'rezerwoj',
				od_data : od_data,                                
				do_data : do_data,
				wybrany_oddzial_id : wybrany_oddzial_id,
				wybrany_samochod_id : wybrany_samochod_id
			},
			success : function(response)
			{
				$('#potwierdzenie_daty').remove();
				$('#rezerwowanieSamochodu_button_powrot').remove();
				$('#rezerwowanieSamochodu_button').remove();				
				
				$('#content_wybrany2_1').animate({top: '98px'}, 500);
				$('#content_wybrany2_2').animate({top: '98px'}, 500)					.queue(function(next)
					{
						/*$('#content_wypozyczanie').hide().append(po_potwierdzeniu_samochod).fadeIn("slow"); */
						
						
  
						$("<div id='po_potwierdzeniu_samochod'>Samochód</div>").hide().appendTo('#content_wypozyczanie').fadeIn(500);
  
						$.ajax({
							type : 'get',
							url : './ActionsDB_Klient.php',
							data : 
							{
								rodzaj : 'oddzial_adres'
							},
							success : function(response)
							{	
								if (od_rok == do_rok && od_miesiac == do_miesiac && od_dzien == do_dzien)
								{
									$('#content_wypozyczanie')
										.append("<div id='po_potwierdzeniu_tekst'>" +
													"Rezerwacja wykonana. &nbsp;Termin " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + ". &nbsp; Odbiór samochodu " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + " w salonie &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " + response +
												"</div>");
								}
								else
								{								
									$('#content_wypozyczanie')
										.append("<div id='po_potwierdzeniu_tekst'>" + 
													"Rezerwacja wykonana. &nbsp;Termin od " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + " do " + parseInt(do_dzien) + "." + miesiac[do_miesiac-1] + ". &nbsp;Odbiór samochodu " + parseInt(od_dzien) + "." + miesiac[od_miesiac-1] + " w salonie &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; " + response +
												"</div>");
								}
									
								$("<div id='po_potwierdzeniu_button'>OK</div>").hide().appendTo('#content_wypozyczanie').fadeIn(3000);
							}
						});                                                                                                                        
						next();
					});             
			}                                                    
		});
		
		
}		
	
function f_rezerwowanieSamochodu_wyjscie()
{
		/*$('#content').empty(); */
		$('#content_wypozyczanie').remove();
		
		$('#content_wybrany1').remove();
		$('#content_wybrany2_1').remove();
		$('#content_wybrany2_2').remove();
		$('#content_wybrany4').remove();
		$('#content_wybrany5').remove();
		
		f_Nasza_wypozyczalnia();
}
	


$(function()
{
	$('#middle').on('click', '#wybranySamochod_button', function()
	{
		f_rezerwowanieSamochodu();
	});
	
	$("#middle").on('change', 'select#select_od', function() {
		f_rezerwowanieSamochodu_do();
	});				
	
	$('#middle').on('change', 'select#select_do', function()
	{
		f_rezerwowanieSamochodu_po_wpisaniu_daty();
	});
	
	$('#middle').on('click', '#rezerwowanieSamochodu_button', function()
	{
		f_rezerwowanieSamochodu_po_potwierdzeniu();
	});
	
	$('#middle').on('click', '#po_potwierdzeniu_button', function()
	{
		f_rezerwowanieSamochodu_wyjscie();
	});

	
});
	
