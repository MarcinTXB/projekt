$(function()
{
	$('#pobierzListeAdresow').on('click', function()
	{
		$.ajax({
			type : 'get',
			url : './ActionsDB.php',
			data : {
				rodzaj : 'listaAdresow'
			},			
			success : function(rodzaj){

				response = rodzaj.split("|");
				responselength = (response.length-1)/5;
				
				var count = 0;				
				var column;
				

				$('#nazwatabelitekst').empty();
				$('#nazwatabelinazwa').empty();
				$('#tabMainOpis').empty();
				$('#tabMain').empty();
						
				$('#nazwatabelitekst').append('<div class="nazwatabelitekst_content">Tabela </div>');				
							
				$('#nazwatabelinazwa').append('<div class="nazwatabelinazwa_content">Adresy </div>');
								
				element = document.getElementById('tabMainScroll');
				element.style.height = "310px";
				element.style.width = "840px";					
			
				$('#tabMainOpis').append('<div><div class="adres_column1">Miasto</div>' +
											'<div class="adres_opis1">Ulica</div>' +
											'<div class="adres_opis2">Numer</div></div>');
						
				for (i=1; i <=responselength; i++) {
					nextRecord = document.createElement("div");
					nextRecord.setAttribute("class", "rekord_adres");
										
					if (i % 2 == 0) {
						nextRecord.style.color = "#4C4C4C";
						nextRecord.style.background = "#858F85";
					}
					else {
						nextRecord.style.background = "#8F9F8F";
					}
					
					nextCell1 = document.createElement("div");
					nextCell2 = document.createElement("div");
					nextCell3 = document.createElement("div");
					nextCell4 = document.createElement("div");
					nextCell5 = document.createElement("div");
					
					nextCell1.setAttribute("class", "adres_column1");
					nextCell2.setAttribute("class", "adres_column2");
					nextCell3.setAttribute("class", "adres_column3");
					nextCell4.setAttribute("class", "adres_column4");
					nextCell5.setAttribute("class", "adres_column5");
					
					for (column=1;column <= 5 ;column++){										
						if (column == 1)       { nextCell1.innerHTML  = response[count++]; }				
						else if (column == 2)  { nextCell2.innerHTML  = response[count++]; }
						else if (column == 3)  { nextCell3.innerHTML  = response[count++]; }
						else if (column == 4)  { nextCell4.innerHTML  = response[count++]; }
						else if (column == 5)  { nextCell5.innerHTML  = response[count++]; }
					}
					
					nextRecord.appendChild(nextCell1);
					nextRecord.appendChild(nextCell2);
					nextRecord.appendChild(nextCell3);
					nextRecord.appendChild(nextCell4);
					nextRecord.appendChild(nextCell5);
					
					$('#tabMain').append(nextRecord);
				}
			}
		});
	});
});

