<?php
function cookie_verif(){
    $cookie_verif = false;
    if(isset($_COOKIE['TP5'])){
        $utilisateur_id = $_COOKIE['TP5'];
        $requete = mysql_query('SELECT utilisateur_nom FROM utilisateurs WHERE utilisateur_id='.$utilisateur_id)or die(mysql_error());
        while($ligne = mysql_fetch_array($requete)){
            $cookie_verif = true;
        }
    }
    return $cookie_verif;
}

function get_utilisateur_nom($utilisateur_id){
    $utilisateur_nom = '';
    $requete = mysql_query('SELECT utilisateur_nom FROM utilisateurs WHERE utilisateur_id='.$utilisateur_id)or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $utilisateur_nom = $ligne['utilisateur_nom'];
    }
    return $utilisateur_nom;
}

function get_admin_nom($admin_id){
    $admin_nom = '';
    $requete = mysql_query('SELECT admin_nom FROM admins WHERE admin_id='.$admin_id)or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $admin_nom = $ligne['admin_nom'];
    }
    return $admin_nom;
}

function date_rss($date){
    return date("r",mktime(0, 0, 0, $date[1], $date[2], $date[0]));
}

function return_map(){
    $requete = mysql_query('SELECT * FROM admins')or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $admin_nom = $ligne['admin_nom'];
        $admin_lat = $ligne['admin_lat'];
        $admin_lng = $ligne['admin_lng'];
        $admin_zoom =$ligne['admin_zoom'];
        echo '<li style="cursor:pointer;" onclick="initialize('.$admin_lat.','.$admin_lng.','.$admin_zoom.',1)"><a>'.$admin_nom.'</a></li>';
    }
}
?>
