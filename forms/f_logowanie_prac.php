<?php
        
        /*
try{	
        session_start();	
}
catch(Exception $e){}




include('autoload.php');
	
	*/
	
	//include('main.php');
	
	
?>

<html>
<head>	
	<link rel="stylesheet" type="text/css" href="../css/style_logowanie_prac.css">                
</head>	

<body> <!--onunload="logoutFunction()"-->	

	
			
	<div class="container">		
		<div class="header">
			<div class="title">
				Formularz logowania
			</div>
		</div>					
		<div class="content">
			<div class="formularze">		
				<form method="POST" action="../Logowanie_Prac.php">									
					<div class="formline">
						Login :&nbsp; &nbsp; <input type="text" name="loginprac" size="30" autofocus/>
					</div>			
					<div class="formline">
						Hasło :&nbsp; &nbsp; <input type="password" name="pracpass" size="30"/>
					</div>
					<div class="formline2">				
						<input type="submit" name="f_logowanie_prac_submit" value="Potwierdź"/>					
					</div>							
				</form>
			</div>
			<div id="rest">
			</div>
		</div>					
	</div>
</body>	
</html>









