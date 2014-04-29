<?php
$database = 'my_CMS';
$server = 'localhost';
$username = 'root';
$password = 'root';
$connexion = mysql_connect($server,$username,$password) or die(mysql_error());
$database_connexion = mysql_select_db($database,$connexion) or die(mysql_error());
?>
