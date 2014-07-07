// TODO: instead of pulling from $t->getSessionValue(), contact web service
// TODO: store timestamp in the session, contact the web service only every (e.g.) 15 minutes
$account = $t->getSessionValue('account');

if (empty($account) || !is_array($account)) {
  return false;
} else {
  return $account;
}

/* example successful return
return array(
  'username' => 'user01',
  'name' => 'Bob', // [optional]
  'groups' => array() // Interaction Group IDs
);
*/
