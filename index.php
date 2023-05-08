<?php /*include("lpoll/lp_source.php");*/?>
<html>
<head>
<?php include ('tracking.php') ?>

<title>Ben's Web Site</title>
<meta name=description content="Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<META name="y_key" content="dca1695099725ef5" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="https://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<script language="javascript" src="https://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("https://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
	h2 {padding-bottom:1em;}
</style>
</head>
<body>

<div class="topleft"><img src="https://theskinnyonbenny.com/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content">
		<div id="mm"><?php include("indexMainMess.html"); ?></div>
		<div id="vid"><?php include("indexTopVideo.php"); ?></div>
		<div id="tw"><?php include("indexTwitter.php"); ?>
				<div id="insult">
					<img src="/img/shelly1.jpg" alt="shelly">
					<div class="caption">"I don't think the new layout of the skinny.  Too busy.  You suck."  -- Shelly Williams, February 15, 2011 via text message</div>
				</div>
		</div>
		<div id="bl"><?php include ('indexcurrblog2.php'); ?></div>
		<div id="dp"><?php include("indexDPhoto.php");?></div>
        <!-- rotgut files post -->
		<!--<div id="rg"><?php include("indexrotgut.php");?></div>-->

        <div id="playlist">
            <?php include("indexPlTable.php"); ?>
        </div>

        <!--
        <div id="bottom">
			<div id="b1"><a href="http://clustrmaps.com/counter/maps.php?url=https://theskinnyonbenny.com" id="clustrMapsLink"><img src="http://clustrmaps.com/counter/index2.php?url=https://theskinnyonbenny.com" border=1 alt="Locations of visitors to this page"onError="this.onError=null; this.src='http://www.meetomatic.com/images/clustrmaps-back-soon.jpg'; document.getElementById('clustrMapsLink').href='http://clustrmaps.com/'"></a></div>
			<div id="b2"><?php include('indexGoodreads.php'); ?></div>
			<div id="b3">
				<img src="/img/webcamstill.jpg" style="padding-bottom:0.5em; display:block;">
				Here's what you would have seen had you checked my webcam on September 11, 2008.  <a href="vidWebcam.php">See if I'm broadcasting live right now.</a>
			</div>
		</div>
        -->

	<?php include("indexFooter.php");?>
	</div>


</div>
</body>
</html>