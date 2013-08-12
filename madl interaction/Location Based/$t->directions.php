// Place this code in the Input Prompt of your madl interaction.
//--------------------------------------------------------------------

<arg>
 <prefix>Mapping is easy using Blink Mobile's Interaction Software Solutions.{NL}Origin{SP}</prefix>
 <select>
<option value="1">My Current Location</option>
<option value="125 Donnison Street, Gosford, New South Wales">Blink Mobile Gosford</option>
<option value="5 – 17 Young Street Sydney NSW 2000">Acresta</option>
<option value="Bennelong Point, Sydney NSW 2000">Sydney Opera House</option> 
</select>
 <suffix>{NL}</suffix>
</arg>
<arg>
 <prefix>Destination{SP}</prefix>
  <select>
 <option value="125 Donnison Street, Gosford, New South Wales">Blink Mobile Gosford</option>
<option value="5 – 17 Young Street Sydney NSW 2000">Acresta</option>
<option value="Bennelong Point, Sydney NSW 2000">Sydney Opera House</option> 
</select>
 <suffix>{NL}</suffix>
</arg>
<arg>
 <prefix>Mode{SP}</prefix>
 <select>
  <option value="driving">driving</option>
  <option value="walking">walking</option>
  <option value="bicycling">bicycling</option>
 </select>
 <suffix>{NL}</suffix>
</arg>
<arg>
 <prefix>Type{SP}</prefix>
 <select>
  <option value="roadmap">Road Map</option>
  <option value="satellite">Satellite</option>
  <option value="terrain">Terrain</option>
 <option value="hybrid">Hybrid</option>
 </select>
</arg>

//--------------------------------------------------------------------
// Place this code in the Input Prompt of your madl interaction.

$mapOptions = Array(
'origin' => $args[0],
'destination' => $args[1],
'travelMode' => $args[2], // optional, also 'walking' or 'bicycling'
'avoidHighways' => false, // optional
'avoidTolls' => false, // optional
'type' => $args[3], // optional, also 'satellite', 'terrain' or 'hybrid'
'sensor' => true // optional, defaults to false
);

//origin and destination may also be arrays specifying separate 'latitude' and 'longitude'

//note that if sensor is true and available on device, missing origin or destination will be filled in with GPS

//both missing origin and destination will result in error message

$t->map('directions', $mapOptions);



return $t->result;
