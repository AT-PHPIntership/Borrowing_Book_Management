var myCenter=new google.maps.LatLng(latitude, longitude);
var marker;

function initialize()
{
  var number = parseInt(number_zoom);
  var mapProp = {
  center:myCenter,
  zoom: number,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };

var map=new google.maps.Map(document.getElementById("map"),mapProp);

var marker=new google.maps.Marker({
  position:myCenter,
  animation:google.maps.Animation.BOUNCE
  });

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);