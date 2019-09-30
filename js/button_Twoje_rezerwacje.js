$(function() {
	$('#button_Twoje_rezerwacje').on('click', function() {

		if (gdzie !== 'Twoje_rezerwacje') {

			gdzie = 'Twoje_rezerwacje';
			$('#middle').empty();

			$.ajax({
				type : 'get',
				url : './ActionsDB_Klient.php',
				data : {
					rodzaj : 'rezerwacje_klienta'
				},
				success : function(response) {
					
					response_array = response.split("|");					
					$('#middle').append('<div id="content_Twoje_rezerwacje">' + response_array + '</div>');					
				}
			}); 
		}
		return false;
	});
});






