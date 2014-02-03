/**
 * SET CAMERA / IMAGE ANNOTATIONS FOR BLINK FORMS
 * Modified Ray Pearce 3/2/2014 
 * iOS devices Only at this time
 * Will work with Blink Native Client is added in 2.2.1 or  (Master App 1.12)
 * 
 * Answerspace setup=>Native Application=>camera options must be set to allowEdit	true
 * 
 * This script will allow you to add annotations support for Blink forms
 * Add script below to HTML HEAD in answerspace setup to allow all camera / image fields
 * to allow annotations. 
 */


var old_updateCurrentConfig = updateCurrentConfig;

updateCurrentConfig = function() {
//call the existing updateCurrentConfig
old_updateCurrentConfig();

console.log('enabling image annotations'); 
//enable image annotation
if (currentConfig.cameraOptions) {
currentConfig.cameraOptions = JSON.stringify(_.extend(JSON.parse(currentConfig.cameraOptions), {"shouldAnnotate":true}));
console.log('cameraOptions extended to support annotations');
} else {
currentConfig.cameraOptions = '{"shouldAnnotate":true}';
console.log('cameraOptions created to support annotations');
}
}

  



 * with the 2013M31 RC release, it should be possible to use these by programatically changing the camera plugin options on form load or on form field button press. The following code will add the shouldAnnotate option to the answerSpace configuration: * to allow annotations. 
 */
 
 currentConfig.cameraOptions = JSON.stringify(_.extend(JSON.parse(currentConfig.cameraOptions), {"shouldAnnotate":true}))