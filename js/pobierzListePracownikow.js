$(function()
{
	$('#pobierzListePracownikow').on('click', function()
	{
		$.ajax({
			type : 'get',
			url : './ActionsDB.php',
			data : {
				rodzaj : 'listaPracownikow'
			},
			success : function(rodzaj) {

				var response = rodzaj.split("|");					
				var responselength = (response.length-1)/10;
				var count = 0;					
				var column;				
				var element;

				$('#nazwatabelitekst').empty();
				$('#nazwatabelinazwa').empty();												
				$('#tabMainOpis').empty();
				$('#tabMain').empty();
											
				$('#nazwatabelitekst').append('<div class="nazwatabelitekst_content">Tabela </div>');				
				$('#nazwatabelinazwa').append('<div class="nazwatabelinazwa_content">Pracownicy </div>');
				
				
				element = document.getElementById('tabMainScroll');
				element.style.height = "310px";
				element.style.width = "840px";							
								
				$('#tabMainOpis').append('<div><div class="prac_column1">Imię</div>' +
											'<div class="prac_column2">Nazwisko</div>' +
											'<div class="prac_column3">Login</div>' +
											'<div class="prac_column4">Stanowisko</div>' +
											'<div class="prac_column5">Nazwa oddziału</div>' +
											'<div class="prac_column6_opis">Adres zamieszkania</div></div>');
									
				for (i=1; i <=responselength; i++)
				{
					nextRecord = document.createElement("div");
					nextRecord.setAttribute("id", "rekord"+i);
					nextRecord.setAttribute("class", "rekord_prac");				
																
					if (i % 2 == 0)
					{
						nextRecord.style.color = "#4C4C4C";							 
						nextRecord.style.background = "#858F85";
					}							 
					else
					{						
						nextRecord.style.background = "#8F9F8F";					
					}
					
					nextCell1 = document.createElement("div");
					nextCell2 = document.createElement("div");
					nextCell3 = document.createElement("div");
					nextCell4 = document.createElement("div");
					nextCell5 = document.createElement("div");
					nextCell6 = document.createElement("div");
					nextCell7 = document.createElement("div");
					nextCell8 = document.createElement("div");
					nextCell9 = document.createElement("div");
					nextCell10 = document.createElement("div");						
					
					nextCell1.setAttribute("class", "prac_column1");						
					nextCell2.setAttribute("class", "prac_column2");
					nextCell3.setAttribute("class", "prac_column3");
					nextCell4.setAttribute("class", "prac_column4");
					nextCell5.setAttribute("class", "prac_column5");						
					nextCell6.setAttribute("class", "prac_column6");
					nextCell7.setAttribute("class", "prac_column7");
					nextCell8.setAttribute("class", "prac_column8");
					nextCell9.setAttribute("class", "prac_column9");						
					nextCell10.setAttribute("class", "prac_column10");				
					
					for (column=1;column <=10 ;column++){										
						if (column == 1)       { nextCell1.innerHTML  = response[count++]; }
						else if (column == 2)  { nextCell2.innerHTML  = response[count++]; }
						else if (column == 3)  { nextCell3.innerHTML  = response[count++]; }
						else if (column == 4)  { nextCell4.innerHTML  = response[count++]; }
						else if (column == 5)  { nextCell5.innerHTML  = response[count++]; }
						else if (column == 6)  { nextCell6.innerHTML  = response[count++]; }
						else if (column == 7)  { nextCell7.innerHTML  = response[count++]; }
						else if (column == 8)  { nextCell8.innerHTML  = response[count++]; }
						else if (column == 9)  { nextCell9.innerHTML  = response[count++]; }
						else if (column == 10) { nextCell10.innerHTML = response[count++]; }														
					}
					
					nextRecord.appendChild(nextCell1);
					nextRecord.appendChild(nextCell2);
					nextRecord.appendChild(nextCell3);
					nextRecord.appendChild(nextCell4);
					nextRecord.appendChild(nextCell5);
					nextRecord.appendChild(nextCell6);
					nextRecord.appendChild(nextCell7);
					nextRecord.appendChild(nextCell8);
					nextRecord.appendChild(nextCell9);
					nextRecord.appendChild(nextCell10);					
														
					$('#tabMain').append(nextRecord);																	
				}						
			}
		});
	});
});






