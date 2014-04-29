function admin_cookie_set(){
    $('#loginform').submit(function(event) {
        event.preventDefault();
        var admin_nom = $("#user_login").val();
        var admin_password = $("#user_pass").val();

        $.post('php/action.php',{
            action:"cookie_set",
            admin_nom: admin_nom,
            admin_password:admin_password
        },function(data){
            if(data=="erreur"){
                alert("Combinaison identifiant / mot de passe incorrect");
            }
            else{
                location.reload();
                $('#utilisateur_identifie').html(data);
                $('#login').fadeOut();
                $('#administration').fadeIn();

            }});
    });
}

function send_actu(){
    var modif = 1;
    var id = 0;
    if($('#h2_art').html() =='Modifier article'){
        modif = 0;
        id = $('#actu_id').html();
    }
    var tittle = $('#ajout_tittle').val();
    var message = $('#ajout_actu').val();
    $.post('php/action.php',{
        action:"send_actu",
        modif:modif,
        message:message,
        tittle:tittle,
        id:id
    },function(data){
        if(id == 0)
        alert("Article crée");
        else
        alert("Article mis a jour");
    $('#edit-ajout').fadeOut(100);
    $('#edit-articles').html(data);
    $('#edit-articles').fadeIn(500);
    });
}

function suppr_actu(nbr){
    if(pop_up()){
        $('#edit-articles').fadeOut(100);
        for(var i = 0; i< nbr; i++ ){
            if($('#Check'+i).attr('checked')){
                var tittle = $('#tittle_'+i).html();
                $.post('php/action.php',{
                    action:"suppr",
                    type:"actu",
                    content:tittle
                },function(data){
                    $('#edit-articles').html(data);
                });
            }
        }
        $('#edit-articles').fadeIn(500);
    }
}

function suppr_com(nbr){
    if(pop_up()){
        $('#edit-commentaire').fadeOut(100);
        for(var i = 0; i< nbr; i++ ){
            if($('#Checkc'+i).attr('checked')){
                var descr = $('#descr_'+i).html();
                $.post('php/action.php',{
                    action:"suppr",
                    type:"com",
                    content:descr
                },function(data){
                    $('#edit-commentaire').html(data);
                });
            }
        }
        $('#edit-commentaire').fadeIn(500);
    }
}

function pop_up(){
    var answer = confirm("supprimer la sélection ?");
    if (answer){
        return true;
    }
    else{
        return false;
    }
}

function edit_actu(id){
    $('#edit-articles').fadeOut(100);
    $('#h2_art').html('Modifier article');
    $('#actu_id').html(id);
    $.get('php/action2.php',{
        id:id,
        tittle:0,
        descr:1
    }, function(data){
        $('#ajout_tittle').val(data);
    });
    $.get('php/action2.php',{
        id:id,
        tittle:1,
        descr:0
    }, function(data){
        $('#ajout_actu').val(data);
    });
    $('#edit-ajout').fadeIn(500);
}

function admin_send_map(){
    $('#formap').submit(function(event) {
        event.preventDefault(); 
        var admin_lat = $("#lat").val();
        var admin_lng = $("#lng").val();
        var admin_zoom = $("#zoom").val();

        $.post('php/action.php',{
            action: "modif_map",
            lat:admin_lat,
            lng: admin_lng,
            zoom:admin_zoom
        },function(data){
            alert(data);
        });
    });
}

function admin_cookie_destroy(){
    $.post('php/action.php',{
        action:"cookie_destroy"
    },function(data){
        location.reload();
        $('#utilisateur_identifie').html(data);
        $('#administration').fadeOut();
        $('#login').fadeIn();
    });	
}

function switch_admin(state){
    $('#edit-articles').fadeOut(100);
    $('#edit-commentaire').fadeOut(100);
    $('#edit-map').fadeOut(100);
    $('#acceuil').fadeOut(100);
    $('#edit-ajout').fadeOut(100);
    switch(state)
    {
        case 'articles':
            $('#edit-articles').fadeIn(500);
            break;
        case 'commentaire':
            $('#edit-commentaire').fadeIn(500);
            break;
        case 'map':
            $('#edit-map').fadeIn(500);
            initialize();
            break;
        case 'acceuil':
            $('#acceuil').fadeIn(500);
            break;
        case 'ajouter':
            $('#h2_art').html('Ajouter un article');
            $('#edit-ajout').fadeIn(500);
            break;
        case 'annuler':
            $('#ajout_actu').val('');
            $('#edit-articles').fadeIn(500);
            break;
    }
}
