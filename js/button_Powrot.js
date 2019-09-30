$(function()
{
	$('#middle').on('click', '#wybranySamochod_button_powrot', function()
	{				
		$('#middle').empty();
		$('#content_wybrany').remove();
		$('#bottom2').empty();
		pokazListeSamochodow(wybrany_rodzaj_samochodu, wybrany_oddzial_id);
	});
	
	$('#middle').on('click', '#rezerwowanieSamochodu_button_powrot', function()
	{	
		$('#potwierdzenie').remove();		
		$('#wybranySamochod_button_powrot').remove();

		$("<div id='wybranySamochod_button_powrot' style='margin:165px 0 0 505px; position:absolute; height:30px; width:180px; display:block;'>Powrót</div>").hide().appendTo("#content_wybrany").fadeIn(1000);
		$("<div id='wybranySamochod_button' style='margin:165px 0 0 705px; position:absolute; height:30px; width:180px; display:block;'>Rezerwuję</div>").hide().appendTo("#content_wybrany").fadeIn(1000);	
		
		$('#content_wybrany2_1').animate({top: '0px'}, 500);
		$('#content_wybrany2_2').animate({top: '0px'}, 500);
		
		f_wybranySamochod(wybrany_samochod_id);
	});	

	$('#bottom2').on('click', '#pokaz_liste_powrot', function()
	{	
		switch(gdzie)
		{
			case 'listaSamochodow' :
				window.location = 'index_klient.php';
				break;
			/*
			case 'wybranySamochod' :
				$('#middle').empty();
				$('#bottom2').empty();
				pokazListeSamochodow(wybrany_rodzaj_samochodu, wybrany_oddzial_id)
				break; */
		}
		
	});
});
