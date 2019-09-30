<?php

try{	
        session_start();	
}
catch(Exception $e){}

include('autoload.php');

header('Location:./forms/f_logowanie_admin.php');


?>
