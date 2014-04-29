<?php
if(cookie_verif()){
    $display='display:block;';
}
else{
    $display='display:none;';
}

echo '<div id="administration" style="'.$display.'">';

include "adminmenu.php";
include "adminbody.php";

echo '</div>';
?>
