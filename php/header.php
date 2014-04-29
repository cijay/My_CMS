<?php 
	include 'connexion.php'; 
	include 'fonction.php';
	require 'flux_rss.php';
	rebuild_rss();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>TP6</title>
</head>
<?php 
if(isset($_GET['initmap']))
	echo '<body onload="'.$_GET['initmap'].'">';
else
	echo '<body>';
?>
	<div id="banner"></div>
	<div id="container">
        <div id="header">
        	<div id="identification">
        	<?php
				if(cookie_verif()==true){
					echo '<div id="utilisateur_identifie">
						<p>Connecté en tant que : '.get_utilisateur_nom($_COOKIE['TP5']).'</p>
    					<a href="javascript:cookie_destroy();">Deconnexion</a>
					</div>';
				}
				else{
					echo '<div id="header_button_identifier" class="header_button" onclick="identification();"></div>
           			<div id="header_button_enregistrer" class="header_button"></div>';
				}
			?>
            </div>
            <div id="header_button_rss" class="header_button2">
            	<a href="./rss.xml" style='display:block;width:100%;height:100%;'>&nbsp;</a>
            </div>
            <div id="logo">
                <a href="./index.php">
                	<img src="img/logo.png" alt="Mon blog"/>
                </a>
            </div>
            <div class="clear"></div>
            <div id="menu">
                <ul>
                    <li>
                    	<a href="./index.php">Mes actualités</a>
                    </li>
                    <li>
                    	<a href="./index.php?page=contact&amp;initmap=initialize(50,0,3,0)">Nous trouvez</a>    
                    </li>
                    <li>
                    	<a href="./index.php?page=boutique">Boutique</a>    
                    </li>
                </ul>
                <div class="clear"></div>
             </div>
        </div>
        <div id="contents">