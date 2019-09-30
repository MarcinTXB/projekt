<?php
        //session_start();
	//include('main.php');
?>

<html>
<head>	
	<link rel="stylesheet" type="text/css" href="../css/style_logowanie_admin.css">                
</head>	

<body> <!--onunload="logoutFunction()"-->	
			
	<div class="container">		
		<div class="header">
			<div class="title">
				Formularz logowania administratora
			</div>
		</div>					
		<div class="content">
			<div id="formularz_logowania">			
				<form method="POST" action="../Logowanie_Admin.php">									
					<div class="formline">
						Login :&nbsp; &nbsp; <input type="text" name="loginadmin" size="30" autofocus/>
					</div>			
					<div class="formline">
						Hasło :&nbsp; &nbsp; <input type="password" name="usrpass" size="30"/>
					</div>							
					<div class="formline2">
						<input type="submit" name="f_logowanie_admin_submit" value="Potwierdź"/>					
					</div>							
				</form>
			</div>
			<div id="rest">				
			</div>		
		</div>					
	</div>
</body>	
</html>









