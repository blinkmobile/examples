$account = $t->runLoginStatusInteraction();

// TODO: do NOT use this array in production! only an example!
$users = array(
	'ron' => 'blah',
	'louise' => 'blah',
	'ray' => 'blah'
);
// TODO: make sure these groups match actual groups in the answerSpace
$userGroups = array(
	'ron' => array('staff', 'tech'),
	'louise' => array('staff', 'edu'),
	'ray' => array('staff', 'support')
);

// TODO: replace all $t->(s|g)etSessionValue() usage with calls to your own authentication (web) service

$html = '';
$error = '';
$status = '';

// debug;
//$html .= '<b>$account</b>' . gettype($account) . '<pre>' . print_r($account, true) . '</pre>';
//$html .= '<b>$_POST</b>' . gettype($_POST) . '<pre>' . print_r($_POST, true) . '</pre>';

if (!empty($_POST)) {
  // received login details, process login
  if (isset($_POST['username'], $_POST['password'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    // checking to see if login data is valid
    if (array_key_exists($username, $users) && $users[$username] === $password) {
      $account = array(
        'username' => $username, // used internally, displayed if no "name"
        'name' => ucwords($username), // displayed if defined [optional]
        'groups' => $userGroups[$username] // array of Interaction Group IDs for access control
      );
      $t->setSessionValue('account', $account);
      if(method_exists($t, "triggerEvent")) {
		  //this will restart the session
	      $t->triggerEvent("LOGGEDIN");
      }
    } else { // invalid login, scrubbing session
 
      $error = 'invalid username and/or password';
      $t->setSessionValue('account', null);
      $account = null;
    }
  }
}

// check to see if we need to log out
if (isset($_GET['logout']) || (isset($_GET['args']) && is_array($_GET['args']) && isset($_GET['args']['logout']))) {
  $t->setSessionValue('account', null);
  $account = null;  
  $status = 'successfully logged out';
	if(method_exists($t, "triggerEvent")) {
		//this will destroy existing session
	    $t->triggerEvent("LOGGEDOUT");
    }
}

if (empty($account)) {
 // not logged in, so asking for user  for login details
  $html .= '<center><form action="?" method="POST" style="display: inline-block; width: auto; text-align: right; margin: 2em auto;">';
  $html .= '<label>Username: <input type="text" name="username" required /></label><br />';
  $html .= '<label>Password: <input type="password" name="password" required /></label>';
  $html .= '<p><input type="submit" name="submit" value="login" /></p>';
  $html .= '</form></center>';
} else {
  // logged in, so showing user status and prompting for logout
  if (isset($account['name'], $account['username']) && $account['username'] !== $account['name']) {
    $name = $account['name'] . ' (' . $account['username'] . ')';
  } else {
    $name = $account['name'];
  }
  $html .= '<center>';
  $html .= '<p>You are currently logged in as ' . $name . '.</p>';
  $html .= '<form action="?" method="GET" style="display: inline-block; width: auto; margin: 2em auto;">';
  $html .= '<p><input type="submit" name="logout" value="log out" /></p>';
  $html .= '</form>';
  $html .= '</center>';
}

// show messages
$html .= '<center><p style="color: #a00;">' . $error . '</p>';
$html .= '<p style="color: #0a0;">' . $status . '</p></center>';

return $html;
