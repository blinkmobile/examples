$screen_name = "blinkmob";

// And the number of tweets you want to be returned.

$count = "10";

// The rest is already done.

$t->fetch("https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=".$screen_name."&count=".$count);

$json = json_decode($t->result);

echo '<div style="color: #ffffff; font-size: 1.5em; font-weight: bold;">Twitter Feed @BlinkMob</div>';

echo '<div class="twitter_container" style="background-color: #ffffff"; >';

echo"<table>";

foreach ($json as $tweet) {

echo"<tr><td>";

echo '<img src="'.$tweet->user->profile_image_url.'" class="twitter_image">';

echo '<a href="http://www.twitter.com/'.$tweet->user->name.'">'.$tweet->user->name.'</a><br> ';

echo $tweet->text;

echo"</td></tr> ";

}

echo"</table>";

echo '</div>';

/*
You also need to place some CSS in the interactions Advanced->Style sheet area.
You may want to create an override for phones and reduce the .twitter_container font size down to 8 to stop the text jumping out of the frame.

*/

.twitter_container{

color:#444;

font-size:12px;

margin: 0 auto;

}

.twitter_container a{

color:#0066CC;

font-weight:bold;

}

.twitter_status{

height:60px;

padding:6px;

border-bottom:solid 1px #DEDEDE;

}

.twitter_image{

float:left;

margin-right:14px;

border:solid 2px #DEDEDE;

width:50px;

height:50px;

}

.twitter_posted_at{

font-size:11px;

padding-top:4px;

color:#999;

}



