<?php

$nazwaTabOddzial = 'Oddzial';

include('../NewConnection.php');

$dbh =	(new NewConnection())->getCon();


?>


<head>
	<link rel="stylesheet" type="text/css" href="../css/style_dodanie_samochodu.css">
	
</head>
<body>
	<div class="container">
		<div class="header">
			<div class="title">
				Formularz dodania samochodu
			</div>
		</div>
		<div class="content">
			<form method="post" action="../Samochod.php">
				<table class="formularze">
					<tr class="formline">
						<td>Marka : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="marka" size="21" autofocus/></td>
					</tr>
					<tr class="formline">
						<td>Model : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="model" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Rodzaj paliwa :</td> 
						<td><input type="text" name="rodzaj_paliwa" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Pojemnosc silnika :</td> 
						<td><input type="text" name="pojemnosc_silnika" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Moc silnika : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="moc_silnika" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Rocznik : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="rocznik" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Kolor : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
						<td><input type="text" name="kolor" size="21" /></td>
					</tr>
					<tr class="formline">
						<td>Rodzaj samochodu :</td>
						<td>
							<select name="rodzaj_samochodu" style="font-style:italic;">
								<option value="osobowy">Samochód osobowy</option>
								<option value="kombi">Samochód osobowy kombi</option>
								<option value="dostawczy">Samochód dostawczy</option>
							</select>
						</td>
					</tr>
					<tr class="formline">
						<td>Symbol samochodu w firmie :</td>
						<td><input type="text" name="symbol_samochodu" size="21" /></td>
					</tr>  
					<tr>
						<td>Oddzial firmy</td>
						<td>
							<select name="nazwa_oddzialu" style="font-style:italic;"><?php
								$stmt = $dbh->query("SELECT Nazwa_oddzialu FROM " . $nazwaTabOddzial . ";");
								while ($rekord = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
									<option value="<?php echo "$rekord[Nazwa_oddzialu]"; ?>"><?php echo " &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; $rekord[Nazwa_oddzialu] &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; "; ?></optioin><?php	
								}?>
							</select>
						</td>
					</tr>									
					<tr>
						<td><input type="submit" name="f_samochod_submit" value="     Potwierdź     "/></td>
					</tr>
				</table>
			</form>
			<div class="rest">
			</div>
		</div>
	</div>
</body>
				
						
						
					
					
					













