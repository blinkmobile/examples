 $options = array(

'longitude' => '151.703274', // location longitude to centre map

'latitude' => '-32.892165', // location latitude to centre map

// This KML file contains all the University of Newcastle's emergency phones.

'kml' => 'http://maps.google.com/maps/ms?msa=0&msid=118298040996036209313.00046a78b38a91b0bf95c&output=kml',

);

$t->map('drawMapFromKML', $options);

return $t->result;

