$t->fetch("http://api.flickr.com/services/feeds/photos_faves.gne?nsid=48533884@N04&lang=en-us&format=rss_200");

$xml = new SimpleXMLElement($t->result);
$ns = $xml->getNamespaces(true);

$count = 0;

$html = "<div id='Gallery'><table border='0' cellspacing='2' cellpadding='0'><tr><div class='gallery-row'>";

foreach ($xml->channel->item as $item) {

  $count += 1;
  $media = $item->children($ns['media']);
  $content = $media->content->attributes(); 
  $thumbnail=  $media->thumbnail->attributes();

$html .= "<td><div class='gallery-item'>";
$html .= "<a href='".$content['url']."'>";
$html .= "<img src='".$thumbnail['url']."' alt='". $item->title ."' height='100' width='100' /></a></div></td>
	"; 


  if ($count % 3 === 0) {
    $html .= "</div></tr><tr> <div class='gallery-row'>";
  }

}

$html .= "</tr></table></div><script type=\"text/javascript\">
captionAndToolbarHide = true;
setTimeout(function() {
$('#Gallery a').photoSwipe({
  backButtonHideEnabled: false
});
}, 503);
</script>";

return $html;