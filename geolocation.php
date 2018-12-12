<!DOCTYPE html>
<html>
<body>
<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>
<form method="post" class="form" action="store_location.php"><button onclick="drukHom()">Druk hom</button></form>



<p id="demo"></p>

<script>
var x = document.getElementById("demo");
var ll = [];
function drukHom() {
  var XHR = new XMLHttpRequest();
  XHR.onreadystatechange = function(status, state) {
  }
  XHR.open('POST','store_location.php');
  XHR.send(ll);
}
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition, showError);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {

  var lat = position.coords.latitude;
  var long = position.coords.longitude;
  
  ll[0] = long;
  ll[1] = lat;
  console.log(ll);
  x.innerHTML = "Latitude: " + position.coords.latitude + 
  "<br>Longitude: " + position.coords.longitude;
}

function showError(error) {
  switch(error.code) {
    case error.PERMISSION_DENIED:
      x.innerHTML = "User denied the request for Geolocation."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML = "Location information is unavailable."
      break;
    case error.TIMEOUT:
      x.innerHTML = "The request to get user location timed out."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML = "An unknown error occurred."
      break;
  }
}
</script>

</body>
</html>