var map;

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );
  for(key in tweets){
    new google.maps.Circle({
      strokeColor: '#0000FF',
      strokeOpacity: 0.2,
      strokeWeight: 1,
      fillColor: '#0000FF',
      fillOpacity: 0.2,
      map: map,
      center: tweets[key]['position'],
      radius: 50});
  }
}

var mapOptions = {
  zoom: 15,
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

/* ----------------------------------------- */



