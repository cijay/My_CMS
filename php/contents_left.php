<?php


if(isset($_GET['page'])){
    $page = $_GET['page'];
    switch($page){
    case 'actualite':
        include 'actualite.php';
        break;
    case 'contact':
        echo '<div id="map" style="height:483px;"></div>';
        break;
    case 'boutique':
        include 'boutique.php';
        break;
    default:
        include 'index2.php';
        break;
    }
}
else{
    include 'index2.php';
}

?>


