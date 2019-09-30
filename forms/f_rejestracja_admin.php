<?php
	session_start();
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_rejestr_admin.css">	
</head>	
<body>

	<div class="container">
		<div class="header">
			<div class="title">
				Formularz rejestracji administratora
			</div>
		</div>
		<div class="content">								 
			<form method="POST" action="../Rejestracja_Admin.php">
				<table class="formularze">
					<tr style="height:30px;">
						<td>Login :</td>
						<td><input type="text" name="loginadmin" size="30" autofocus/></td>
					</tr>
					<tr style="height:30px;">
						<td>Imię :</td>
						<td><input type="text" name="imieadmin" size="30"/></td>
					</tr>					
					<tr style="height:30px;">
						<td>Nazwisko :</td>
						<td><input type="text" name="nazwiskoadmin" size="30"/></td>
					</tr>								
					<tr style="height:30px;">
						<td>Hasło :</td>
						<td><input type="password" name="usrpass" size="30"/></td>
					</tr>					
					<tr style="height:30px;">
						<td>Powtórzone hasło :</td>
						<td><input type="password" name="usrpass2" size="30"/></td>
					</tr>						
					<tr style="height:50px;">
						<td><input type="submit" name="f_rejestracja_admin_submit" value="Potwierdź"/></td>					
					</tr>					
				</table>
			</form>			
			<div id="rest">
			</div>
		</div>		
	</div>
</body>	
</html>