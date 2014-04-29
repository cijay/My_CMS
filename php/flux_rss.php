<?php


function &init_news_rss(&$xml_file)
{
    $root = $xml_file->createElement("rss"); 
    $root->setAttribute("version", "2.0"); 
    $root = $xml_file->appendChild($root); 

    $channel = $xml_file->createElement("channel");
    $channel = $root->appendChild($channel);

    $title = $xml_file->createElement("title");
    $title = $channel->appendChild($title);
    $titre = $xml_file->createTextNode("Actualites du TP5");
    $titre = $title->appendChild($titre);


    $link = $xml_file->createElement("link");
    $link = $channel->appendChild($link);
    $text_link = $xml_file->createTextNode("http://127.0.0.1:8888/TP5/");
    $text_link = $link->appendChild($text_link);


    $desc = $xml_file->createElement("description");
    $desc = $channel->appendChild($desc);
    $text_desc = $xml_file->createTextNode("Liste des actualités du TP5");
    $text_desc = $desc->appendChild($text_desc);
    return $channel;
}

function add_news_node(&$parent, $root, $id, $pseudo, $titre, $contenu, $date)
{
    $item = $parent->createElement("item");
    $item = $root->appendChild($item);

    $title = $parent->createElement("title");
    $title = $item->appendChild($title);
    $text_title = $parent->createTextNode($titre);
    $text_title = $title->appendChild($text_title);

    $link = $parent->createElement("link");
    $link = $item->appendChild($link);
    $text_link = $parent->createTextNode("http://127.0.0.1:8888/TP5/index.php?page=actualite&actualite_id=".$id);
    $text_link = $link->appendChild($text_link);

    $desc = $parent->createElement("description");
    $desc = $item->appendChild($desc);
    $text_desc = $parent->createTextNode($contenu);
    $text_desc = $desc->appendChild($text_desc);

    $author = $parent->createElement("author");
    $author = $item->appendChild($author);
    $text_author = $parent->createTextNode($pseudo."@tp5.com (".$pseudo.")" );
    $text_author = $author->appendChild($text_author);

    $date = explode("-",$date);
    $pubdate = $parent->createElement("pubDate");
    $pubdate = $item->appendChild($pubdate);
    $text_date = $parent->createTextNode(date_rss($date));
    $text_date = $pubdate->appendChild($text_date);

    $guid = $parent->createElement("guid");
    $guid = $item->appendChild($guid);
    $text_guid = $parent->createTextNode("http://127.0.0.1:8888/TP5/index.php?page=actualite&actualite_id=".$id);
    $text_guid = $guid->appendChild($text_guid);

    $src = $parent->createElement("source");
    $src->setAttribute("url", "http://127.0.0.1:8888/TP5/"); 
    $src = $item->appendChild($src);
    $text_src = $parent->createTextNode("http://127.0.0.1:8888/TP5/");
    $text_src = $src->appendChild($text_src);

}

function rebuild_rss()
{
    $xml_file = new DOMDocument("1.0");
    $channel = init_news_rss($xml_file);
    $requete = mysql_query("SELECT * FROM actualites");
    while($ligne = mysql_fetch_array($requete)){
        $actualite_id = $ligne['actualite_id'];
        $actualite_titre = $ligne['actualite_titre'];
        $actualite_descr = $ligne['actualite_descr'];
        $actualite_date = $ligne['actualite_date'];
        $utilisateur_id = $ligne['admin_id'];
        $utilisateur_nom = get_admin_nom($utilisateur_id);
        add_news_node($xml_file, $channel, $actualite_id, $utilisateur_nom, $actualite_titre, $actualite_descr, $actualite_date);

    }
    $xml_file->save("rss.xml");
}
?>
