<?php
	session_start();
	
include('../NewConnection.php');

$dbh = (new NewConnection())->getCon();

$nazwaTabOddzial = 'Oddzial';


	
?>
<head>
	<link rel="stylesheet" type="text/css" href="../css/style_rejestr_prac.css">	
</head>	
<body>

	<div class="container">
		<div class="header">
			<div class="title">
				Formularz rejestracji pracownika przez administratora
			</div>
		</div>
		<div class="content">
			<form method="POST" action="../Pracownik.php">
				<table class="formularze">				
					<tr style="height:50px;">
						<td>Login pracownika : <input type="text" name="loginprac" size="18" autofocus> &nbsp; &nbsp;
							<select name="stanowisko" style="font-style:italic;">
								<option value="kierownik">kierownik oddziału</option>
								<option value="pracownik">pracownik oddziału</option>
							</select>
							&nbsp; &nbsp;							
							<select name="oddzial" style="font-style:italic;"><?php		
								$stmt = $dbh->query("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . ";");	
								while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
									<option value="<?php echo "$rekord[Nazwa_oddzialu]"; ?>"><?php echo "$rekord[Nazwa_oddzialu]"; ?></option><?php
								}?>
							</select>																		
						</td>
					</tr>		
					<tr style="height:80px;">
						<td>Imię : <input type="text" name="imie" size="18">								
							 i nazwisko : <input type="text" name="nazwisko" size="30">
							 &nbsp; &nbsp; &nbsp; Pesel : <input type="text" name="pesel" size="13">
						</td>
					</tr>		
					<tr><td>Adres zamieszkania : </td></tr>
					<tr style="height:10px;">
						<td>Miasto : <input type="text" name="miasto" size="17">
	                                        	&nbsp; &nbsp;&nbsp; 
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
							&nbsp; &nbsp; E-mail : <input type="text" name="email" size="32">
						</td>
					</tr>
					<tr style="height:80px;">
						<td>Hasło : <input type="password" name="pracpass">
							&nbsp; &nbsp;&nbsp;powtórzone hasło : <input type="password" name="staffpass2">
						</td>
					</tr>
					<tr><td><input type="submit" name="f_Pracownik_submit" value="Potwierdź"></td></tr>
				</table>													
			</form>			
			<div class="rest">
			</div>
		</div>
	</div>
</body>	
</html>