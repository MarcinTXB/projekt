<?php

try{
        session_start();
}
catch(Exception $e){};

?>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_dodanie_oddzialu.css">	
</head>	
<body>

	<div class="container">
		<div class="header">
			<div class="title">
				Formularz dodawania oddziału
			</div>
		</div>
		<div class="content">
			<div class="form">
				<form method="POST" action="../Oddzial_Action.php?action=dodanie">
					<div class="formline">
						Symbol oddziału : <input type="text" name="symbol_oddzialu" size="10" autofocus/>
						&nbsp;&nbsp; Nazwa oddziału : <input type="text" name="nazwa_oddzialu" size="15"/>
					</div>
					<div class="formline">
						Miasto : <input type="text" name="miasto" size="17"/>
						&nbsp;&nbsp; Ulica : <input type="text" name="ulica" size="20"/>
					</div>
					<div class="formline">
						Telefon : <input type="text" name="telefon" size="17"/>
						&nbsp;&nbsp; Email : <input type="text" name="email" size="35"/>
					</div>

					<div class="formline2">
						<input type="submit" name="f_dodanie_oddzialu_submit" value="Potwierdź"/>
					</div>
				</form>
			</div>
			<div class="rest">
			</div>
		</div>
	</div>
</body>
</html>
