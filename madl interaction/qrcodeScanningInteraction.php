$html = '

<script>

function formatAMPM(date) {
  var elem = document.getElementById("para1");
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? \'pm\' : \'am\';
  hours = hours % 12;
  hours = hours ? hours : 12; // the hour \'0\' should be \'12\'
  minutes = minutes < 10 ? \'0\'+minutes : minutes;
  var strTime = hours + \':\' + minutes + \'\' + ampm;
  return strTime;
 }


var thisTimeIn = formatAMPM(new Date());
//console.log(thisTimeIn);

//TESTING
/*
$("#testPushLink").click(function() {

var message = "123456";
var thisTimeStamp = new Date().getTime();

$.post("//d.blinkm.co/_api/interaction/run/blinkscan/sendPush?t=" + thisTimeStamp, 
{ barcode : message },
function(data) {

 	$("div#scanningResults").html(data);
 
  console.log(data);
//data is the reply form the interaction
});



});
*/

//END OF TESTING



$("#ScanBarCode").click(function() {
    var barcodereader = window.cordova.require(
            "cordova/plugin/BGBarcodeReader"),
        bfo = this;

    /*
     * Function to be called after successfully reading a barcode.
     */



  var onSuccess = function(message) {
      


//navigator.notification.alert(message);

if (message !== null && message !== "") {

  
 	//console.log(message);
 	
//$("div#scanningResults").html("<h3 style=\"margin-left:0px;\" >Sending Push notification in 5 seconds</h3>Close your app now to view notification<br /><br />");

$("div#scanningResults").html("<h3 style=\"margin-left:0px;\" >Authenticating...</h3><br /><br />");

      
//Passing timestamp as URL param to get around ajax caching
var thisTimeStamp = new Date().getTime();
 	
$.post("//d.blinkm.co/_api/interaction/run/blinkscan/sendPush?t=" + thisTimeStamp,
{ barcode : message },
function(data) {

//$("div#scanningResults").html(data);

$("div#scanningResults").html("<h3>Login Complete</h3><span class=\"subHeading\">Employee ID:</span>  " + message + "<br /><br /><span class=\"subHeading\">Name:</span> David Hasselhoff<br /><span class=\"subHeading\">Position:</span> Lifeguard<br /><span class=\"subHeading\">Tower:</span> Centre Beach<br /><span class=\"subHeading\">Time In:</span> " + thisTimeIn + "<br /><br /><br />You have successfully signed in, and your manager has been notified.<br /><br />");
 
  console.log(data);
//data is the reply form the interaction
}); 	



} //end of message check


    };

    /*
     * Function to be called after an error.
     */
    var onError = function(message) {
        console.log(message);
        navigator.notification.alert(message);
    };

    barcodereader.getBarcode(onSuccess, onError, []);

		//return "Scanning...";

});


</script>';



$html .= '<div style="text-align:right; display:block; height:140px;"><input type="button" class="scanButton" style="float:right; display:inline-block;" value="" id="ScanBarCode">
</div>

<br />
<h2 id="testPushLink">Lifeguard Timesheet:</h2>
<div id="scanningResults" class="scanResultsDisplay">Please clock-in by scanning the QR Code on your tower</div>
<br /><br />
';

return $html;

