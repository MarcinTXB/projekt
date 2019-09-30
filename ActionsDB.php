<?php

include('./NewConnection.php');

$dbh = (new NewConnection())->getCon();

$nazwaTabAdres = 'Adres';

$nazwaTabOddzial = 'Oddzial';

$nazwaTabPrac = 'Pracownik';

$nazwaTabSamochod = 'Samochod';



$rodzaj=$_GET['rodzaj'];

if ($rodzaj === 'listaOddzialow') {
	
	$stmt = $dbh->query("SELECT Symbol_oddzialu, Nazwa_oddzialu, Miasto, Ulica, Telefon, Email FROM " . $nazwaTabOddzial . ";");
		
	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $rekord['Symbol_oddzialu'] . "|" . $rekord['Nazwa_oddzialu'] . "|" . $rekord['Miasto'] . "|" . $rekord['Ulica'] . "|" . $rekord['Telefon'] . "|" . $rekord['Email'] . "|";
	}	
}




else if ($rodzaj === 'listaSamochodow') {
	
	$stmt = $dbh->query("SELECT ID_Oddzial, Marka, Model, Rocznik, Pojemnosc_silnika, Moc_silnika, Kolor, Rodzaj_samochodu, Symbol_samochodu FROM " . $nazwaTabSamochod . ";");
	
	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
		
		$stmt2 = $dbh->prepare("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . " WHERE ID_Oddzial=?;");
		$stmt2->bindParam(1, $rekord['ID_Oddzial'], PDO::PARAM_INT);
		$stmt2->execute();
		$rekord2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		
		echo $rekord['Marka'] . "|" . $rekord['Model'] . "|" . $rekord['Rocznik'] . "|" . $rekord['Pojemnosc_silnika'] . "|" . $rekord['Moc_silnika'] . "|" . $rekord['Kolor'] . "|" . $rekord['Rodzaj_samochodu'] .
		 "|" . $rekord['Symbol_samochodu'] . "|" . $rekord2['Nazwa_oddzialu'] . "|"; 
	}
}		
		




else if ($rodzaj === 'listaPracownikow') {	

	$stmt  = $dbh->query("SELECT ID_Adres, ID_Oddzial, LoginPrac, Stanowisko, Imie, Nazwisko, Pesel, Telefon, Email FROM " . $nazwaTabPrac . ";");

	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)){					
		
		$stmt2 = $dbh->prepare("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . " WHERE ID_Oddzial=?;");
		$stmt2->bindParam(1, $rekord['ID_Oddzial'], PDO::PARAM_INT);
		$stmt2->execute();			
		$rekord2 = $stmt2->fetch(PDO::FETCH_ASSOC);							
			
		$stmt3 = $dbh->prepare("SELECT Miasto, Rodzaj_ulicy, Ulica, Nr_budynku, Nr_mieszkania FROM " . $nazwaTabAdres . " WHERE ID_Adres=?;");
		$stmt3->bindParam(1, $rekord['ID_Adres'], PDO::PARAM_INT);
		$stmt3->execute();			
		$rekord3 = $stmt3->fetch(PDO::FETCH_ASSOC);	
	
		echo $rekord['Imie'] . "|" . $rekord['Nazwisko'] . "|" . $rekord['LoginPrac'] . "|" . $rekord['Stanowisko'] . "|" . $rekord2['Nazwa_oddzialu'] . "|" . $rekord3['Miasto'] . "|" . $rekord3['Rodzaj_ulicy'] . "|" . $rekord3['Ulica'] . "|" . $rekord3['Nr_budynku'] . "|" . $rekord3['Nr_mieszkania'] . "|";		
	}	
}




else if ($rodzaj === 'listaAdresow') {
																																										
	$stmt = $dbh->query("SELECT Miasto, Rodzaj_ulicy, Ulica, Nr_budynku, Nr_mieszkania FROM	".$nazwaTabAdres.";");
	
	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)){
		echo $rekord['Miasto'] . "|" . $rekord['Rodzaj_ulicy'] . "|" . $rekord['Ulica'] . "|" . $rekord['Nr_budynku'] . "|" . $rekord['Nr_mieszkania'] . "|";
	}																																												
}
	
																																									
			
																								
																							
																						
																					
																				
																			
																		
																	
																
															
														
													
												
											
										
									
								
							
						
					
				
			
		
		
			
							
						
					
				
			
		
	
	
	

	









//$dbh = null;





?>


 




