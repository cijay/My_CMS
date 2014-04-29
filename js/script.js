function commentaire_ajout(){
    var commentaire_text = $("#commentaire_text").val();
    $.post('php/action.php',{
        action:"commentaire_ajout",
        commentaire_text:commentaire_text
    },function(data){
        $('#commentaire_liste').html(data);
        $("#commentaire_text").val('');
    });
}

function identification(){
    if($('#identification_popup').css('display')=='none'){
        $('#identification_popup').fadeIn(500);
    }
    else{
        $('#identification_popup').fadeOut(500);
    }
}

function cookie_set(){
    var utilisateur_nom = $("#utilisateur_nom").val();
    var utilisateur_password = $("#utilisateur_password").val();
    $.post('php/action.php',{
        action:"cookie_set",
        utilisateur_nom:utilisateur_nom,
        utilisateur_password:utilisateur_password
    },function(data){
        if(data!=""){
            if(data=="erreur"){
                alert("Combinaison identifiant / mot de passe incorrect");
            }
            else{
                $('#identification').html(data);
                $('#identification_popup').fadeOut(500);
                $('#commentaire_action').fadeIn(500);
            }
        }
    });
}

function cookie_destroy(){
    $.post('php/action.php',{
        action:"cookie_destroy"
    },function(data){
        if(data!=""){
            $('#identification').html(data);
            $('#commentaire_action').fadeOut(500);
        }
    });
}

function initialize(lat, lng, zoom, mark) {
    var place = new google.maps.LatLng(lat, lng);
    var myOptions = {
        zoom: zoom,
        center: place,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map($('#map').get(0), myOptions);

    if(mark == '1')
        marker = new google.maps.Marker({
            position: place,
            map: map,
        });
}
