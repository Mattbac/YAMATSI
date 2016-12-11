var map, zoom = 15;

var mapOptions = {
  zoom: zoom,
  streetViewControl: false,
  zoomControl: false,
  center: {lat: 50.632210, lng: 3.060658},
  mapTypeControlOptions: { mapTypeIds: [] },
  styles: [
  {
    featureType: "road",
    elementType: "geometry",
    stylers: [
      { lightness: 100 },
      { visibility: "simplified" }
    ]
  },{
    featureType: "all",
    elementType: "labels",
    stylers: [
      { visibility: "off" }
    ]
  },{
    "featureType": "transit.line",
    stylers: [
      { visibility: "off" }
    ]
  }
]
};

$(function() {

	valide = 0;
	time = 0;
	$('#search_city').on("input", function(){
		valide++;
		time = new Date().getTime();
	});

	setInterval(function(){
		if(time + 800 < new Date().getTime() && valide > 0){
			valide = 0;
			recherche();
		}
	}, 400);

  function recherche(){
	if($('#search_city').val() != ''){
		$.ajax({
			type: "GET",
			dataType: 'json',
			url: "http://localhost/YAMATSI/public/api/search_city/"+$('#search_city').val()
		}).done(function(datas){
			$('#result_search').empty();
			for(key in datas){
				console.log(datas[key]);
				$('#result_search').append("<p style='color:black;'>"+datas[key]['ville_nom_reel']+' '+datas[key]['ville_population_2012']+"</p>");
			}
		});
	}
  }
});

marker = null;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );

  google.maps.event.addListener(map, "click", function(event){
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

    if(marker === null){
      marker = new google.maps.Marker({
        position: {lat, lng},
        map: map,
        icon: 'http://localhost/YAMATSI/public/assets/img/music_icon.png',
        title: 'Hello World!'});
        
    }else{

      marker.setPosition({lat, lng});
    }
  });
}

/* ----------------------------------------- */



