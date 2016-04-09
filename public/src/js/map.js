// google.maps.event.addDomListener(window, 'load', init);
//
//function init() {
//    // Basic options for a simple Google Map
//    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
//    var mapOptions = {
//        zoom: 11,
//        center: new google.maps.LatLng(40.6700, -73.9400), // New York
//        styles: [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#193341"}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#2c5a71"}]},{"featureType":"road","elementType":"geometry","stylers":[{"color":"#29768a"},{"lightness":-37}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#406d80"}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#3e606f"},{"weight":2},{"gamma":0.84}]},{"elementType":"labels.text.fill","stylers":[{"color":"#ffffff"}]},{"featureType":"administrative","elementType":"geometry","stylers":[{"weight":0.6},{"color":"#1a3541"}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#2c5a71"}]}]
//    };
//
//    var mapElement = document.getElementById('footerMap');
//
//    var map = new google.maps.Map(mapElement, mapOptions);
//
//    var marker = new google.maps.Marker({
//        position: new google.maps.LatLng(40.6700, -73.9400),
//        map: map,
//        title: 'Snazzy!'
//    });
//}


 function initMap() {

     // Specify features and elements to define styles.

     var styleArray = [
         {
             "featureType": "all",
             "elementType": "geometry",
             "stylers": [
                 {
                     "color": "#4e6890"
                 }
             ]
         },
         {
             "featureType": "all",
             "elementType": "labels.text.fill",
             "stylers": [
                 {
                     "gamma": 0.01
                 },
                 {
                     "lightness": 20
                 }
             ]
         },
         {
             "featureType": "all",
             "elementType": "labels.text.stroke",
             "stylers": [
                 {
                     "saturation": -31
                 },
                 {
                     "lightness": -33
                 },
                 {
                     "weight": 2
                 },
                 {
                     "gamma": 0.8
                 }
             ]
         },
         {
             "featureType": "all",
             "elementType": "labels.icon",
             "stylers": [
                 {
                     "visibility": "off"
                 }
             ]
         },
         {
             "featureType": "landscape",
             "elementType": "geometry",
             "stylers": [
                 {
                     "lightness": 30
                 },
                 {
                     "saturation": 30
                 }
             ]
         },
         {
             "featureType": "poi",
             "elementType": "geometry",
             "stylers": [
                 {
                     "saturation": 20
                 }
             ]
         },
         {
             "featureType": "poi.park",
             "elementType": "geometry",
             "stylers": [
                 {
                     "lightness": 20
                 },
                 {
                     "saturation": -20
                 }
             ]
         },
         {
             "featureType": "road",
             "elementType": "geometry",
             "stylers": [
                 {
                     "lightness": 10
                 },
                 {
                     "saturation": -30
                 }
             ]
         },
         {
             "featureType": "road",
             "elementType": "geometry.stroke",
             "stylers": [
                 {
                     "saturation": 25
                 },
                 {
                     "lightness": 25
                 }
             ]
         },
         {
             "featureType": "water",
             "elementType": "all",
             "stylers": [
                 {
                     "lightness": -20
                 }
             ]
         }
     ]


     var myLatLng ={lat:59.967061, lng:30.2471994};

     // Create a map object and specify the DOM element for display.
     var map = new google.maps.Map(document.getElementById('footerMap'), {
         center: myLatLng,
         scrollwheel: false,
         // Apply the map style array to the map.
         styles: styleArray,
         zoom: 15
     });
     var image = '/images/logo-map.png';
     var marker = new google.maps.Marker({
         position: myLatLng,
         map: map,
         icon: image,
         title: 'NUMIDAL',
         animation: google.maps.Animation.DROP,
     });
     marker.addListener('click', toggleBounce);
     function toggleBounce() {
          if (marker.getAnimation() !== null) {
            marker.setAnimation(null);
          } else {
            marker.setAnimation(google.maps.Animation.BOUNCE);
          }
     }
 }
initMap();