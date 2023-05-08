<html>
<head>
<?php include ('tracking.php') ?>

<title>Ben's Video Collections</title>
<meta name=description content="Video Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, Thai Singer, Beagle Playing">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="https://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="https://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("https://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
</style>
</head>
<body>

<div class="topleft"><img src="https://theskinnyonbenny.com/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content" class="widecolumn">
	<p style="padding-bottom:45px">Click the heading or thumbnail photo to the collection to see all videos in that collection.</p>

	<?php

		foreach($VidAlbumsToInclude as $albumID){
			$albumInfo = file_get_contents('http://vimeo.com/api/v2/album/'.$albumID.'/info.xml');
			$xmlInfo = new SimpleXMLElement ($albumInfo);
				
			//print '<pre>';
			//print_r ($xmlInfo);
			//print '</pre>';

			$albumTitle = $xmlInfo->album->title;
			$albumDescription = $xmlInfo->album->description;
			$albumThumbnail = $xmlInfo->album->thumbnail_medium;
			print '<DIV style="padding-bottom:45px; clear:both;"><h2><a href="vMain.php?albumID='.$albumID.'">'.$albumTitle.'</a></h2><a href="vMain.php?albumID='.$albumID.'"><img style="padding-bottom:45px; float:right;" src="'.$albumThumbnail.'"></a><p>'.$albumDescription.'</p></div>';
		}
	?>


	</div>

	<?php include("indexFooter.php");	?>
</div>

</body>
</html>