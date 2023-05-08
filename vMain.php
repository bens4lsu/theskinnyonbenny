<?php include("spgm/spgmlib.php");
$InitWidth = 1024;
$InitHeight = 768;

?>

<html>
<head>
<?php include ('tracking.php') ?>

<title>Ben's Videos</title>
<meta name=description content="Photo Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, LSU, New Orleans, Sugar Bowl, Thailand, Halloween">
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

	<div id="content" class="widecolumn" align="center">
				<?php

				ini_set('display_errors', 1);
				error_reporting(E_ALL);

				$albumID = isset($_GET["albumID"]) ? $_GET['albumID'] : 0;

				$albumInfo = file_get_contents('http://vimeo.com/api/v2/album/'.$albumID.'/info.xml');
				$xmlInfo = new SimpleXMLElement ($albumInfo);
				
//				print '<pre>';
//				print_r ($xmlInfo);
//				print '</pre>';

				$albumTitle = $xmlInfo->album->title;
				$albumDescription = $xmlInfo->album->description;

				print '<h2 style="text-align:left;">'.$albumTitle.'</h2>';
				print '<p style="text-align:left;">'.$albumDescription.'</p>';

				$clips = file_get_contents ('http://vimeo.com/api/v2/album/'.$albumID.'/videos.xml');
				$xml = new SimpleXMLElement ($clips);
				
//				print '<pre>';
//				print_r ($xml);
//				print '</pre>';

				/*  xml elements for each video

				<videos>
				  <video>
					<title>the oregon trail: prequel</title>
					<url>http://www.vimeo.com/314947</url>
					<id>314947</id>
					<description>this movie is rated d ...</description>
					<upload_date>2007-09-21 20:36:30</upload_date>
					<thumbnail_small>http://80.media.vimeo.com/...jpg</thumbnail_small>
					<thumbnail_medium>http://10.media.vimeo.com/...jpg</thumbnail_medium>
					<thumbnail_large>http://00.media.vimeo.com/...jpg</thumbnail_large>
					<user_name>Soxiam</user_name>
					<user_url>http://www.vimeo.com/soxiam</user_url>
					<user_portrait_small>http://assets.vimeo.com/...jpg</user_thumbnail_small>
					<user_portrait_medium>http://00.media.vimeo.com/...jog</user_thumbnail_medium>
					<user_portrait_large>http://70.media.vimeo.com/...jpg</user_thumbnail_large>
					<stats_number_of_likes>72</stats_number_of_likes>
					<stats_number_of_plays>3269</stats_number_of_plays>
					<stats_number_of_comments>43</stats_number_of_comments>
					<tags></tags>
				  </video>
				</videos>                                         */

				foreach ($xml->children() as $node ){

					//print_r ($xml);
					$width = 1.25* $node->width;
					$height = 2* $node->height;
					$title=str_replace("'","\'",$node->title);
					$title=str_replace(" ","",$title);  //IE doesn't like spaces in the window name
					echo '<div style="padding-bottom:45px;"><table width="100%"><tr><td colspan="2"><a name="#'.$node->id.'" href="javascript:void(0);" target="vidFrame" onclick="window.open(\'vShow.php?clipID='.$node->id.'\',\''.$title.'\',\'width='.$width.', height='.$height.' toolbar=no, location = no, directories=no, menubar=no, resizable=yes, scrollbars=no\'); return false;">'
						 .$node->title
						 .'</a></td></tr><tr><td width="40%" style="text-align:center;"><a name="#'.$node->id.'" href="javascript:void(0);" target="vidFrame" onclick="window.open(\'vShow.php?clipID='.$node->id.'\',\''.$title.'\',\'width='.$width.', height='.$height.' toolbar=no, location=no, directories=no, menubar=no, resizable=yes, scrollbars=no\'); return false;"><img src="'.$node->thumbnail_medium.'"></a></td><td>'.$node->description.'</td></tr></table>  '
						 .'</div>';
					
					//echo $node->title.'<br />';
					//echo $node->caption.'<br />';
					//echo $node->clip_id.'<br />';
					//echo $node->thumbnail_large.'<br />';
				}


				?>

	</div>

<?php include("indexFooter.php");	?>
</div>


</div>
</body>
</html>

