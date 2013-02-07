function getLocationForForm(fe_answerspace, fe_interaction,fe_streetNumber, fe_streetName, fe_suburb, fe_state, fe_country, fe_postcode, fe_message) {

// First set the paras for the gps.
var $ = window.jQuery,
navigator = window.navigator,
geolocation,

options = {

enableHighAccuracy: true,

timeout: 10 * 1000, // take no longer than 10 seconds

maximumAge: 30 * 1000 // accept locations that are 30 seconds old

};


// returning Success Function

function onSuccess(position) {

  var thisCoords = position.coords;
  var thisLat=thisCoords.latitude;
  var thisLong=thisCoords.longitude;
  var thisAccuracy=thisCoords.accuracy;
  
// Display a message in the forms fields while the gps is gathering the location data.


if(!!fe_streetNumber){
$("input[name='" + fe_streetNumber + "']").val(fe_message);
}
if(!!fe_streetName){
$("input[name='" + fe_streetName + "']").val(fe_message);
}
if(!!fe_suburb){
$("input[name='" + fe_suburb + "']").val(fe_message);
}
if(!!fe_state){
$("select[name='" + fe_state + "']").val(fe_message);
}
if(!!fe_postcode){
$("input[name='" + fe_postcode + "']").val(fe_message);
}
if(!!fe_country){
$("input[name='" + fe_country + "']").val(fe_message);
}


// Now fire the requesting interaction to check the Google API
$.post(

'/_api/interaction/run/' + fe_answerspace + '/' + fe_interaction + '?args[0]=' + thisLat + '&args[1]=' + thisLong,

position

).always(function(data, status, jqxhr) {

if (jqxhr.status === 0 || jqxhr.status === 200 || jqxhr.status === 304) {

var mapReturnData = $.parseJSON(data);
  
var streetNumber, streetName, suburb, state, country, postcode;
  
  
  jQuery.each(mapReturnData.results[0].address_components, function(i, val) {
    
    if (val.types[0] == "street_number") streetNumber = val.long_name;
    if (val.types[0] == "route") streetName = val.long_name;
    if (val.types[0] == "locality") suburb = val.long_name;
    if (val.types[0] == "administrative_area_level_1") state = val.short_name;
    if (val.types[0] == "country") country = val.long_name;
    if (val.types[0] == "postal_code") postcode = val.long_name;
      
    
   });
  
// Now add the values returned in the forms fields.data.

if(!!fe_streetNumber){
$("input[name='" + fe_streetNumber + "']").val(streetNumber);
} 
if(!!fe_streetName){
$("input[name='" + fe_streetName + "']").val(streetName);
} 
if(!!fe_suburb){
$("input[name='" + fe_suburb + "']").val(suburb);
} 
if(!!fe_state){
$("select[name='" + fe_state + "']").val(state);
} 
if(!!fe_postcode){
$("input[name='" + fe_postcode + "']").val(postcode);
} 
if(!!fe_country){
$("input[name='" + fe_country + "']").val(country);
} 



var exraDataString = thisLat + '%%' + thisLong  + '%%' + thisAccuracy + '%%' + streetNumber + ' ' + streetName + '%%' + country;

$("input[name='extraData']").val(exraDataString);


} else {

$("#geolocationoutput").html('Error: could not process GeoLocation (' + status + ', ' + jqxhr.status + ').');

}

});

}



function onError(error) {

// do something, Google or see documentation for examples

alert ("Unable to find current location");
if(!!fe_streetNumber){
$("input[name='" + fe_streetNumber + "']").val('');
} 
if(!!fe_streetName){
$("input[name='" + fe_streetName + "']").val('');
} 
if(!!fe_suburb){
$("input[name='" + fe_suburb + "']").val('');
} 
if(!!fe_state){
$("select[name='" + fe_state + "']").val('');
} 
if(!!fe_postcode){
$("input[name='" + fe_postcode + "']").val('');
} 
if(!!fe_country){
$("input[name='" + fe_country + "']").val('');
} 


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

  //}(this));
}
 
