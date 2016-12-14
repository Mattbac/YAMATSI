var map, zoom = 5;

var mapOptions = {
  zoom: zoom,
  streetViewControl: false,
  zoomControl: false,
  center: {lat: 50.632210, lng: 3.060658},
  mapTypeControlOptions: { mapTypeIds: [] },
  fullscreenControl: false,
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
var markers = [];

$(function() {

  $('#event_view').hide();

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
        url: "http://localhost/wf3/YAMATSI/public/api/search_city/"+$('#search_city').val()
      }).done(function(datas){
        $('#result_search').empty();
        for(key in datas){
          $('#result_search').append("<button class='searchresult' data-lat='"+datas[key]['ville_latitude_deg']+"' data-lng='"+datas[key]['ville_longitude_deg']+"'>"+datas[key]['ville_nom_reel']+' '+datas[key]['ville_code_postal'].substr(0,5)+"</button>");
        }
      });
    }
  }

	$(document).on("click",".searchresult",function(e){
		map.setCenter(new google.maps.LatLng($(this).data("lat"),$(this).data("lng")));
		window.location.hash = '/'+map.getCenter().lat()+'/'+map.getCenter().lng();

		$('#result_search').empty();
    $('#search_city').val('');
	});

});

function initMap() {
  	map = new google.maps.Map(document.getElementById('map'), mapOptions );

	marker = '';

    $.ajax({
        dataType: 'json',
        url: "http://localhost/wf3/YAMATSI/public/api/search_event/"
    }).done(function(datas){

		for(key in datas){
			marker = new google.maps.Marker({
				content: datas[key]['id'],
				position: new google.maps.LatLng(datas[key]['coor_lat'],datas[key]['coor_lng']),
				map: map,
				icon: 'http://localhost/wf3/YAMATSI/public/assets/img/music_icon.png',
				title: datas[key]['name']
			});

			google.maps.event.addListener(marker, "click", function(event){
        $('#event_view').empty();
        $('#event_view').show();
        $.ajax({
            dataType: 'html',
            url: "http://localhost/wf3/YAMATSI/public/api/search_event_element/"+this.content
        }).done(function(html){
            $('#event_view').append(html);
        });
			});

      google.maps.event.addListener(map, "click", function(event){
        $('#event_view').hide();
			});

		}
    });
}
