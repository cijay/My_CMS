<div class="adminbody" id="adminbody">
    <div id="acceuil" style="display:block;">
        <h2>Acceuil</h2>
        <iframe src="../index.php"></iframe>
    </div>
<?php
echo '<div id="edit-articles" style="display:none;">'; 
print_actu();
echo '</div>';
include('php/edit-ajout.php');
echo'<div id="edit-commentaire" style="display:none;">';
print_com();
echo'</div>';  
?>

    <div id="edit-map" style="display:none;">
         <h2>Google Map</h2>  
         <?php include('php/edit-map.php'); ?>
    </div>
</div>
