/****************************************

LEFT AND RIGHT SWIPE DETECTION FOR BLINKFORM PAGE TURNING

Sam Stephens - BlinkMobile

Note: Requires hammer.js and jquery.hammer.js scripts

*****************************************/


var directionSwiped = "";

$("#answerBox").hammer({
    prevent_default: false,
    drag_vertical: false
})

.bind("hold tap doubletap transformstart transform transformend dragstart drag dragend release swipe", function(ev) {

   // CHECK SWIPE DISTANCE TO MAKE SURE WE DON'T GET ACCIDENTAL SWIPES
   // DEFAULT SET TO 100
   if (ev.distance > 100) {

      if (ev.direction == "right") {
         directionSwiped = "right";
      }else if (ev.direction == "left") {
         directionSwiped = "left"; 
      }
   
   }


   // WHEN FINGER IS RELEASED FROM SCREEN
   if (ev.type == "release") {

      // TRIGGER A CLICK ON VISIBLE ELEMENTS ONLY
      // (IE. THE CURRENT PAGE'S NEXT/PREV BUTTONS)
      if (directionSwiped == "left") {
         $('button[data-page="next"]:visible').trigger('click');
      }else if (directionSwiped == "right") {
         $('button[data-page="previous"]:visible').trigger('click');   
      }

      // EMPTY THE DIRECTIONSWIPED VARIABLE NOW THAT WE'VE FINISHED
      directionSwiped = "";

   }

});
