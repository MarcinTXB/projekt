<?php 

try{	
	session_start();	
}
catch(Exception $e){}

//include('./autoload.php');

?>



<!DOCTYPE html>
<html>
<head>	
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="./css/style_klient.css">
        	
</head>
<body>
	<?php include('./main_klient.php'); ?>	
</body>
</html>