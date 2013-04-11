/*Add this script to HTML Head of answerspace */

<script>
$(document).on('viewReady', function() {
// this = the .view element
/* TODO: insert code to run after a view has been enhanced with Stars, Forms, Maps, etc */

if(window.device){
/*if you're running the AS in the native app*/

var element = document.getElementById('deviceProperties');
element.innerHTML = 'Device Name: ' + window.device.name + '<br />' + 
'Device Cordova: ' + window.device.cordova + '<br />' + 
'Device Platform: ' + window.device.platform + '<br />' + 
'Device UUID: ' + window.device.uuid + '<br />' + 
'Device Version: ' + window.device.version + '<br />';

}else{
/*if you're running this on the browser */

var element = document.getElementById('deviceProperties');
element.innerHTML = "This device does not run cordova. <br /> <br />" +
"window.device is undefined - you're probably " +
"running this as a web app, not a native app.";

}
});
</script>

/*Create an interaction with the following code to display the results
echo '<p id="deviceProperties">Alerts should pop up here... </p>';
*/