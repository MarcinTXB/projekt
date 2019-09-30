<?php

try{
        session_start();
}
catch(Exception $e){};

include('./Oddzial.php');

include('./NewConnection.php');

$nazwaTabOddzial = 'Oddzial';

$action = $_GET['action'];


class Oddzial_Action extends Oddzial {	
	
	function __construct($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email) {
		parent::__construct($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email);		
	}	
		
	function dodajOddzial($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email, $dbh, $nazwaTabOddzial){
		$stmt = $dbh->prepare("INSERT INTO " . $nazwaTabOddzial . " (Symbol_oddzialu, Nazwa_oddzialu, Miasto, Ulica, Telefon, Email) values (?,?,?,?,?,?)");
		$resp = $stmt->execute(array($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email));
		if ($resp) return true;
		else return false;
	}
}


$dbh = (new NewConnection())->getCon();	
	
/*	
if ($action === 'lista'){
										
	listaOddzialow($dbh, $nazwaTabOddzial);
} */	
	
	
if(isset($_POST['f_dodanie_oddzialu_submit'])) {
	$symbol_oddzialu = $_POST['symbol_oddzialu'];
	$nazwa_oddzialu	= $_POST['nazwa_oddzialu'];
	$miasto	= $_POST['miasto'];
	$ulica = $_POST['ulica'];
	$telefon = $_POST['telefon'];
	$email = $_POST['email'];                         		
	
	if ($action === 'dodanie'){
		$oddzialAction = new Oddzial_Action($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email);
		$oddzialAction->dodajOddzial($symbol_oddzialu, $nazwa_oddzialu, $miasto, $ulica, $telefon, $email, $dbh, $nazwaTabOddzial);
	}
	
	header('Location:./main_admin.php');
	
}
	

	