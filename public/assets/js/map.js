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
var markers = [];

function initMap() {
  map = new google.maps.Map(document.getElementById('map'), mapOptions );
    
    var contentString = '<div id="content">'+
                        '<div id="siteNotice">'+
                        '</div>'+
                        '<h1 id="firstHeading" class="firstHeading">Uluru</h1>'+
                        '<div id="bodyContent">'+
                          '<p><b>Uluru</b>, also referred to as <b>Ayers Rock</b>, is a large ' +
                          'sandstone rock formation in the southern part of the '+
                          'Northern Territory, central Australia. It lies 335&#160;km (208&#160;mi) '+
                          'south west of the nearest large town, Alice Springs; 450&#160;km '+
                          '(280&#160;mi) by road. Kata Tjuta and Uluru are the two major '+
                          'features of the Uluru - Kata Tjuta National Park. Uluru is '+
                          'sacred to the Pitjantjatjara and Yankunytjatjara, the '+
                          'Aboriginal people of the area. It has many springs, waterholes, '+
                          'rock caves and ancient paintings. Uluru is listed as a World '+
                          'Heritage Site.</p>'+
                          '<p>Attribution: Uluru, <a href="https://en.wikipedia.org/w/index.php?title=Uluru&oldid=297882194">'+
                          'https://en.wikipedia.org/w/index.php?title=Uluru</a> '+
                          '(last visited June 22, 2009).</p>'+
                        '</div>'+
                      '</div>';

    markers[0] = new google.maps.LatLng(50.5,4.4);
    markers[1] = new google.maps.LatLng(50.5,5.4);
    markers[2] = new google.maps.LatLng(50.5,6.4);
    markers[3] = new google.maps.LatLng(50.5,3.4);

    for(key in markers){

      marker = new google.maps.Marker({
        position: markers[key],
        map: map,
        icon: 'http://localhost/YAMATSI/public/assets/img/music_icon.png',
        title: 'Hello World!'});

      var infowindow = new google.maps.InfoWindow({
        content: contentString
      });

    }

    google.maps.event.addListener(marker, "click", function(event){
      infowindow.open(map, marker);
    });

}

/* ----------------------------------------- */



