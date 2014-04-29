<?php
if(isset($_GET['actualite_id'])){
    $actualite_id = $_GET['actualite_id'];
    $requete = mysql_query('SELECT * FROM actualites WHERE actualite_id='.$actualite_id);
    while($ligne = mysql_fetch_array($requete)){
        $actualite_id = $ligne['actualite_id'];
        $actualite_titre = $ligne['actualite_titre'];
        $actualite_descr = $ligne['actualite_descr'];
        $actualite_date = $ligne['actualite_date'];
        $actualite_img = $ligne['actualite_img'];
        $utilisateur_id = $ligne['admin_id'];
        $utilisateur_nom = get_admin_nom($utilisateur_id);
    }
    echo '<div id="actualite_container">
        <h1>'.$actualite_titre.'</h1>
        <p>'.$actualite_descr.'</p>
        <p class="utilisateur"><span>'.$utilisateur_nom.'</span><span> le '.$actualite_date.'</span></p>
        </div>';
}
?>
