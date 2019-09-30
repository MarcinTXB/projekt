<?php

	try{
	        session_start();
	}
	catch(Exception $e){}
	
	include('./autoload.php');
	
	$imie		= $_SESSION['imieprac'];
	$nazwisko	= $_SESSION['nazwiskoprac'];
	$stanowisko	= $_SESSION['stanowisko'];
	
?>

<!DOCTYPE html>

<html>
<head>
	<link rel="stylesheet" type="text/css" href="./css/style_prac.css">
	<script src="./js/jquery-1.11.2.js"></script>
	<script src="./js/jquery-migrate-1.2.1.js"></script>
	<script src="./js/jquery-1.11.1.min.js"></script>
	
</head>

<body>
	<div class="container">	
		<div class="header">
			<div id="title">
				<?php echo "Strona $stanowisko" . "a"; ?>
			</div>
			<div id="zalogowanycaly">
				<div id="zalogowanytekst">Zalogowany jako </div>
				<div id="zalogowanyimie"><?php echo "$imie $nazwisko"; ?></div>
			</div>			
		</div>
		<div class="content">
			<div class="top">
				<div class="menu">
					<ul class="top-level-menu">
						<li><a href="#">Samochody</a>
						<li><a href="#">Rezerwacje</a>
						<li><a href="#">Faktury</a>
						<li><a href="#">Wypożyczenia</a>
						<li><a href="#">Klienci</a>
						<?php
						if ($stanowisko === 'kierownik') { ?>
							<li><a href="#">Pracownicy</a></li> <?php
						} ?>
							
																			
					</ul>
				</div>	
				<div id="loggingarea">
					<div id="loggingbutton">
						<a href="./logout.php?user=prac">Logout</a>								
					</div>
				</div>				
			</div>
			<div class="middle"></div>
			<div class="bottom">
				<!--
				<div class="return"><a href="indexastaff.php">Choose kind of staff</a></div>
				-->
			</div>
		</div>		
		
			
		
	</div>	
</body>

</html>	
