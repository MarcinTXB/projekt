<?php

try{	
	session_start();	
}
catch(Exception $e){}




include('./NewConnection.php');

$dbh = (new NewConnection())->getCon();

$nazwaTabKlient = 'Klient';

$nazwaTabSamochod = 'Samochod';

$nazwaTabOddzial = 'Oddzial';

$nazwaTabRezerwacja = 'Rezerwacja';

/*
if(isset($_GET['rodzaj2'])){
	$rodzaj2=$_GET['rodzaj2'];
	$i = 1;
	$nazwa_oddzialu_z_menu = $_SESSION['nazwa_oddzialu_z_menu'];
	
	$stmt = $dbh->prepare("SELECT ID_Oddzial, Marka, Model, Pojemnosc_silnika FROM ".$nazwaTabSamochod." WHERE Rodzaj_samochodu=?;");
	
	if ($rodzaj === 'content_right_rodzaje1') {	
		$stmt->bindValue(1, 'osobowy', PDO::PARAM_STR);
	} 
	else if ($rodzaj === 'content_right_rodzaje2') {
		$stmt->bindValue(1, 'kombi', PDO::PARAM_STR);
	} 
	else if ($rodzaj === 'content_right_rodzaje3') {
		$stmt->bindValue(1, 'dostawczy', PDO::PARAM_STR);
	}
	$stmt->execute();	

	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
		 
		$stmt2 = $dbh->prepare("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . " WHERE ID_Oddzial=?;");
		$stmt2->bindParam(1, $rekord['ID_Oddzial'], PDO::PARAM_INT);
		$stmt2->execute();
		$rekord2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		
		if ($rekord2['Nazwa_oddzialu'] == $nazwa_oddzialu_z_menu){
			echo $rekord['Marka'] . "|" . $rekord['Model'] . "|" . $rekord['Pojemnosc_silnika'] . "|";
		}
		$i++;
	}
} */


/****************************************   Wybrany rodzaj samochodu i nazwa oddziału, ma wyświetlić listę samochodów w danym oddziale *******/

if(isset($_GET['wybrany_rodzaj_samochodu'])) {
	
	$wybrany_rodzaj_samochodu = $_GET['wybrany_rodzaj_samochodu'];
	$wybrany_oddzial_id = $_GET['wybrany_oddzial_id'];
	
	$stmt = $dbh->prepare("SELECT ID_Samochod, Marka, Model, Rodzaj_paliwa, Pojemnosc_silnika FROM ".$nazwaTabSamochod." WHERE Rodzaj_samochodu=? AND ID_Oddzial=?;");
	$stmt->bindParam(1, $wybrany_rodzaj_samochodu, PDO::PARAM_STR);
	$stmt->bindParam(2, $wybrany_oddzial_id, PDO::PARAM_INT);
	$stmt->execute();
	
	while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
			
		echo $rekord['ID_Samochod'] . "|" . $rekord['Marka'] . "|" . $rekord['Model'] . "|" . $rekord['Rodzaj_paliwa'] . "|" . $rekord['Pojemnosc_silnika'] . "|";	
	}
}	

 
/********************************************* Wybrany Samochod ***********************************/

		

/*******************************************   Wypisanie listy oddziałów   ************/

