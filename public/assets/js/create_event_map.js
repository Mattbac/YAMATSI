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

locationPage = document.location.href.split('public');

$(function() {

  $('#event_view').remove();

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
        url: locationPage[0]+"public/api/search_city/"+$('#search_city').val()
      }).done(function(datas){
        $('#result_search').empty();
        for(key in datas){
          $('#result_search').append("<button class='searchresult' style='color:black;' data-lat='"+datas[key]['ville_latitude_deg']+"' data-lng='"+datas[key]['ville_longitude_deg']+"'>"+datas[key]['ville_nom_reel']+' '+datas[key]['ville_code_postal'].substr(0,5)+"</button>");
        }
      });
    }
  }

	$(document).on("click",".searchresult",function(e){
		map.setCenter(new google.maps.LatLng($(this).data("lat"),$(this).data("lng")));
		$('#result_search').empty();
	});

	$("#send_position").click(function(e){
		var root = (window.location.href).substr(0,(window.location.href).length-3)
		window.location.replace(root+'create/'+marker.getPosition().lat()+'/'+marker.getPosition().lng());
	});

});

marker = null;
map = null;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );

  google.maps.event.addListener(map, "click", function(event){
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

    if(marker === null){
      marker = new google.maps.Marker({
        position: {lat, lng},
        map: map,
        icon: locationPage[0]+"public/assets/img/music_icon.png",
        title: 'Hello World!'});
        
    }else{

      marker.setPosition({lat, lng});
    }
  });
}

/* ----------------------------------------- */



