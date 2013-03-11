/*  This javascript is used to retrieve the device token from the device for use in the BMP.
Simply place thejavascript below in the answerspace setup->HTML Head field.
You will need to create a mADL interaction for the ajax request.(mADL code is at the bottom.)
    
*/

setTimeout(function(){

   if(window.cordova){
     
    var push = window.BGpushNotification;
    
    push.getPushID(function (id) {
       if (id) {
             //navigator.notification.alert("***** Got push ID: " + id)
             
             // make AJAX request
             $.ajax({
                 type: "POST",
                 url: '/_api/interaction/run/youranswerspace/SAVEDEVICETOKEN',
                 data: {device_token:id}
             }).done(function( msg ) {
                //navigator.notification.alert( "Result: " + msg );
             })
            .fail(function() {
              //navigator.notification.alert("error");
             });
  
             
         }
                            
       });
    
   
   }
          

}, 5000);




    /*
// SAVEDEVICETOKEN madl code

if($_POST['device_token']) {
	$t->setSessionValue('device_token', $_POST['device_token']);
}
return $t->getSessionValue('device_token') . ' saved';

   */