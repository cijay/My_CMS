<?php
include "connexion.php";

$requete = mysql_query('SELECT * FROM actualites WHERE actualite_id="'.$_GET['id'].'"') or die(mysql_error());
if($_GET['tittle']==0)
{
    while($ligne = mysql_fetch_array($requete))
    {
        $mess = $ligne['actualite_titre'];
    }
}
if($_GET['descr']==0)
{
    while($ligne = mysql_fetch_array($requete))
    {
        $mess = $ligne['actualite_descr'];
    }
}
echo $mess;
?>
