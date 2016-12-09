var map, zoom = 15;
marker = 10;

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

var compteurGlobal = 0;
function lookup(compteur){
    if(compteur == compteurGlobal){
        recherche();
    }
}

$(function() {
  $('#search_city').on("change", compteur());

  function compteur(){
    compteurGlobal++;
    setTimeout("lookup("+compteurGlobal+")", 800);
  }

  recherche = function(){
    console.log($('#search_city').val());

    $.ajax({
      url: "http://localhost/YAMATSI/public/api/search_city/f"+$('#search_city').val()
    }).done(function(data){
      console.log(data);

    });
  }
});

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );

  google.maps.event.addListener(map, "click", function(event){
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();

    if(marker !== new google.maps.Marker()){
      marker = new google.maps.Marker({
        position: {lat, lng},
        map: map,
        icon: 'http://localhost/YAMATSI/public/assets/img/music_icon.png',
        message: 'dfhgsdfg',
        title: 'Hello World!'});

    }else{
      marker.setPosition({lat, lng});
    }
  });

}

/* ----------------------------------------- */



