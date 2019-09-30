<?php

class Adres {
	public $miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania;
	public static $statmiasto, $statulica, $statnr_budynku, $statnr_mieszkania;	
	public static $nazwaTabAdres = 'Adres';
		
	function __construct($miasto='', $rodzaj_ulicy='', $ulica='', $nr_budynku='', $nr_mieszkania=''){
		$this->miasto        = $miasto;
		$this->rodzaj_ulicy  = $rodzaj_ulicy;
		$this->ulica         = $ulica;
		$this->nr_budynku    = $nr_budynku;
		$this->nr_mieszkania = $nr_mieszkania;
	}

	/*	
	function validateMiasto($miasto){
		if(preg_match('/^[a-zA-Z]{2,}(-[a-zA-Z]{2,})?$/', $miasto)){
		        return true;
			echo "<script>alert('Miasto jest dobre');</script>";
		}	               
		else {
		        $this->setCount(3); 
                        echo "<script>alert('Miasto nie jest dobre');</script>";
                }
	} */
	
	function validateUlica(){}
	function validateNrbudynku(){}
	function validateNrmieszkania(){}
	
	function inicjujAdres($dbh, $nazwaTabAdres){
		$sth = $dbh->prepare("INSERT INTO ".$nazwaTabAdres." (Miasto, Rodzaj_ulicy, Ulica, Nr_budynku, Nr_mieszkania) values (?,?,?,?,?)");
		$resp = $sth->execute(array($this->miasto, $this->rodzaj_ulicy, $this->ulica, $this->nr_budynku, $this->nr_mieszkania));
		if($resp) return true;
		else return false;
	}		
	
	public static function sprawdzAdres($dbh, $nazwaTabAdres, $miasto, $ulica, $nr_budynku, $nr_mieszkania){
		var_dump('true2');
		try{
			var_dump($miasto);
			$sth = $dbh->prepare("SELECT Miasto FROM Adres WHERE Miasto=? AND Ulica=? AND Nr_budynku=? AND Nr_mieszkania=?");
			$sth->bindValue(1, $miasto, PDO::PARAM_STR);
			$sth->bindValue(2, $ulica, PDO::PARAM_STR);
			$sth->bindValue(3, $nr_budynku, PDO::PARAM_STR);
			$sth->bindValue(4, $nr_mieszkania, PDO::PARAM_STR);
			if($sth->execute()){								
				if($sth->fetch(PDO::FETCH_ASSOC)){
					var_dump('true');						
					return true;						
				}
				else {
					var_dump('false');
					//var_dump($sth->fetch(PDO::FETCH_ASSOC));
					return false;
				}
			}
			else {
				var_dump('false2');
				return false;
			}
		}
		catch (Exception $e) { print_r($e->getMessage()); }
	}
}?>
