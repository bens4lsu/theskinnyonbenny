<html>
<head>
<?php include ('tracking.php') ?>

<meta name=description content="Video Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, Thai Singer, Beagle Playing">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="https://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
</head>
<body style="background-color:#B5B5CD;">

<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$clip_id = isset($_GET["clipID"]) ? $_GET["clipID"] : 0;


//print_r (${$get_variable_array});
//print_r ($clip_id);

$clips = file_get_contents ('http://vimeo.com/api/v2/video/'.$clip_id.'.xml');
$xml = new SimpleXMLElement ($clips);
foreach ($xml->children() as $node ){
	$title = $node->title;
	$description = $node->description;
	$width=($node->width <= 640)?$node->width:640;
	$height=($node->width <= 640)?$node->height:$node->height*640/$node->width;
}
?>

<div style="width:640px; margin-left:auto; margin-right:auto;">

<h2 style="text-align:left; padding-bottom:30px;"><?php echo $title; ?></h2>

<div style="text-align:right"><!-- <object><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=3975526&amp;server=vimeo.com&amp;show_title=1&amp;show_byline=0&amp;show_portrait=0&amp;color=666698&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=<?php echo $clip_id; ?>&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=666698&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></embed></object> -->


<iframe src="http://player.vimeo.com/video/<?php print $clip_id; ?>?title=0&amp;byline=0&amp;portrait=0&amp;color=666698" width="<?php print $width; ?>" height="<?php print $height; ?>" frameborder="0"></iframe>
</div>

<div style="margin-top:20px; margin-left:6px; text-align:left; "><?php echo $description; ?></div>
</div>
</body>
</html>