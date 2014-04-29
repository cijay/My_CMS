var geocoder;
var map;
var marker;
var markers = new Array();
var i = 0;

function initialize() {
   	geocoder = new google.maps.Geocoder();
   	var place = new google.maps.LatLng($('#lat').val(), $('#lng').val());
   	var myOptions = {
    	zoom: parseInt($('#zoom').val()),
    	center: place,
    	mapTypeId: google.maps.MapTypeId.ROADMAP
   	}
   	map = new google.maps.Map($('#map').get(0), myOptions);
   
	marker = new google.maps.Marker({
		position: place,
		map: map,
		draggable: true
	});
	
	google.maps.event.addListener(marker, 'position_changed', function(event) 
	{
		$('#lat').val(marker.getPosition().lat());
		$('#lng').val(marker.getPosition().lng());
	});
	google.maps.event.addListener(map, 'zoom_changed', function(event) 
	{
		$('#zoom').val(map.getZoom());	
	});
  }

function codeAddress() {
   /* Récupération de la valeur de l'adresse saisie */
	var address = $('#address').val();
	/* Appel au service de geocodage avec l'adresse en paramètre */
	geocoder.geocode( { 'address': address}, function(results, status) {
	/* Si l'adresse a pu être géolocalisée */
		if (status == google.maps.GeocoderStatus.OK) 
		{
			/* Récupération de sa latitude et de sa longitude */
			$('#lat').val(results[0].geometry.location.lat());
			$('#lng').val(results[0].geometry.location.lng());
			
	   		map.setCenter(results[0].geometry.location);
	   		marker.setPosition(results[0].geometry.location);
			map.setZoom(parseInt($('#zoom').val()));
      	}
	  	else
	  	{
   			alert("Le geocodage n\'a pu etre effectue pour la raison suivante: " + status);
   		}
	});
}