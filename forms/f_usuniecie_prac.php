<html>
<head>	
	<link rel="stylesheet" type="text/css" href="../css/style_logowanie_prac.css">                
</head>	

<body> <!--onunload="logoutFunction()"-->	

	
			
	<div class="container">		
		<div class="header">
			<div class="title">
				Usuwanie pracownika
			</div>
		</div>					
		<div class="content">
			<div class="formularze">		
				<form method="POST" action="../Pracownik_Action.php">									
					<div class="formline">
						Login pracownika :&nbsp; &nbsp; <input type="text" name="loginprac" size="30" autofocus/>
					</div>
					<div class="formline2">				
						<input type="submit" name="f_usuniecie_prac_submit" value="Potwierdź"/>					
					</div>							
				</form>
			</div>
			<div id="rest">
			</div>
		</div>					
	</div>
</body>	
</html>
