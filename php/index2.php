<?php
	echo '<ul class="actualite_container">';
	$requete = mysql_query('SELECT * FROM actualites ORDER BY actualite_id DESC LIMIT 0,10');
	while($ligne = mysql_fetch_array($requete)){
		$actualite_titre = $ligne['actualite_titre'];
		$actualite_descr = $ligne['actualite_descr'];
		$actualite_date = $ligne['actualite_date'];
		$actualite_img = $ligne['actualite_img'];
		$utilisateur_id = $ligne['admin_id'];
		$utilisateur_nom = get_admin_nom($utilisateur_id);
		$actualite_id = $ligne['actualite_id'];
		$link = "'index.php?page=actualite&amp;actualite_id=$actualite_id'";
		
		echo '<li>
			<div class="actualite_contents_left">
				<div class="actualite_img">
					<a href='.$link.'><img src="./img/actu/'.$actualite_img.'.png" alt="'.$actualite_titre.'"/></a>
				</div>
			</div>
			<div class="actualite_contents_right">
				<h1>:: <a href='.$link.' style="color: #435D83; text-decoration:none;">'.$actualite_titre.'</a></h1>
				<div class="actualite_descr">
					<p>'.$actualite_descr.'</p>
				</div>
			</div>
			<div class="clear"></div>
			<p class="utilisateur"><span>'.$utilisateur_nom.'</span><span> le '.$actualite_date.'</span></p>
		</li>';
	}
	echo '</ul>';
?>