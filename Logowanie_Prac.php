<?php

try{
        session_start();
}
catch(Exception $e){}

include('./autoload.php');


class Logowanie_Prac {
	private $loginprac, $password;
	private $stanowisko, $imie, $nazwisko, $pesel, $telefon, $email, $id_klient, $ses_id;
	public $nazwaTabPrac = 'Pracownik';
	
	function __construct($loginprac, $password=''){
		$this->loginprac = $loginprac;
		$this->password	  = $password;		
	}
	
	function checkAccount($dbh, $nazwaTabPrac){
		$confirm = false;
		try{			
			$sth = $dbh->prepare("SELECT ID_Pracownik, LoginPrac, Stanowisko, Imie, Nazwisko, Pesel, Telefon, Email, PracPass, SesID FROM " . $nazwaTabPrac . " WHERE LoginPrac=?");
			$sth->bindParam(1, $this->loginprac, PDO::PARAM_STR);			
			if($sth->execute()){
				$res = $sth->fetch(PDO::FETCH_ASSOC);
				
				if(password_verify($this->password, $res['PracPass'])){
					$this->loginprac	= $res['LoginPrac'];
					$this->stanowisko	= $res['Stanowisko'];		
					$this->imie		= $res['Imie'];
					$this->nazwisko		= $res['Nazwisko'];
					$this->pesel		= $res['Pesel'];
					$this->telefon		= $res['Telefon'];
					$this->email		= $res['Email'];
					$this->id_pracownika	= $res['ID_Pracownik'];
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
	
	public function getLoginPrac(){
		return $this->loginprac;
	}	
	public function getStanowisko(){
		return $this->stanowisko;
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
	public function getIdPracownika(){
		return $this->id_pracownik;
	}
	public function getSessID(){
		return $this->ses_id;
	}
	
	function update_sesID($sessionid, $dbh, $id, $nazwaTabeli){
                $sth = $dbh->prepare("UPDATE " . $nazwaTabeli . " SET SesID=:sesid WHERE ID_Pracownik=:id");												 
                $sth->execute(array( ":sesid"=>$sessionid, ":id"=>$id ));
        }			
}

if(isset($_POST['f_logowanie_prac_submit'])){
	
	
		
	$loginprac	= $_POST['loginprac'];
	$password	= $_POST['pracpass'];

	

	$i = 0;
	$array = array();
	
	$validator	= new Pracownik($loginprac, $password);
	$validator->validateImie($loginprac);
	//$validator->validateUsrpass($password);
	
	foreach($validator->getCount() as $count){
		switch($count){
			case 0:
				$array[$i++]="Niewłaściwy login";				
				break;
			case 1:
				$array[$i++]="Niewłaściwe hasło";
				break;
			default:
				break;
		}
	}
	
	if($validator->s==0){
		$login = new Logowanie_Prac($loginprac, $password);
		$dbh = (new NewConnection())->getCon();	
		$resp = $login->checkAccount($dbh, 'Pracownik');	
		if($resp===false) {
			$array[$i++]='Niewłaściwa kombinacja';
		}
	}
	
  	
	if($array != NULL){
		
		$_SESSION['error']=json_encode($array);
/*		header("Location:./forms/f_logowanie_prac.php"); */
	}
	
	else {		
		$seloginprac	= $login->getLoginPrac();
		$sestanowisko	= $login->getStanowisko();		
		$seimie		= $login->getImie();
		$senazwisko	= $login->getNazwisko();
		$sepesel	= $login->getPesel();
		$setelefon	= $login->getTelefon();		
		$seemail	= $login->getEmail();
		$seidPracownika	= $login->getIdPracownika();
		$sesid		= $login->getSessID();
		if($sesid != $_COOKIE['sessionid']){
			$_SESSION['report']=true;
		}
		session_regenerate_id();		
		$_SESSION['loginsetprac'] = true;
		$_SESSION['loginprac']	  = $loginprac;
		$_SESSION['stanowisko']   = $sestanowisko;
		$_SESSION['imieprac']	  = $seimie;
		$_SESSION['nazwiskoprac'] = $senazwisko;
		$_SESSION['peselprac']	  = $sepesel;
		$_SESSION['telefonprac']  = $setelefon;
		$_SESSION['emailprac']	  = $seemail;
		$_SESSION['idPracownika'] = $seidPracownika;		
		//setcookie('addr',$seaddr);
                $login->update_sesID(session_id(), $dbh, $seidPracownika, 'Pracownik');
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
	
		header('Location:./main_prac.php');			// moje
	}		
}

?>


