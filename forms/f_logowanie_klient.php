<?php
        session_start();
	//include('main.php');
?>
	


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/style_klient.css">                
</head>	

<body> <!--onunload="logoutFunction()"-->
	
	
			
	<div class="container">		
		<div class="title">Formularz logowania</div>			
				
		<form method="post" action="../Logowanie_Klient.php"/>			
			<div style="height:25px;">Twoje imię :  &nbsp; 
				<input type="text" id="imieform" name="imie" size="30" autofocus/>
			</div>			
			<div style="height:25px;">Twój pesel : &nbsp;
				<input type="text" id="peselform" name="pesel" size="30"/>
			</div>			
			<div style="height:25px;">Twoje hasło :
				<input type="password" id="passwordform" name="usrpass" size="30"/>
			</div>							
			<div style="height:75px;">
				<input type="submit" name="f_logowanie_klient_submit" value="Potwierdź"/>					
			</div>		
		</form>
		
		<?php
			foreach ($_SESSION as $key=>$val)
				echo $key." ".$val."<br/>";
		?>				
	</div>
</body>	
</html>


