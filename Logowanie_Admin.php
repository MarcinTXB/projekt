<?php

try{
        session_start();
}
catch(Exception $e){}

include('./autoload.php');


class Logowanie_Admin {
	private $loginadmin, $password;
	private $imie, $nazwisko, $id_admin, $ses_id;
	public $nazwaTabAdmin = 'Admin';
	
	function __construct($loginadmin, $password=''){
		$this->loginadmin = $loginadmin;
		$this->password	  = $password;		
	}
	
	function checkAccount($dbh, $nazwaTabAdmin){
		$confirm = false;
		try{			
			$sth = $dbh->prepare("SELECT ID_Admin, LoginAdmin, Imie, Nazwisko, AdminPass, SesID FROM " . $nazwaTabAdmin . " WHERE LoginAdmin=?");
			$sth->bindParam(1, $this->loginadmin, PDO::PARAM_STR);			
			if($sth->execute()){
				$res = $sth->fetch(PDO::FETCH_ASSOC);
				
				if(password_verify($this->password, $res['AdminPass'])){
					$this->imie		= $res['Imie'];
					$this->nazwisko		= $res['Nazwisko'];					
					$this->id_admin		= $res['ID_Admin'];
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
	
	public function getLoginAdmin(){
		return $this->loginadmin;
	}	
	public function getImie(){
		return $this->imie;
	}	
	public function getNazwisko(){
		return $this->nazwisko;
	}	
	public function getIdAdmin(){
		return $this->id_admin;
	}
	public function getSessID(){
		return $this->ses_id;
	}
	
	function update_sesID($sessionid, $dbh, $id, $nazwaTabeli){
                $sth = $dbh->prepare("UPDATE " . $nazwaTabeli . " SET SesID=:sesid WHERE ID_Admin=:id");												 
                $sth->execute(array( ":sesid"=>$sessionid, ":id"=>$id ));
        }			
}

if(isset($_POST['f_logowanie_admin_submit'])){



	$loginadmin	= $_POST['loginadmin'];
	$password	= $_POST['adminpass'];	



	$i = 0;
	$array = array();
	
	$validator	= new Rejestracja_Admin($loginadmin, $password);
	$validator->validateLogin($loginadmin);
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
		$login = new Logowanie_Admin($loginadmin, $password);
		$dbh = (new NewConnection())->getCon();	
		$resp = $login->checkAccount($dbh, 'Admin');	
		if($resp===false) {
			$array[$i++]='Niewłaściwa kombinacja';
		}
	}	
  	
	if($array != NULL){
		
		$_SESSION['error']=json_encode($array);
		header("Location:./forms/f_logowanie_admin.php");
	}
	
	else {		
		$seloginadmin	= $login->getLoginAdmin();		
		$seimie		= $login->getImie();
		$senazwisko	= $login->getNazwisko();		
		$seidAdmin	= $login->getIdAdmin();
		$sesid		= $login->getSessID();
		if($sesid != $_COOKIE['sessionid']){
			$_SESSION['report']=true;
		}
		session_regenerate_id();		
		$_SESSION['loginadmins']   = true;
		$_SESSION['loginadmin']	   = $loginadmin;
		$_SESSION['imieadmin']	   = $seimie;
		$_SESSION['nazwiskoadmin'] = $senazwisko;
		$_SESSION['idAdmin'] 	   = $seidAdmin;		
		//setcookie('addr',$seaddr);
                $login->update_sesID(session_id(), $dbh, $seidAdmin, 'Admin');
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
	
		header('Location:./main_admin.php');			// moje
	}		
}

?>


