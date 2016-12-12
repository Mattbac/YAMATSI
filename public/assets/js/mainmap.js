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

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );

  google.maps.event.addListener(map, "click", function(event){
    var lat = event.latLng.lat();
    var lng = event.latLng.lng();
    zoom = map.getZoom();
    new google.maps.Circle({
      strokeColor: '#0000FF',
      strokeOpacity: 0.2,
      strokeWeight: 1,
      fillColor: '#0000FF',
      fillOpacity: 0.2,
      map: map,
      center: {lat, lng},
      radius: 40});
  });

}

/* ----------------------------------------- */



