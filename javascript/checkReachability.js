function checkReachability() {
  $.ajax({
    url: 'YOUR.URL/HERE',
    type: 'GET',
    cache: false,
    error: function () {
      deviceVars.isOnline = false;
    },
    success: function () {
      deviceVars.isOnline = true;
    },
    complete: function () {
      setTimeout(checkReachability, 5 * 60 * 1000); // 5 minutes
    }
  });
}
setTimeout(checkReachability, 5 * 60 * 1000); // 5 minutes

/*
Note: you could use setInterval instead, but this is not good practice, especially for short intervals.
Using setTimeout like this guarantees that test runs won't accidentally overlap.
*/

/*
The reason that we don't do this within the platform by default, is that this will use additional power
and additional cellular data. As such, your frequency should be a careful compromise between user
experience and battery/data use.
*/
