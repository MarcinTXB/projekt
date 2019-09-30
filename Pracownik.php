<?php

/*
try{
        session_start();
}
catch(Exception $e){};
  
 * */
   

include('./autoload.php');
include('./Adres.php');
include('./NewConnection.php');

$nazwaTabPrac = 'Pracownik';

$nazwaTabOddzial = 'Oddzial';


/*

?>


<html>
<head>

	<script src="./js/jquery-1.11.2.js"></script>
	<script src="./js/jquery-migrate-1.2.1.js"></script>
	<script src="./js/jquery-1.11.1.min.js"></script>
	
</head>
<body>
	


<?php

*/

class Pracownik {
        private $count  = array();		
        public  $s      = 0;
	public $loginprac, $stanowisko, $oddzial, $imie, $nazwisko, $pesel, $miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania, $nr_telefonu, $email, $pracpass, $id_Adres, $id_Oddzial;	
	public static $nazwaTabPrac = 'Pracownik';			
	public $nazwaTabOddzial = 'Oddzial';
		
	function __construct($loginprac='', $stanowisko='', $oddzial='', $imie='',$nazwisko='',$pesel='',$miasto='',$rodzaj_ulicy='',$ulica='',$nr_budynku='',$nr_mieszkania='',$nr_telefonu='',$email='',$pracpass='',$id_Adres=''){				
		$this->loginprac     = $loginprac;		
		$this->stanowisko    = $stanowisko;	
		$this->oddzial       = $oddzial;
		$this->imie          = $imie;	
		$this->nazwisko      = $nazwisko;	
		$this->pesel         = $pesel;
		$this->miasto        = $miasto; 
		$this->rodzaj_ulicy  = $rodzaj_ulicy; 
		$this->ulica         = $ulica;
		$this->nr_budynku    = $nr_budynku; 
		$this->nr_mieszkania = $nr_mieszkania;			
		$this->nr_telefonu   = $nr_telefonu;	
		$this->email         = $email;	
		$this->pracpass      = $pracpass;
		$this->id_Adres      = $id_Adres;
	}
        function setCount($c){
                $this->count[$this->s++]=$c;
        }
        function getCount(){
                return $this->count;
        }        
	function validateImie($imie){
		if(preg_match('/^[a-zA-Z]{2,}$/', $imie)){
			return true;
			echo "<script>alert('Imię jest dobre');</script>";
                }
		else {
			$this->setCount(0); 
			echo "<script>alert('Imię nie jest dobre');</script>";
                }		
	}
	function validateNazwisko($nazwisko){	        
		if(preg_match('/^[a-zA-Z]{2,}(-[a-zA-Z]{2,})?$/', $nazwisko)){
		        return true;                
                	echo "<script>alert('Nazwisko jest dobre');</script>";
                }
		else {
			$this->setCount(1);         
			echo "<script>alert('Nazwisko nie jest dobre');</script>";
                }
	}
	function validatePesel($pesel){
		if(preg_match('/^[0-9]{11}$/', $pesel)){
		        return true;
			echo "<script>alert('Pesel jest dobry');</script>";
                }
		else {
			$this->setCount(2); 
			echo "<script>alert('Pesel nie jest dobry');</script>";
                }
	}	
	function validateNrtelefonu(){}
	function validateEmail(){}
	function validatePracpass(){}	
	
	function inicjujPracownika($dbh, $nazwaTabPrac, $nazwaTabOddzial, $oddzial){
			
		$size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
		$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv($size, MCRYPT_DEV_URANDOM),
		];
		$hash = password_hash($this->pracpass, PASSWORD_BCRYPT, $options);				
		$this->id_Adres = $dbh->lastInsertId();
				
		$sth = $dbh->prepare("SELECT ID_Oddzial FROM ".$nazwaTabOddzial." WHERE Nazwa_oddzialu=?;");
		$sth->bindParam(1, $oddzial, PDO::PARAM_STR);
		$sth->execute();		
		$row = $sth->fetch(PDO::FETCH_ASSOC);
		$this->id_Oddzial = $row['ID_Oddzial'];		
						
