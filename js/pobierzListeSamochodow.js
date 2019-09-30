$(function()
{
	$('#pobierzListeSamochodow').on('click', function()
	{
		$.ajax({
			type : 'get',
			url : './ActionsDB.php',
			data : {
				rodzaj : 'listaSamochodow'
			},
			success : function(rodzaj) {

				var response = rodzaj.split("|");					
				var responselength = (response.length-1)/9;
				var count = 0;					
				var column;				
				var element1;
				var element2;

				$('#nazwatabelitekst').empty();
				$('#nazwatabelinazwa').empty();												
				$('#tabMainOpis').empty();
				$('#tabMain').empty();
				
				
				
				$('#nazwatabelitekst').append('<div class="nazwatabelitekst_content">Tabela </div>');
				
				$('#nazwatabelinazwa').append('<div class="nazwatabelinazwa_content">Samochody</div>');
				
					
				element2 = document.getElementById('tabMainScroll');
				element2.style.height = "310px";
				element2.style.width = "1060px";					

				$('#tabMainOpis').append('<div><div class="samochod_column1">Marka</div>' +
											'<div class="samochod_column2">Model</div>' +
											'<div class="samochod_column3">Rocznik</div>' +
											'<div class="samochod_column4">Poj. silnika</div>' +
											'<div class="samochod_column5">Moc silnika</div>' +
											'<div class="samochod_column6">Kolor</div>' +
											'<div class="samochod_column7">Rodzaj samochodu</div>' +
											'<div class="samochod_column8">Symbol samochodu</div>' +
											'<div class="samochod_column9">Nazwa oddziału</div></div');											
									
				for (i=1; i <=responselength; i++) {				
					nextRecord = document.createElement("div");
					nextRecord.setAttribute("id", "rekord"+i);
					nextRecord.setAttribute("class", "rekord_samochod");
					
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
					
					nextCell1.setAttribute("class", "samochod_column1");						
					nextCell2.setAttribute("class", "samochod_column2");
					nextCell3.setAttribute("class", "samochod_column3");
					nextCell4.setAttribute("class", "samochod_column4");
					nextCell5.setAttribute("class", "samochod_column5");						
					nextCell6.setAttribute("class", "samochod_column6");
					nextCell7.setAttribute("class", "samochod_column7");
					nextCell8.setAttribute("class", "samochod_column8");
					nextCell9.setAttribute("class", "samochod_column9");				
					
					for (column=1;column <=9 ;column++){										
						if (column == 1)       { nextCell1.innerHTML  = response[count++]; }
						else if (column == 2)  { nextCell2.innerHTML  = response[count++]; }
						else if (column == 3)  { nextCell3.innerHTML  = response[count++]; }
						else if (column == 4)  { nextCell4.innerHTML  = response[count++]; }
						else if (column == 5)  { nextCell5.innerHTML  = response[count++]; }
						else if (column == 6)  { nextCell6.innerHTML  = response[count++]; }
						else if (column == 7)  { nextCell7.innerHTML  = response[count++]; }
						else if (column == 8)  { nextCell8.innerHTML  = response[count++]; }
						else if (column == 9)  { nextCell9.innerHTML  = response[count++]; }						
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
														
					$('#tabMain').append(nextRecord);																	
				}						
			}
		});
	});
});






