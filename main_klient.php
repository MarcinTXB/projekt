<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/style_klient.css">
    
    <script src="./js/jquery-1.11.3.js"></script>
    <script src="./js/jquery-migrate-1.2.1.js"></script>
    
    <script src="./js/button_Nasza_wypozyczalnia.js"></script>
    <script src="./js/button_Twoje_rezerwacje.js"></script>
    <script src="./js/button_Wykaz_samochodow.js"></script>
    <script src="./js/pokazListeSamochodow_Klient.js"></script>
    <script src="./js/wybranySamochod.js"></script>
    <script src="./js/rezerwowanie_samochodu.js"></script>
    <script src="./js/button_Powrot.js"></script>
    <script src="./js/button_Kontakt.js"></script>
    
    <script>
		$(function() {
			$("#righthigher").animate({left: '774px'}, 200, function() {
                $("#rightbetween").animate({left:'774px'}, 300);
                $("#rightlower").animate({left:'774px'}, 300);
                $("#rightbetween")
                    .delay(500)
                    .queue(function(next) {
                        $(this).css("background-color", "#CEF");
                        next();
                    });
            });
        });
	</script>
    
    <script>
        $(function() {
            $(".menu").hover(function()	{
                $("#left").css("background", "url('./pictures/kreskalewa.png') no-repeat");
            }, function() {
                $("#left").css("background", "url('./pictures/kreskalewawhite.png') no-repeat");
            });
        });
    </script>
    
    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var ca = document.cookie.split(';');
            for(var i=0; i<ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1);
                if (c.indexOf(name) == 0) return c.substring(name.length,c.length);
            }
            return "";
        }
    </script>						
</head>
<body>
    <div id="container">
		<div id="header">
            <div id="tytul">Wypożyczalnia samochodów</div>
            <div style="position:absolute;">
                <div id="rodzaj_samochodow"></div>
                <div id="wybrany_oddzial"></div>
            </div><?php
            if (isset($_SESSION['login'])) {
                if($_SESSION['login'] == true) {
                    $immie = $_SESSION['imie'];?>
                    <div id="zalogowanycaly">
                        <div id="zalogowanytekst">Zalogowany jako </div>
                        <div id="zalogowanyimie"><?php echo "$immie"; ?></div>
                    </div><?php
                }
            }?>	
		</div>
        <div id="content">
            <div id="top">
                <div class="menu">				
					<ul class="top-level-menu">
						<li id="button_Nasza_wypozyczalnia"><a href="#">Nasza Wypożyczalnia</a></li>					
						<li id="button_Twoje_rezerwacje"><a href="#">Twoje Rezerwacje</a></li>
						<li id="button_Wykaz_samochodow"><a href="#">Wykaz Samochodów</a></li>
                        <li id="button_Kontakt"><a href="#">Kontakt</a></li>
					</ul>			
				</div>
				<div id="loggingarea">
					<div id="loggingbutton"><?php
                        if (isset($_SESSION['login']))	{
                            if($_SESSION['login'] == false) {?>
                                <a href="./forms/f_logowanie_klient.php">Logowanie</a><?php
                            } else if ($_SESSION['login'] == true) {?>
                                <a href="./logout.php?user=klient">Logout</a><?php
                            }
                        } else {?>
                            <a href="./forms/f_logowanie_klient.php">Logowanie</a><?php
                        }?>
                    </div>
                    <div id="linkrejestracja"><?php
                        if ((!isset($_SESSION['login'])) || ($_SESSION['login'] == false)) {?>
                            <div id="linkrejestracja">
                                <a href="./forms/f_rejestracja_klient.php">Rejestracja</a>
                            </div><?php
                        }?>
                    </div>
				</div>
                <div id="kreski">
                    <div id="left"></div>
                    <div id="right">
                        <div id="righthigher"></div>
                        <div id="rightbetween"></div>
                        <div id="rightlower"></div>
                    </div>
                </div>
                <div id="linia"></div>
            </div>
            <div id="middle"></div>
            <div id="bottom">
                <div id="bottom1"></div>
                <div id="bottom2"></div>
            </div>
            
            <script>
                f_Nasza_wypozyczalnia();
            </script>
            
            <?php
            if(isset($_SESSION['login'])) {
                if($_SESSION['login']) {
                    $immie = $_SESSION['imie'];
                }
            }?>
        </div>
    </div>
	
</body>	
</html>