		$sth = $dbh->prepare("INSERT INTO " . $nazwaTabPrac . " (ID_Adres, ID_Oddzial, LoginPrac, Stanowisko, Imie, Nazwisko, Pesel, Telefon, Email, PracPass, SesID) values (?,?,?,?,?,?,?,?,?,?,?)");
		$resp = $sth->execute(array($this->id_Adres, $this->id_Oddzial, $this->loginprac, $this->stanowisko, $this->imie, $this->nazwisko, $this->pesel, $this->nr_telefonu, $this->email, $hash, session_id()));
		if($resp) return true;
		else return false;
	}	
	
	function inicjujPracownikaAdrIst($dbh, $nazwaTabPrac, $nazwaTabOddzial, $oddzial, $miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania){	// Jeśli taki adres już istnieje
				
		$size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
		$options = [
			'cost' => 11,
			'salt' => mcrypt_create_iv($size, MCRYPT_DEV_URANDOM),
		];
		$hash = password_hash($this->pracpass, PASSWORD_BCRYPT, $options);		
		$sth = $dbh->prepare("SELECT ID_Adres FROM ".Adres::$nazwaTabAdres." WHERE Miasto=? AND Ulica=? AND Nr_budynku=? AND Nr_mieszkania=?"); 
		$sth->bindParam(1, $miasto, PDO::PARAM_STR);
		$sth->bindParam(2, $ulica, PDO::PARAM_STR);
		$sth->bindParam(3, $nr_budynku, PDO::PARAM_STR);
		$sth->bindParam(4, $nr_mieszkania, PDO::PARAM_STR);
		$sth->execute();		
		$this->id_Adres = $sth->fetchColumn();
						
		$sth = $dbh->prepare("SELECT ID_Oddzial FROM ".$nazwaTabOddzial." WHERE Nazwa_oddzialu=?;");
		$sth->bindParam(1, $oddzial, PDO::PARAM_STR);
		$sth->execute();		
		$row = $sth->fetch(PDO::FETCH_ASSOC);	
		$this->id_Oddzial = $row['ID_Oddzial'];		
		
		$sth = $dbh->prepare("INSERT INTO ".$nazwaTabPrac." (ID_Adres, ID_Oddzial, LoginPrac, Stanowisko, Imie, Nazwisko, Pesel, Telefon, Email, PracPass, SesID) values (?,?,?,?,?,?,?,?,?,?,?)");	
		$resp = $sth->execute(array($this->id_Adres, $this->id_Oddzial, $this->loginprac,$this->stanowisko, $this->imie, $this->nazwisko, $this->pesel, $this->nr_telefonu, $this->email, $hash, session_id()));
		if($resp) return true;
		else return false;
	}	
	
	function sprawdzPracownika($dbh, $nazwaTabPrac){		
		try{
			$sth = $dbh->prepare("SELECT ID_Pracownik, Imie, Nazwisko FROM ".$nazwaTabPrac." WHERE Pesel=?");
			$sth->bindParam(1, $this->pesel, PDO::PARAM_STR);
			if($sth->execute()){
				if($sth->fetch(PDO::FETCH_ASSOC)){
					return true;
				}
				else return false;
			}
			else return false;
		}
		catch (Exception $e){ print_r($e->getMessage()); }
	}
}

if(isset($_POST['f_Pracownik_submit'])){
	$rejPracownika = new Pracownik();
	$rejAdresu     = new Adres();
	$loginprac     = $_POST['loginprac'];
	$stanowisko    = $_POST['stanowisko'];
	$oddzial       = $_POST['oddzial'];	
	$imie          = $_POST['imie'];
	$nazwisko      = $_POST['nazwisko'];
	$pesel         = $_POST['pesel'];
	$miasto        = $_POST['miasto'];
	$rodzaj_ulicy  = $_POST['rodzaj_ulicy'];
	$ulica         = $_POST['ulica'];
	$nr_budynku    = $_POST['nr_budynku'];
	$nr_mieszkania = $_POST['nr_mieszkania'];
	$nr_telefonu   = $_POST['nr_telefonu'];
	$email         = $_POST['email'];
	$pracpass      = $_POST['pracpass'];
        $i      = 0;
        $array  = array();
	$rejPracownika->validateImie($imie);
	$rejPracownika->validateNazwisko($nazwisko);
	$rejPracownika->validatePesel($pesel);		
        /*$rejAdresu->validateMiasto($miasto);*/         
        foreach($rejPracownika->getCount() as $count)
                switch($count){ 
			case 0: $array[$i++]='Niewłaściwy login.';
				break;
                        case 1: $array[$i++]='Niewłaściwa forma imienia.';
                                break;
                        case 2: $array[$i++]='Niewłaściwa forma nazwiska.';
                                break;
                        case 3: $array[$i++]='Niewłaściwy pesel.';
                                break;
                        case 6: $array[$i++]='Niewłaściwa nazwa miasta.';
                                break;
                        default:$array[$i++]='Inny błąd.';
                                break;                                
                }
		
        if($rejPracownika->s==0){
        		
                $pracownik = new Pracownik($loginprac, $stanowisko, $oddzial, $imie, $nazwisko, $pesel, $miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania, $nr_telefonu, $email, $pracpass, $id_Adres='');		               
		$dbh = (new NewConnection())->getCon();                	
                if($pracownik->sprawdzPracownika($dbh,'Pracownik')===false){				
	               	if(Adres::sprawdzAdres($dbh, 'Adres', $miasto, $ulica, $nr_budynku, $nr_mieszkania)===false){ /* Gdy adresu jeszcze nie ma */
	        		$rejestrAdres = new Adres($miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania);       			
	               		$comitAdres = $rejestrAdres->inicjujAdres($dbh, 'Adres');
				if($comitAdres === false) $array[$i++]='Błąd połączenia z bazą danych.';
				$comit = $pracownik->inicjujPracownika($dbh,'Pracownik', $nazwaTabOddzial, $oddzial);								
			}
			else {					
				$comit = $pracownik->inicjujPracownikaAdrIst($dbh,'Pracownik', $nazwaTabOddzial, $oddzial, $miasto, $rodzaj_ulicy, $ulica, $nr_budynku, $nr_mieszkania);				
			}					 
			if($comit === false) $array[$i++]='Błąd połączenia z bazą danych.';
			else {
				setcookie('sessionid', session_id());
				header('Location:./main_admin.php');
			}
		}
		else $array[$i++]='Taki pesel już istnieje w bazie.';


		

	}
                	
			
		





			
			
                       
}?>



</body>
</html>	






