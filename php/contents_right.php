<?php
if(isset($_GET['page']) and $_GET['page'] == 'contact'){
    echo '<h1>Nous trouvez</h1>
        <ul class="actualite_container" style="text-align:center;">';
    return_map();
    echo'</ul>';
}

echo '<h1>Vos commentaires !</h1>
    <ul id="commentaire_liste" class="actualite_container">';

$requete = mysql_query('SELECT * FROM commentaires ORDER BY commentaire_id DESC LIMIT 0,5')or die(mysql_error());
while($ligne = mysql_fetch_array($requete)){
    $commentaire_text = $ligne['commentaire_text'];
    $utilisateur_id = $ligne['utilisateur_id'];
    $utilisateur_nom = get_utilisateur_nom($utilisateur_id);
    echo '<li>
        <p>'.$commentaire_text.'</p>
        <p class="utilisateur">'.$utilisateur_nom.'</p>
        </li>';
}
echo '</ul>';

if(cookie_verif()==true){
    $display='display:block;';
}
else{
    $display='display:none;';
}
echo '<div id="commentaire_action" style="'.$display.'">
    <textarea id="commentaire_text" rows="" cols=""></textarea>
    <button class="button1" onclick="commentaire_ajout();">Envoyer</button>
    </div>';

?>







