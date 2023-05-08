<html>
<head>
<?php include ('../tracking.php') ?>

<title>What My Itunes is Playing</title>
<meta name=description content="Music Playlists Page for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Music, iTunes, Playlist, MostRecent,">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="http://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="http://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("http://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
	#amzn_widget {margin-left:auto;margin-right:auto;display:block;margin-top:20px;}
</style>

</head>

<body>

<div class="topleft"><img src="http://theskinnyonbenny.com/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("../menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content" class="widecolumn">

		<p>The Amazon API didn't return a url for this track.  Your other window is still open, so you can just close this and go about your day.</p>
		
		<p>Alternatively, here are a list of top Indy Rock tracks at Amazon that you can listen to now.</p>
		
		<div>
			<script>
				var amzn_wdgt={widget:'MP3Clips'};
				amzn_wdgt.tag='widgetsamazon-20';
				amzn_wdgt.widgetType='Bestsellers';
				amzn_wdgt.browseNode='624869011';
				amzn_wdgt.title='Top Indy Rock';
				amzn_wdgt.width='250';
				amzn_wdgt.height='250';
				amzn_wdgt.shuffleTracks='True';
			</script>
			<script src='http://wms.assoc-amazon.com/20070822/US/js/swfobject_1_5.js'>
			</script>
		</div>		
	</div>
		

<div>
<?php include("../indexFooter.php");	?>
</div>


</div>
</body>
</html>

