<?php
include 'connexion.php';
include 'fonction.php';

if($_POST['action']=='commentaire_ajout'){
    if(cookie_verif()==true){
        $utilisateur_id = $_COOKIE['TP5'];
        $commentaire_text =  mysql_real_escape_string(htmlentities($_POST['commentaire_text']));
        $requete = mysql_query('INSERT INTO commentaires VALUES(\'\',\''.$commentaire_text.'\',\''.$utilisateur_id.'\')')or die(mysql_error());
        $requete = mysql_query('SELECT * FROM commentaires ORDER BY commentaire_id DESC LIMIT 0,10')or die(mysql_error());
        while($ligne = mysql_fetch_array($requete)){
            $commentaire_id = $ligne['commentaire_id'];
            $commentaire_text = $ligne['commentaire_text'];
            $utilisateur_id = $ligne['utilisateur_id'];
            $utilisateur_nom = get_utilisateur_nom($utilisateur_id);
            echo '<li>
                <p>'.$commentaire_text.'</p>
                <p class="utilisateur">'.$utilisateur_nom.'</p>
                </li>';
        }
    }
}

if($_POST['action']=='cookie_set'){
    $utilisateur_id = '';
    $utilisateur_nom = $_POST['utilisateur_nom'];
    $utilisateur_password = $_POST['utilisateur_password'];
    $requete = mysql_query('SELECT * FROM utilisateurs WHERE utilisateur_nom="'.$utilisateur_nom.'" AND utilisateur_password="'.$utilisateur_password.'"')or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $utilisateur_id = $ligne['utilisateur_id'];
    }
    if($utilisateur_id!=''){
        setcookie('TP5', $utilisateur_id, time()+3600,'/');
        echo '<div id="utilisateur_identifie">
            <p>Connecté en tant que : '.$utilisateur_nom.'</p>
            <a href="javascript:cookie_destroy();">Deconnexion</a>
            </div>';
    }
    else{
        echo 'erreur';
    }
}

if($_POST['action']=='cookie_destroy'){
    setcookie('TP5', '', time()-1,'/');
    echo '<div id="header_button_identifier" class="header_button" onclick="identification();"></div>
        <div id="header_button_enregistrer" class="header_button"></div>';
}
?>
