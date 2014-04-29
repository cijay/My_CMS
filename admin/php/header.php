<?php
include 'connexion.php';
include "fonction.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta name='robots' content='noindex,nofollow' />

    <title>my_CMS > Se Connecter</title>

    <link rel="stylesheet" type="text/css" href="css/style.css"/>

    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/gmap.js"></script>

</head>
<body>
    <div id="backtoblog">
        <div id="redirect">
            <a href="../index.php" title="Perdu ??">&larr; Retour sur BLOG</a>
        </div>
<?php
if(cookie_verif()){
    echo '<div id="utilisateur_identifie">
        <p>Connecté en tant que : '.get_admin_nom($_COOKIE['adm_cms']).' |
        <a href="javascript:admin_cookie_destroy();">Se Deconnecter</a></p>
        </div>';
}
else{
    echo '<div id="utilisateur_identifie"></div>';
}
?>
    </div>
<?php
include "login.php";
include "administration.php";
?>
