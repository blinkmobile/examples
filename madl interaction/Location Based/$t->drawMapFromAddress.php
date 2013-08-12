// Place this code in the Input Prompt of your madl interaction.
//--------------------------------------------------------------------

<arg>
 <prefix>Enter Suburb and state</prefix>
</arg>

//--------------------------------------------------------------------
// Place this code in the madl code of your madl interaction.

$mapOptions = array(
"address" => $args[0], // any string you would type into Google Maps search
"zoom" => 16, // number from 1 to 20, higher is more zoomed in (optional)
"type" => "roadmap", // or satellite, terrain or hybrid (default, optional)
"marker" => true, // show marker at location (default, optional)
"markerColors" => 'FF00', // RGB color (default, optional)
"sensor" => false, // fire up GPS and show user's current location (default, optional)
);

$t->map("drawMapFromAddress", $mapOptions);

$t->prepend('<h3>Map Search</h3><p><b>Result for:</b> ' . $args[0] . '</p>');

return $t->result;
