<?php
	session_start();
?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../css/style_rejestr_klient.css">	
</head>	
<body>

	<div class="container">
		<div class="title">Formularz rejestracji użytkownika</div>
		<form method="POST" action="../Rejestracja_Klient.php">
			<table class="formularze">				
				<tr style="height:80px;">
					<td>Twoje imię : <input type="text" name="imie" size="18" autofocus>
						 i nazwisko : <input type="text" name="nazwisko" size="32">
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Pesel : <input type="text" name="pesel" size="13">
					</td>
				</tr>				
				<tr><td>Twój adres zamieszkania : </td></tr>
				<tr style="height:10px;">
					<td>Miasto : <input type="text" name="miasto" size="17">
                                                 &nbsp;&nbsp;&nbsp;&nbsp; 
                                                <select name="rodzaj_ulicy" style="font-style:italic;">
                                                        <option value="ul.">Ulica</option>
                                                        <option value="al.">Aleja</option>
                                                        <option value="pl.">Plac</option>
                                                </select>				                    
						 <input type="text" name="ulica" size="20">
						 Nr budynku : <input type="text" name="nr_budynku" size="6">
						 Nr mieszkania : <input type="text" name="nr_mieszkania" size="4">
					</td>
				</tr>
				<tr style="height:100px;">
					<td>Telefon : <input type="text" name="nr_telefonu" size="14">
						 &nbsp;&nbsp; E-mail : <input type="text" name="email" size="32">
					</td>
				</tr>
				<tr style="height:80px;">
					<td>Twoje hasło : <input type="text" name="usrpass">
						 &nbsp;&nbsp;&nbsp;&nbsp;powtórzone hasło : <input type="text" name="usrpass2">
					</td>
				</tr>
				<tr><td><input type="submit" name="f_rejestracja_klient_submit" value="Potwierdź"></td></tr>
			</table>	
		</form>
	</div>
</body>	
</html>

