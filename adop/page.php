<html>
<head>
<?php include ('../tracking.php') ?>

<title></title>
<meta name=description content=" ">
<meta name=keywords content=" ">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="http://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="/img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="http://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("http://theskinnyonbenny.com/img/headers/header-russia.jpg") no-repeat bottom center; }
	#footer { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
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

	<?php 
		$fn = isset($_GET["fn"]) ? $_GET["fn"] : 'ad_home.content';
		if (file_exists('./'.$fn)){
			include ('./'.$fn); 
		}
		else {
			include ('/.ad_home_k.content');
		}
	?>

	</div>

	<?php include("../indexFooter.php");	?>

</div>
</body>
</html>