if(isset($_GET['rodzaj'])) {
	$rodzaj = $_GET['rodzaj'];
	
	if ($rodzaj === 'oddzialy') {
		
		$stmt = $dbh->query("SELECT ID_Oddzial, Nazwa_oddzialu FROM ".$nazwaTabOddzial.";");
		
		while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo $rekord['ID_Oddzial'] . "|" . $rekord['Nazwa_oddzialu'] . "|";
		}
	}
	
	else if ($rodzaj === 'oddzialy_kontakt') {
		$stmt = $dbh->query("SELECT Nazwa_oddzialu, Miasto, Ulica, Telefon, Email FROM ".$nazwaTabOddzial.";");
		
		while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo $rekord['Nazwa_oddzialu'] . "|" . $rekord['Miasto'] . "|" . $rekord['Ulica'] . "|" . $rekord['Telefon'] . "|" . $rekord['Email'] . "|";
		}
	}
	
	else if ($rodzaj === 'oddzial_adres') {
		$stmt = $dbh->query("SELECT Miasto, Ulica FROM ".$nazwaTabOddzial.";");
		$rekord = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $rekord['Miasto'] . ", " . $rekord['Ulica'];
	}

	else if ($rodzaj === 'czy_zalogowany') {
		if (isset($_SESSION['login'])) {	
			$czy_zalogowany = $_SESSION['login'];	
			echo $czy_zalogowany;
		}		
	}

	else if ($rodzaj === 'dane_klienta') {
		$stmt = $dbh->prepare("SELECT Imie, Nazwisko, Pesel, Telefon, Email FROM ".$nazwaTabKlient." WHERE Pesel=?;");
		$stmt->bindParam(1, $_SESSION['pesel'], PDO::PARAM_STR);
		$stmt->execute();
		$rekord = $stmt->fetch(PDO::FETCH_ASSOC);
		echo $rekord['Imie'] . "|" . $rekord['Nazwisko'] . "|" . $rekord['Pesel'] . "|" . $rekord['Telefon'] . "|" . $rekord['Email'];
	}
	
	else if ($rodzaj === 'wybrany_samochod_dane') {
		$wybrany_samochod_id = $_GET['wybrany_samochod_id'];	
		
		$stmt = $dbh->prepare("SELECT Marka, Model, Rodzaj_paliwa, Pojemnosc_silnika, Moc_silnika, Rocznik, Kolor FROM ".$nazwaTabSamochod." WHERE ID_Samochod=?;");
		$stmt->bindParam(1, $wybrany_samochod_id, PDO::PARAM_STR);
		$stmt->execute();
		$rekord = $stmt->fetch(PDO::FETCH_ASSOC);
			
		echo $rekord['Marka'] . "|" . $rekord['Model'] . "|" . $rekord['Rodzaj_paliwa'] . "|" . $rekord['Pojemnosc_silnika'] . "|" . $rekord['Moc_silnika'] . "|" . $rekord['Rocznik'] . "|" . $rekord['Kolor'] . "|";
	}
	
	else if ($rodzaj === 'wybrany_samochod_rezerwacje') {
		$wybrany_samochod_id = $_GET['wybrany_samochod_id'];	
	
		$stmt = $dbh->prepare("SELECT Data_rezerwacji FROM ".$nazwaTabRezerwacja. " WHERE ID_Samochod=?;");
		$stmt->bindParam(1, $wybrany_samochod_id, PDO::PARAM_STR);
		$stmt->execute();
		while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo $rekord['Data_rezerwacji'] . "|";
		}
	}
	
	else if ($rodzaj === 'rezerwacje_klienta') {
		$stmt = $dbh->prepare("SELECT ID_Oddzial, ID_Samochod, Data_rezerwacji FROM ".$nazwaTabRezerwacja." WHERE ID_Klient=?;");
		$stmt->bindParam(1, $_SESSION['idKlienta'], PDO::PARAM_INT);
		$stmt->execute();		
		while($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {
								
			$stmt2 = $dbh->prepare("SELECT Nazwa_oddzialu, Miasto, Ulica, Telefon, Email FROM ".$nazwaTabOddzial." WHERE ID_Oddzial=?;");
			$stmt2->bindParam(1, $rekord['ID_Oddzial'], PDO::PARAM_INT);
			$stmt2->execute();
			$rekord2 = $stmt2->fetch(PDO::FETCH_ASSOC);
		
			$stmt3 = $dbh->prepare("SELECT Marka, Model, Rodzaj_paliwa, Pojemnosc_silnika, Moc_silnika, Rocznik, Kolor, Rodzaj_samochodu FROM ".$nazwaTabSamochod." WHERE ID_Samochod=?;");
			$stmt3->bindParam(1, $rekord['ID_Samochod'], PDO::PARAM_INT);
			$stmt3->execute();
			$rekord3 = $stmt3->fetch(PDO::FETCH_ASSOC);
			
			echo $rekord['Data_rezerwacji'] . "|" . $rekord3['Marka'] . "|" . $rekord3['Model'] . "|" . $rekord3['Rodzaj_paliwa'] . "|" . $rekord3['Pojemnosc_silnika'] . "|" . $rekord3['Moc_silnika'] . "|" . $rekord3['Rocznik'] . "|" . $rekord3['Kolor'] . "|" . $rekord3['Rodzaj_samochodu'] . "|" . $rekord2['Nazwa_oddzialu'] . "|" . $rekord2['Miasto'] . "|" . $rekord2['Ulica'] . "|" . $rekord2['Telefon'] . "|" . $rekord2['Email'] . "|";
			 
		}
			 
			  		
		
	}
	

}

/*
if(isset($_GET['oddzial'])) {
	$id = $_GET['oddzial'];
		$stmt
*/	





/*

if(isset($_POST['nazwa_oddzialu_z_menu'])) {
	$nazwa_oddzialu_z_menu = $_POST['nazwa_oddzialu_z_menu'];
	
	$_SESSION["nazwa_oddzialu_z_menu"] = $nazwa_oddzialu_z_menu;
}

*/





?>










