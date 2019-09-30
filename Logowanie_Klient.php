<?php

try{
        session_start();
}
catch(Exception $e){}

include('./autoload.php');

class Logowanie_Klient {
	private $imie, $pesel, $password;
	private $nazwisko, $telefon, $email, $id_klienta, $ses_id;
	public $nazwaTabKlient = 'Klient';
	
	function __construct($imie='', $pesel='', $password=''){
		$this->imie     = $imie;
		$this->pesel	= $pesel;
		$this->password	= $password;		
	}
	
	function checkAccount($dbh, $nazwaTabKlient){
		$confirm = false;
		try{			
			$sth = $dbh->prepare("SELECT ID_Klient, Imie, Nazwisko, Pesel, Telefon, Email, UsrPass, SesID FROM " . $nazwaTabKlient . " WHERE Imie=? AND Pesel=?");
			$sth->bindParam(1, $this->imie, PDO::PARAM_STR);
			$sth->bindParam(2, $this->pesel, PDO::PARAM_STR);
			if($sth->execute()){
				$res = $sth->fetch(PDO::FETCH_ASSOC);
				
				if(password_verify($this->password, $res['UsrPass'])){
					$this->nazwisko		= $res['Nazwisko'];
					$this->telefon		= $res['Telefon'];
					$this->email		= $res['Email'];
					$this->id_klienta	= $res['ID_Klient'];
					$this->ses_id		= $res['SesID'];
					$confirm=true;
				}
			}		
			return $confirm;				
		}		
		catch(Exception $e){
                	print_r($e->getMessage());
			return $confirm;
                
		}
                
                //finally {
                //	return $confirm;
		//}
		
	}
	
	public function getImie(){
		return $this->imie;
	}	
	public function getNazwisko(){
		return $this->nazwisko;
	}	
	public function getPesel(){
		return $this->pesel;
	}
	public function getTelefon(){
		return $this->telefon;
	}	
	public function getEmail(){
		return $this->email;
	}
	public function getIdKlienta(){
		return $this->id_klienta;
	}
	public function getSessID(){
		return $this->ses_id;
	}
	
	function update_sesID($sessionid, $dbh, $id, $nazwaTabeli){
                $sth = $dbh->prepare("UPDATE " . $nazwaTabeli . " SET SesID=:sesid WHERE ID_Klient=:id");												 
                $sth->execute(array( ":sesid"=>$sessionid, ":id"=>$id ));
        }			
}

if(isset($_POST['f_logowanie_klient_submit'])){	

	echo 'foo';

	$imie		= $_POST['imie'];
	$pesel	 	= $_POST['pesel'];
	$password	= $_POST['usrpass'];

	echo "$imie $pesel";

	$i = 0;
	$array = array();
	
	$validator	= new Rejestracja_Klient($imie, $pesel, $password);
	$validator->validateImie($imie);
	$validator->validatePesel($pesel);
	//$validator->validateUsrpass($password);
	
	foreach($validator->getCount() as $count){
		switch($count){
			case 0:
				$array[$i++]="Niewłaściwe imie";
				print_r('0');
				break;
			case 1:
				$array[$i++]="Niewłaściwy pesel";
				print_r('1');
				break;
			case 2:
				$array[$i++]="Niewłaściwe hasło";
				print_r('2');
				break;
			default:
				print_r('default');
				break;
		}
	}
	
	if($validator->s==0){
		$login = new Logowanie_Klient($imie, $pesel, $password);
		$dbh = (new NewConnection())->getCon();	
		$resp = $login->checkAccount($dbh, 'Klient');	
		if($resp===false) {
			$array[$i++]='Niewłaściwa kombinacja';
		}
	}
	
  	
	if($array != NULL){
		echo 'ifnull';
		$_SESSION['error']=json_encode($array);
		header("Location:./forms/f_logowanie_klient.php");
	}
	
	else {
		echo 'ifelse';		
		$seimie		= $login->getImie();
		$senazwisko	= $login->getNazwisko();
		$sepesel	= $login->getPesel();
		$setelefon	= $login->getTelefon();		
		$seemail	= $login->getEmail();
		$seidKlienta	= $login->getIdKlienta();
		$sesid		= $login->getSessID();
		if($sesid != $_COOKIE['sessionid']){
			$_SESSION['report']=true;
		}
		session_regenerate_id();
		$_SESSION['login']	= true;
		$_SESSION['imie']	= $seimie;
		$_SESSION['nazwisko']	= $senazwisko;
		$_SESSION['pesel']	= $sepesel;
		$_SESSION['telefon']	= $setelefon;
		$_SESSION['email']	= $seemail;
		$_SESSION['idKlienta']	= $seidKlienta;		
		
		//setcookie('addr',$seaddr);
		
		setcookie('idKlienta', $seidKlienta);
		
		$login->update_sesID(session_id(), $dbh, $seidKlienta, 'Klient');
                //$url=$_SESSION['from'];
                //unset($_SESSION['from']);
                //$_SESSION['from']=NULL;
                //header('Location:./'.$url);
                
                                
                
         	//echo "Zmienna sesyjna nazwisko jest $_SESSION['nazwisko']";        
	
                //$_SESSION['login']	= false;		// moje
                //if(isset($_SESSION)){				// moje
		//	foreach ($_SESSION as $key=>$sess){	// moje
		//		$_SESSION[$key]=NULL;		// moje
		//		unset($_SESSION[$key]);		// moje
		//	}					// moje
		//}						// moje
	
		header('Location:./index_klient.php');			// moje
	}		
}

?>


