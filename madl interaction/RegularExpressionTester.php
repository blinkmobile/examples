// compatible with BIC v3.0.x

// set default values if we don't have any
if (!array_key_exists('args', $_GET) || !is_array($_GET['args']) || empty($_GET['args'])) {
  $_GET['args'] = array();
  $_GET['args']['regex'] = '^(\d+\/?[a-zA-Z0-9]+)$';
  $_GET['args']['value'] = '10a';
}

// do some sanitisation, we don't want no stinkin' white-space 'round these parts
$_GET['args']['regex'] = preg_replace('/\s/', '', $_GET['args']['regex']);
$_GET['args']['value'] = preg_replace('/\s/', '', $_GET['args']['value']);

// prepare the values we'll be putting back into the HTML
$regex = htmlspecialchars($_GET['args']['regex']);
$value = htmlspecialchars($_GET['args']['value']);

// the HTML pattern attribute assumes matching against the whole string
// so ^...$ is unnecessary and actually not conformant to the specification
$pattern = $regex;
$pattern = ltrim($pattern, '^');
$pattern = rtrim($pattern, '$');

$html = <<<EOF
  <form method="GET" action".">
  	<label>
  		regex
	  	<input name="regex" pattern="\S+" value="$regex" />
	  </label>
  	<label>
  		value
	  	<input name="value" pattern="$pattern" value="$value" />
	  </label>
	  <input type="submit" name="submit" value="submit" />
	  <input type="reset" value="reset" />
  </form>
EOF;

if ($_GET['args']['regex']) {
  $matches = array();
  // importantly, we don't allow clients to submit the regex modifiers
  // rather, we wrap the provided regex with the delimiters ourselves here
  preg_match('/' . $_GET['args']['regex'] . '/', $_GET['args']['value'], $matches);
  $output = '';
  if (empty($matches)) {
    $output .= '<p>no match :(</p>';
  } else {
    $output .= '<p>match! :D</p>';
  }
  $output .= '<pre><output>' . htmlspecialchars(print_r($matches, true)) . '</output></pre>';
  $html .= $output;
}

//$html .= '<pre><output>' . htmlspecialchars(print_r($_GET, true)) . '</output></pre>';

return $html;
