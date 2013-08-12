// With drawBasicMap:
// first set up the map variables to use
$mapOptions = array(
"longitude" => "151.316274", // location longitude to centre map
"latitude" => "-33.424065", // location latitude to centre map
"zoom" => 15, // number from 1 to 20, the higher the number the map is more zoomed in
"type" => "roadmap", // satellite, terrain and hybrid are also available
"marker" => true, // show marker at location
"sensor" => false, // fire up GPS and show user's current location
);
 
$t->map("drawBasicMap", $mapOptions);

return $t->result;


