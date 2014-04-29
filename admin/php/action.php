<?php 
include "connexion.php";
include "fonction.php";

$i = $_POST['action'];
switch($i)
{
case 'cookie_set':
    $admin_id = '';
    $admin_nom = $_POST['admin_nom'];
    $admin_password = $_POST['admin_password'];
    $requete = mysql_query('SELECT * FROM admins WHERE admin_nom="'.$admin_nom.'" AND admin_password="'.$admin_password.'"') or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $admin_id = $ligne['admin_id'];
    }
    if($admin_id!=''){
        setcookie('adm_cms', $admin_id, time()+3600,'/');
        echo '<p>Connecté en tant que : '.$admin_nom.' |
            <a href="javascript:admin_cookie_destroy();">Se Deconnecter</a></p>';
    }
    else
        echo 'erreur';
    break;

case 'cookie_destroy':
    setcookie('adm_cms', '', time()-3600,'/');
    echo'<div id="utilisateur_identifie"></div>';
    break;

case 'modif_map':
    $admin_id = $_COOKIE['adm_cms'];
    $lat =  mysql_real_escape_string(htmlentities($_POST['lat']));
    $lng =  mysql_real_escape_string(htmlentities($_POST['lng']));
    $zoom =  mysql_real_escape_string(htmlentities($_POST['zoom']));
    $requete = mysql_query('UPDATE admins SET admin_lat = '.$lat.', admin_lng = '.$lng.', admin_zoom = '.$zoom.' WHERE admin_id ='.$admin_id)or die(mysql_error());
    echo 'Coordonnées Modifiées';
    break;

case 'send_actu':
    $admin_id = $_COOKIE['adm_cms'];
    $state = $_POST['modif'];
    $actu_id = $_POST['id'];
    $actu_date = idate('Y').'-'.idate('m').'-'.idate('t');
    $actu_tittle = mysql_real_escape_string(htmlentities($_POST['tittle']));
    $actu_descr = mysql_real_escape_string(htmlentities($_POST['message']));
    $actu_img = 'actu_img3';
    if($state==1)
    {
        $requete = mysql_query("INSERT  INTO actualites (actualite_id, actualite_titre, actualite_descr, actualite_img, actualite_date, admin_id) 
            VALUES ( '', '$actu_tittle', '$actu_descr', '$actu_img', '$actu_date', '$admin_id')") or die(mysql_error());
    }
    if($state==0){
        $requete = mysql_query("UPDATE actualites SET actualite_titre = '$actu_tittle', actualite_descr = '$actu_descr', actualite_date = '$actu_date' WHERE actualite_id='$actu_id'") or die(mysql_error());
    }
    print_actu();
    break;

case 'suppr':
    $content = $_POST['content'];
    if($_POST['type'] == 'com')
    {
        $requete = mysql_query("DELETE FROM commentaires WHERE commentaire_text='$content'") or die(mysql_error());
        print_com();
    }
    if($_POST['type'] == 'actu')
    {
        $requete = mysql_query("DELETE FROM actualites WHERE actualite_titre='$content'") or die(mysql_error());
        print_actu();
    }
    break;
}

?>
