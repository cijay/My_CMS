<?php 

if(cookie_verif())
{
    if(!isset($_POST['modif']))
    {
        $requete = mysql_query('SELECT * FROM admins WHERE admin_id='.$_COOKIE['adm_cms'])or die(mysql_error());;
        while($ligne = mysql_fetch_array($requete))	
        {
            $admin_lat = $ligne['admin_lat'];
            $admin_lng = $ligne['admin_lng'];
            $admin_zoom = $ligne['admin_zoom'];
        }

        echo '<div id="localisation" class="legend">
            <form id="formap">
            <p>Adresse : <input class="submit" id="address" type="text" value=""></p>
            <p>Latitude : <input class="submit" id="lat" type="text" value="'.$admin_lat.'"></p>
            <p>Longitude : <input class="submit" id="lng" type="text" value="'.$admin_lng.'"></p>
            <p>Zoom : <input class="submit" id="zoom" type="text" value="'.$admin_zoom.'" min="0" max="21"></p>
            <p><input class="Button submit" type="button" value="Localiser" onclick="codeAddress()"></p>
            <input class="button-primary" type="submit" value="Modifier" onClick="admin_send_map()" style="float:left;margin-top:3px"/>
            </form>
            <p class="info">* Choisissez une adresse et cliquez sur "Localiser" ou alors déplacez le marqueur sur la carte.</p>
            <p class="info">** Pour enregistrer votre adresse, cliquez sur "Modifier".</p>
            </div>';
    }
}
?>
<div id="map"></div>
