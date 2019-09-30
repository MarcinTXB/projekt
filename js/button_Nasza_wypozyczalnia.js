function f_Nasza_wypozyczalnia() {

	$('#rodzaj_samochodow').empty();
	$('#wybrany_oddzial').empty();
	$('#middle').empty();

	$('#middle').append("<div id='content_Nasza_wypozyczalnia'><div id='picture' style='margin:0 50px 30px 0;'></div></div>");
        
	gdzie = 'Nasza_wypozyczalnia';
	

	var content_Nasza_wypozyczalnia_powitanie	= $("<div style='font:bold italic 20px Arial; color:#777; margin:0 0 0 350px; padding:40px 0 0 80px;'>" +
														"Witamy w naszej wypożyczalni</div>");
	
	$(content_Nasza_wypozyczalnia_powitanie).hide().appendTo('#content_Nasza_wypozyczalnia').fadeIn(800);

	var content_Nasza_wypozyczalnia_tresc	= $("<p style='font:bold italic 14px Arial; color:#777; margin:0 0 0 330px; padding:50px 50px 0 50px;'>" +
													"Nasza wypożyczalnia dysponuje samochodami osobowymi, w tym kombi,<br>i samochodami dostawczymi.<br><br>" +
													"Rezerwacja możliwa z 30-dniowym wyprzedzeniem.</p>");	
	    
	$(content_Nasza_wypozyczalnia_tresc).hide().appendTo('#content_Nasza_wypozyczalnia').fadeIn(100);        
        
};


$(function(){
	$('#button_Nasza_wypozyczalnia').on('click', function() {                
		f_Nasza_wypozyczalnia();
		return false;
	});
});


