<html>
<head>
</head>
<body>

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$get_variable_array="HTTP_GET_VARS";
if(isset(${$get_variable_array}["clip_id"])){ $clip_id=${$get_variable_array}["clip_id"]; }

$clipdetails = file_get_contents ('http://vimeo.com/api/clip/'.$clip_id.'.xml');
$xml = new SimpleXMLElement ($clipdetails);

$title = $xml->xpath('/clips/clip/title');
$caption = $xml->xpath('/clips/clip/caption');

//print $title[0];
//print $caption[0];
?>

<h2><?php echo $title[0]; ?></h2>


<div style="margin-left:20px"><object width="401" height="267"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $clip_id; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=666698&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $clip_id; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=666698&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="401" height="267"></embed></object></div>

<div style="margin-top:20px; margin-left:20px;"><?php echo $caption[0]; ?></div>

</body>
</html>