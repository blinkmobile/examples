/* The new twitter api requires an oAuth connection for all twitter functions.
You must register for an app at https://dev.twitter.com and get oAuth credentials.
*/

// code for your mADL interaction.


function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach($params as $key=>$value){
        $r[] = "$key=" . rawurlencode($value);
    }
    return $method."&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
}

function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach($oauth as $key=>$value)
        $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
}

$url = "https://api.twitter.com/1.1/statuses/user_timeline.json";

/*
provide the required credentials from  https://dev.twitter.com
*/

$oauth_access_token = "YOUR ACCESS TOKEN";
$oauth_access_token_secret = "YOUR ACCESS TOKEN SECRET";
$consumer_key = "YOUR CONSUMER KEY";
$consumer_secret = "YOUR CONSUMER SECRET";

$oauth = array( 'oauth_consumer_key' => $consumer_key,
                'oauth_nonce' => time(),
                'oauth_signature_method' => 'HMAC-SHA1',
                'oauth_token' => $oauth_access_token,
                'oauth_timestamp' => time(),
                'oauth_version' => '1.0');

$base_info = buildBaseString($url, 'GET', $oauth);
$composite_key = rawurlencode($consumer_secret) . '&' . rawurlencode($oauth_access_token_secret);
$oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
$oauth['oauth_signature'] = $oauth_signature;

// Make Requests
$header = array(buildAuthorizationHeader($oauth), 'Expect:');
$options = array( CURLOPT_HTTPHEADER => $header,
                  //CURLOPT_POSTFIELDS => $postfields,
                  CURLOPT_HEADER => false,
                  CURLOPT_URL => $url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false);
                  
                  
$t->fetch($url,"", $header,"","" ,"",$options);

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



