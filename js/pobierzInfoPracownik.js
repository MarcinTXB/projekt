$(function()
{
	$('#tabMain').on('click', 'div.rekord_prac', function()
	{		
		var response2;	
		var element;
					
		$.ajax({
			type : 'get',
			url : './ActionsDBrecord.php',
			data : {
				loginprac : this.children[2].innerHTML
			},
			
			success : function(loginprac) {
				
				$("#info1").empty();
				$("#info2").empty();
				$("#info3").empty();

					
				response2 = loginprac.split("|");
				
				
				$("#info1").append(	'<div class="infoareacellopis">Imię : </div><div class="infoareacell">' + response2[0] + '</div>' +
									'<div class="infoareacellopis">Nazwisko : </div><div class="infoareacell">' + response2[1] + '</div>' +
									'<div class="infoareacellopis">Stanowisko : </div><div class="infoareacell">' + response2[2] + '</div>' +
									'<div class="infoareacellopis">Login : </div><div class="infoareacell">' + response2[3] + '</div>' +
									'<div class="infoareacellopis">Nazwa oddziału : </div><div class="infoareacell">' + response2[4] + '</div>');
									
				$("#info2").append(	'<div class="infoareacellopis">Pesel : </div><div class="infoareacell">' + response2[5] + '</div>' +
									'<div class="infoareacellopis">Telefon : </div><div class="infoareacell">' + response2[6] + '</div>' +
									'<div class="infoareacellopis">Email : </div><div class="infoareacell">' + response2[7] + '</div>');
				
				$("#info3").append( '<div class="infoareacellopis">Adres zamieszkania : </div><div class="infoareacell">' + response2[8] + '</div>' +
																						'<div class="infoareacell">' + response2[9] + '</div>' +
																						'<div class="infoareacell">' + response2[10] + '</div>' +
																						'<div class="infoareacell">' + response2[11] + '</div>' +
																						'<div class="infoareacell">' + response2[12] + '</div>');				

											
			}	
		});		
	});
});




