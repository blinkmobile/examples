$answerSpace = 'support'; // the answerSpace you are in
$interaction = 'gps'; // the interaction you are editing NOTE: no spaces allowed!

if($_POST['coords']){

	// you get in here after a successful GeoLocation read 

	
	//$t->setSessionValue('rawLocation', $_POST); // save raw location

	// use Google Reverse Geocoding
	$latitude = $_POST['coords']['latitude'];
	$longitude = $_POST['coords']['longitude'];
	$t->fetch('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude . '&sensor=false');
	
	
//	$t->setSessionValue('locationParts', $t->result); // save location parts

	$address_parts = json_decode($t->result);

	$street_address = $address_parts->results[0]->formatted_address;

	return 'Your location is ' . $street_address . '  with Latitude =  '.$latitude .' and Longitude =  '.$longitude;
	
	$theorigin = $longitude. " ' ". $longitude;

}

$val = $t->getSessionValue('gps');

//print_r($val);

$temp = <<<ABC

<script type="text/javascript">
(function(window, undefined) {
var $ = window.jQuery,
  navigator = window.navigator,
  geolocation,
  options = {
    enableHighAccuracy: true,
    timeout: 10 * 1000, // take no longer than 10 seconds
    maximumAge: 30 * 1000 // accept locations that are 30 seconds old
  };

function onSuccess(position) {
 var location;
	var coords;
	if (position.coords) {
		coords = {
   	latitude: position.coords.latitude,
		  longitude: position.coords.longitude,
 	  altitude: position.coords.altitude,
   	accuracy: position.coords.accuracy,
	   	altitudeAccuracy: position.coords.altitudeAccuracy,
 		heading: position.coords.heading,
   	speed: position.coords.speed
	 	};
		location = {coords: coords};
		$.post('/_api/interaction/run/$answerSpace/$interaction', location).always(function(data, status, jqxhr) {
 		if (jqxhr.status === 0 || jqxhr.status === 200 || jqxhr.status === 304) {
 			$("#geolocationoutput").html(data);
		  } else {
				$("#geolocationoutput").html('Error: could not process GeoLocation (' + status + ', ' + jqxhr.status + ').');
			}
		});
	}
}

function onError(error) {
  // do something, Google or see documentation for examples
  $("#geolocationoutput").html('GeoLocation failed.');
}

if (typeof $ !== 'undefined' && $.type(navigator) === 'object') {
  geolocation = navigator.geolocation;
  if ($.type(geolocation) === 'object') {
    // waiting before doing location stuff, just in case
    setTimeout(function() {
      geolocation.getCurrentPosition(onSuccess, onError, options);
    }, 1000);
  }
  else {
    alert('This content requires features that are not available on your device or browser.');
  }
}
else {
  alert('This content requires features that are not available on your device or browser.');
}

}(this));
</script>
<div id='geolocationoutput'>Acquiring GeoLocation...</div>
<noscript><p>This content requires JavaScript to be enabled.</p></noscript>
ABC;

return $temp;




if($args[0]=='1') {

$mapOptions = Array(
   'origin' => $theorigin,
   'destination' => '1 Eastern Avenue, Bilinga QLD 4225',
   'sensor' => ($args[0]=='1'?true:false)
);

$t->map('directions', $mapOptions);
$t->prepend('<h2>Directions to Coolangatta Airport</h2><h4>From: ' . ($args[0]=='1'?'Your current location':$args[0]) . '</h4><br>');
return $t->result ;



} else {


// use location from selection

$mapOptions = Array(
   'origin' => $args[0],
   'destination' => '1 Eastern Avenue, Bilinga QLD 4225',
   'sensor' => ($args[0]!='1'?true:false)
);
$t->map('directions', $mapOptions);
$t->prepend('<h2>Directions to Coolangatta Airport</h2><h4>From: ' . ($args[0]=='1'?'Your current location':$args[0]) . '</h4><br>');
return $t->result ;





};









