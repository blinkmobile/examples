  /**
 * SET CAMERA / IMAGE ANNOTATIONS FOR BMP
 * Modified Ray Pearce 3/11/2014 
 * BIC2 Only at this stage.
 * Answerspace setup=>Native Application=>camera options must be set to allowEdit	true
 * 
 * This script will allow you to add annotations support for Blink forms
 * Add script below to HTML HEAD in answerspace setup to allow all camera / image fields
 * to allow annotations. 
 */
 
 
<script>

  $(document).on('viewReady', function() {

  try{

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


 
  currentConfig.cameraOptions = JSON.stringify(_.extend(JSON.parse(currentConfig.cameraOptions), {"shouldAnnotate":true}))
 
  }catch (e) {// END try  
    log(e);
  }
  
});
  
</script>