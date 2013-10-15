<script type="text/javascript">

var mobile_url = "http://blinkm.co/answerSpaceName";

if (screen.width < 800 || (navigator.userAgent.match(/android/i)) ) {
  // the following IF statement can be used to target particular pages (the alternative is to only include the script on the relevant pages)
  // if (location.pathname.toLowerCase() == '/default.aspx' || location.pathname.toLowerCase() == '/') { // page check IF statement
       var desktop = getQsParameterByName("desktop");
	var doRedirect = false;
       if (desktop == "1") {
           document.cookie = "desktop=1";
       } else if (desktop == "0") {
           document.cookie = "desktop =0";
           doRedirect=true;
       } else {
           if (getCookie("desktop") != "1") {
               doRedirect=true;
           }
       }
	if(doRedirect==true){
		/*
		if(confirm("Do you wish to view our mobile site?"))
			document.location = mobile_url;
		else
			document.cookie = "desktop=1";
		*/
		document.location = mobile_url;
	}
   //} // end page check IF statement
}

function getCookie(c_name) {
   var i, x, y, ARRcookies = document.cookie.split(";");
   for (i = 0; i < ARRcookies.length; i++) {
       x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
       y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
       x = x.replace(/^\s+|\s+$/g, "");
       if (x == c_name) {
           return unescape(y);
       }
   }
   return null;
}

function getQsParameterByName(name) {
   name = name.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");
   var regexS = "[\\?&]" + name + "=([^&#]*)";
   var regex = new RegExp(regexS);
   var results = regex.exec(window.location.search);
   if (results == null) return "";
   else return decodeURIComponent(results[1].replace(/\+/g, " "));
}

</script>


