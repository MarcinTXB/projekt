<?php

include('./NewConnection.php');

$dbh = (new NewConnection())->getCon();

$nazwaTabAdres = 'Adres';

$nazwaTabOddzial = 'Oddzial';

$nazwaTabPrac = 'Pracownik';



$loginprac = $_GET['loginprac'];
		
	

			
	$stmt  = $dbh->prepare("SELECT ID_Adres, ID_Oddzial, LoginPrac, Stanowisko, Imie, Nazwisko, Pesel, Telefon, Email FROM " . $nazwaTabPrac . " WHERE LoginPrac=?;");
	$stmt->bindValue(1, $loginprac, PDO::PARAM_STR);
	$stmt->execute();		
	$rekord = $stmt->fetch(PDO::FETCH_ASSOC);
	
	$stmt2 = $dbh->prepare("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . " WHERE ID_Oddzial=?;");
	$stmt2->bindParam(1, $rekord['ID_Oddzial'], PDO::PARAM_INT);
	$stmt2->execute();
	$rekord2 = $stmt2->fetch(PDO::FETCH_ASSOC);
	
	$stmt3 = $dbh->prepare("SELECT Miasto, Rodzaj_ulicy, Ulica, Nr_budynku, Nr_mieszkania FROM " . $nazwaTabAdres . " WHERE ID_Adres=?;");
	$stmt3->bindParam(1, $rekord['ID_Adres'], PDO::PARAM_INT);
	$stmt3->execute();
	$rekord3 = $stmt3->fetch(PDO::FETCH_ASSOC);
	
	echo $rekord['Imie'] . "|" . $rekord['Nazwisko'] . "|" . $rekord['Stanowisko'] . "|" . $rekord['LoginPrac'] . "|" . $rekord2['Nazwa_oddzialu'] . "|" . $rekord['Pesel'] . "|" . $rekord['Telefon'] . "|" . $rekord['Email'] . "|" . $rekord3['Miasto'] . "|" . $rekord3['Rodzaj_ulicy'] . "|" . $rekord3['Ulica'] . "|" . $rekord3['Nr_budynku'] . "|" . $rekord3['Nr_mieszkania'] . "|";
?>
	
			
