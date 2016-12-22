var map, zoom = 10;

var mapOptions = {
  zoom: zoom,
  streetViewControl: false,
  zoomControl: false,
  center: {lat: 50.632210, lng: 3.060658},
  mapTypeControlOptions: { mapTypeIds: [] },
  fullscreenControl: false,
  styles:[
  {
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#f5f5f5"
      }
    ]
  },
  {
    "elementType": "labels.icon",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b58b94"
      }
    ]
  },
  {
    "elementType": "labels.text.stroke",
    "stylers": [
      {
        "color": "#ffebe2"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "administrative.land_parcel",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#bdbdbd"
      }
    ]
  },
  {
    "featureType": "administrative.neighborhood",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "landscape.natural",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#e6e6e6"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "poi",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#757575"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#e7f3cd"
      }
    ]
  },
  {
    "featureType": "poi.park",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  },
  {
    "featureType": "poi.place_of_worship",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#ffffff"
      }
    ]
  },
  {
    "featureType": "road",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b58b94"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#e4d6d9"
      }
    ]
  },
  {
    "featureType": "road.arterial",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b58b94"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#dadada"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#b58b94"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels",
    "stylers": [
      {
        "visibility": "off"
      }
    ]
  },
  {
    "featureType": "road.highway",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#616161"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#e4d6d9"
      }
    ]
  },
  {
    "featureType": "road.local",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#b58b94"
      }
    ]
  },
  {
    "featureType": "transit.line",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#e5e5e5"
      }
    ]
  },
  {
    "featureType": "transit.station",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#eeeeee"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry",
    "stylers": [
      {
        "color": "#c9c9c9"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "geometry.fill",
    "stylers": [
      {
        "color": "#9ae4e4"
      }
    ]
  },
  {
    "featureType": "water",
    "elementType": "labels.text.fill",
    "stylers": [
      {
        "color": "#9e9e9e"
      }
    ]
  }
]
};

var markers = [];

locationPage = document.location.href.split('public');

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
        url: locationPage[0]+"public/api/search_city/"+$('#search_city').val()
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

  $(document).on("click","#registeration_event",function(){

        console.log('click on registeration event');
        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/register_event/",
            data    : 'eventid='+$("#registeration_event").data("event-id")
        }).done(function(data){
            console.log(data);
            if(data == true){
                $("#registeration_event").hide();
                $("#cancel_registeration_event").show();
            }
        });
    });

    $(document).on("click","#cancel_registeration_event",function(){

        console.log('click on cancel registeration event');
        $.ajax({
            type    : "POST",
            url     : locationPage[0]+"public/api/cancel_registeration_event/",
            data    : 'eventid='+$("#cancel_registeration_event").data("event-id")
        }).done(function(data){
            console.log(data);
            if(data == true){
                $("#cancel_registeration_event").hide();
                $("#registeration_event").show();
            }
        });
    });

    $(document).on("click", ".cancelling-cross", function(){
        $("#event_view").empty();
        $('#event_view').hide();
    });

});

function initMap() {
  	map = new google.maps.Map(document.getElementById('map'), mapOptions );

    category = null;
    type = null;
    date = null;
	  marker = [];
    position = '';
    if(navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position){
            map.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
        });
        map.setZoom(5);
    }
    searchEventWithParam();

    function searchEventWithParam(){

        if(date == ''){
            date = null;
        }

        $.ajax({
            type: "POST",
            dataType: 'json',
            url: locationPage[0]+"public/api/search_event/",
            data: 'category_id='+category+'&type_id='+type+'&date='+date
        }).done(function(datas){
            putMarker(datas);
        });
    }

    function deleteMarker(){
        for (var i = 0; i < marker.length; i++) {
            marker[i].setMap(null);
        }
    }

    function putMarker(datas){

        deleteMarker();// Vide la map de tout les markers

        for(key in datas){
            var myLatLng = {lat: parseFloat(datas[key]['coor_lat']), lng: parseFloat(datas[key]['coor_lng'])};
            marker[key] = new google.maps.Marker({
                content: datas[key]['id'],
                position: myLatLng,
                map: map,
                icon: locationPage[0]+"public/assets/img/pinmap.png",
                title: datas[key]['name']
            });

            google.maps.event.addListener(marker[key], "click", function(event){
                $('#event_view').empty();
                $('#event_view').show();
                $.ajax({
                    dataType: 'html',
                    url: locationPage[0]+"public/api/search_event_element/"+this.content
                }).done(function(html){
                    $('#event_view').append(html);
                });
            });

            google.maps.event.addListener(map, "click", function(event){
                $('#event_view').hide();
            });

        }
    }

    $("#category").change(function(){
        category = ($("#category").val());
        searchEventWithParam();
    });

    $("#type").change(function(){
        type = ($("#type").val());
        searchEventWithParam();
    });

    $("#date").change(function(){
        date = ($("#date").val());
        searchEventWithParam();
    });
}
