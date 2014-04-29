<?php

function cookie_verif(){
    $cookie_verif = false;
    if(isset($_COOKIE['adm_cms'])){
        $admin_id = $_COOKIE['adm_cms'];
        $requete = mysql_query('SELECT admin_nom FROM admins WHERE admin_id='.$admin_id)or die(mysql_error());
        if(mysql_num_rows($requete) > 0)
            $cookie_verif = true;
    }
    return $cookie_verif;
}

function get_admin_nom($admin_id){
    $admin_nom = '';
    $requete = mysql_query('SELECT admin_nom FROM admins WHERE admin_id='.$admin_id)or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $admin_nom = $ligne['admin_nom'];
    }
    return $admin_nom;
}

function get_utilisateur_nom($utilisateur_id){
    $utilisateur_nom = '';
    $requete = mysql_query('SELECT utilisateur_nom FROM utilisateurs WHERE utilisateur_id='.$utilisateur_id)or die(mysql_error());
    while($ligne = mysql_fetch_array($requete)){
        $utilisateur_nom = $ligne['utilisateur_nom'];
    }
    return $utilisateur_nom;
}

function print_actu()
{
    $ajouter = "'ajouter'";
    $article = "'articles'";
    echo '<h2>Articles
        <a id="B_ajout" onclick="switch_admin('.$ajouter.');" class="Button">Ajouter</a></h2>

        <table class="_table" id="_table" cellspacing="0">
        <thead>
        <tr>
        <th class="column column-check"><input type="checkbox"></th>
        <th class="column column-title">Titre</th>
        <th class="column column-descr">Description</th>
        <th class="column column-author">Auteur</th>
        <th class="column column-date">Date</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        <th class="column column-check"><input type="checkbox"></th>
        <th class="column column-title">Titre</th>
        <th class="column column-descr">Description</th>
        <th class="column column-author">Auteur </th>
        <th class="column column-date">Date</th>
        </tr>
        </tfoot>
        <tbody>';
    $i = 0;
    $requete = mysql_query('SELECT * FROM actualites ORDER BY actualite_id DESC');
    while($ligne = mysql_fetch_array($requete))
    {
        $tr_class = 'one';
        if($i%2!=0)
            $tr_class = 'two';
        $actualite_id = $ligne['actualite_id'];
        $actualite_titre = $ligne['actualite_titre'];
        $actualite_descr = $ligne['actualite_descr'];
        $actu_descr =  mysql_real_escape_string(htmlentities($ligne['actualite_descr']));
        $actualite_date = $ligne['actualite_date'];
        $utilisateur_id = $ligne['admin_id'];
        $utilisateur_nom = get_admin_nom($utilisateur_id);
        if(strlen($actualite_descr) > 80)
            $actualite_descr = substr($ligne['actualite_descr'], 0, 100).' ...';
        echo'<tr class="'.$tr_class.'">
            <th class="column column-check"><input id="Check'.$i.'" type="checkbox"></th>';
        echo "<td id='tittle_$i' onclick="."edit_actu('$actualite_id')"." class='column column-title'>$actualite_titre</td>";
        echo '<td class="column column-descr">'.$actualite_descr.'</th>
            <td class="column column-author">'.$utilisateur_nom.'</td>
            <td class="column column-date">'.$actualite_date.'</td>
            </tr>';
        $i++;
    }
    echo '	</tbody>
        </table>

        <div id="B_supp"><a onclick='.'suppr_actu('.$i.')'.' class="Button">Supprimer</a></div>';
}


function print_com()
{		 
    echo '<h2>Commentaires</h2>
        <table class="_table" id="_table" cellspacing="0">
        <thead>
        <tr>
        <th class="column column-check"><input type="checkbox"></th>
        <th class="column column-author">Auteur</th>
        <th class="column column-com">Commentaire</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
        <th class="column column-check"><input type="checkbox"></th>
        <th class="column column-author">Auteur</th>
        <th class="column column-com">Commentaire</th>
        </tr>
        </tfoot>
        <tbody>';

    $i = 0;
    $requete = mysql_query('SELECT * FROM commentaires ORDER BY commentaire_id DESC');
    while($ligne = mysql_fetch_array($requete))
    {
        $tr_class = 'one';
        if($i%2!=0)
            $tr_class = 'two';
        $commentaire_com = $ligne['commentaire_text'];
        $utilisateur_id = $ligne['utilisateur_id'];
        $utilisateur_nom = get_utilisateur_nom($utilisateur_id);
        echo'<tr class="'.$tr_class.'">
            <th class="column column-check"><input id="Checkc'.$i.'" type="checkbox"></th>
            <td class="column column-author">'.$utilisateur_nom.'</td>
            <td id="descr_'.$i.'" class="column column-com">'.$commentaire_com.'</td>
            </tr>';
        $i++;
    }

    echo '	</tbody>
        </table>';

    echo'<div id="B_supp"><a onclick="suppr_com('.$i.');" class="Button">Supprimer</a></div>';
}
?>
