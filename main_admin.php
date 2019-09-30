<?php

try{	
        session_start();	
}
catch(Exception $e){}

include('./autoload.php');

include('./NewConnection.php');

$dbh = (new NewConnection())->getCon();

$imie = $_SESSION['loginadmin'];



$nazwaTabOddzial = 'Oddzial';

?>

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style_admin.css">
	<script src="./js/jquery-1.11.2.js"></script>
	<script src="./js/jquery-migrate-1.2.1.js"></script>
	<script src="./js/jquery-1.11.1.min.js"></script>
	
	<script src="./js/pobierzListeSamochodow.js"></script>
	
	<script src="./js/pobierzListeOddzialow.js"></script>	
	<script src="./js/pobierzListePracownikow.js"></script>
	<script src="./js/pobierzListeAdresow.js"></script>
	<script src="./js/pobierzInfoPracownik.js"></script>
	
	             												
				
	
	
</head>

<body>
	<div class="container">	
		<div class="header">
			<div id="nazwatabeli">
				<div id="nazwatabelitekst"></div>
				<div id="nazwatabelinazwa"></div>
				
			</div>
			<div id="title">			
				Strona dla administratora
			</div>
			<div id="zalogowanycaly">
				<div id="zalogowanytekst">Zalogowany jako </div>
				<div id="zalogowanyimie"> <?php echo "$imie"; ?> </div>
			</div>		
		</div>
		<div class="content">
			<div class="top">
				<div class="menu">
					<ul class="top-level-menu">
						<li><a href="#">Oddziały</a>
							<ul class="second-level-menu">
								<li><div id="pobierzListeOddzialow">Lista oddziałów</div></li>
								<li><a href="./forms/f_dodanie_oddzialu.php?action=dodanie">Dodanie oddziału</a></li>									
							</ul>
						</li>						
						<li><a href="#">Samochody</a>
							<ul class="second-level-menu">
								<li><div id="pobierzListeSamochodow">Lista samochodów</div></li>
								<li><a href="./forms/f_dodanie_samochodu.php">Dodanie samochodu</a></li>
							</ul>			
							
							
							
						</li>
						
						<li><a href="#">Pracownicy</a>
							<ul class="second-level-menu">
								<li><div id="pobierzListePracownikow">Lista pracowników</div></li>
								<li><a href="./forms/f_rejestracja_prac.php">Dodanie pracownika</a></li>
								<li><a href="#">Edycja pracownika</a></li>
								<li><a href="./forms/f_usuniecie_prac.php">Usunięcie pracownika</a></li>							
							</ul>
						</li>
						<li><a href="#">Adresy</a>
							<ul class="second-level-menu">
								<li><div id="pobierzListeAdresow">Lista adresów</div></li>
							</ul>
						</li>
					</ul>
				</div>
				<div id="loggingarea">
					<div id="loggingbutton"> 
						<a href="./logout.php?user=admin">Logout</a>								
					</div>			
				</div>				
			</div>
			<div class="middle">
				<div id="tabMainWithOpis">
					<div id="tabMainOpis"></div>
					<div id="tabMainScroll">						
						<div id="tabMain">
							
						</div>
					</div>
				</div>
			</div>
			<div id="infoarea">
				<div id="info1">
				</div>
				<div id="info2">
				</div>
				<div id="info3">
				</div>
				<div id="info4">
				</div>
								
		
				
					
			</div>			
		</div>
		
	</div>	
</body>

</html>	


