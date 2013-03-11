// ##### YOUR ASSIGNED CREDENTIALS #####

$key = 'youraccesskey';
$secret = 'yourpassword';

// ##### CONSTRUCT JSON START #####

$json =  new stdClass();

// ##### your_device_token retrieved using javascript code from https://github.com/blinkmobile/examples/blob/master/javascript/getPushID.js #####
$json->device_tokens = array('your_device_token');

// ##### Aliases and tags will be implemented with the up and coming mADL Command #####
//$json->aliases = array('your_user_id');
//$json->tags = array('tag1','tag2'); // tags are currently not allowed!
// #####  #####

$json->aps =  new stdClass();
$json->aps->badge = "+1";
$json->aps->alert = 'Alert text here!';

// ##### For this temporary release sounds are cat, pig, cow, frog #####
$json->aps->sound = 'cat.caf';


// ##### The URL you want the notification to open on, Omit this if you just want an standard alert#####
$url = "https://d.blinkm.co/blinkexpress/Pickups/";
$json->blinkpayload = new stdClass();
$json->blinkpayload->url = $url;

$json_string = json_encode($json);
// print_r($json_string);

// ##### CONSTRUCT JSON END#####


$CURLOPT_USERPWD = $key . ':' . $secret;

$curl_options = array(
  CURLOPT_HTTPAUTH => CURLAUTH_ANY,
  CURLOPT_USERPWD => $CURLOPT_USERPWD,
  CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
  CURLOPT_CUSTOMREQUEST => 'POST',
);

$t->fetch('https://d.blinkm.co/_api/interaction/run/bmppush/push', $json_string, null, null, null, null, $curl_options);


if($t->fetch_info['http_code'] != 200){
 
	//print_r($t->fetch_info);
  $t->prepend('Something went wrong. Status code: ' . $t->fetch_info['http_code'] . ' returned.' . "\r\n\r\n");
  return $t->result;
  
}

return $t->result;
