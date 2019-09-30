<?php
	$user = $_GET['user'];

	session_start();

	
	

	if(isset($_SESSION)){
		session_unset();
		session_destroy();
	
	
	//	foreach ($_SESSION as $key=>$sess){
	//		$_SESSION[$key]=NULL;
	//		unset($_SESSION[$key]);
	//	}
	}
	
	if ($user === 'admin') header('Location:./index_admin.php');
	else if ($user === 'prac') header('Location:./index_prac.php');
	else if ($user === 'klient') header('Location:./index_klient.php'); 
?>
	