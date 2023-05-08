<!DOCTYPE html>
<html>
<head>
<?php include ('tracking.php') ;

	$gal = $_GET['spgmGal'];
	$path = "./img/gal/{$gal}/";
	$path1 = rawurlencode("/img/gal/{$gal}/");
	$gal_desc = file_get_contents($path."gal-desc.txt");
	
	$defaultImgPath = "https://theskinnyonbenny.com/img/gal/".rawurlencode($gal)."/data/normal.jpg";


?>

<title>Ben's Photo Collections</title>
<meta name=description content="Photo Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, LSU, New Orleans, Sugar Bowl, Thailand, Halloween">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="https://theskinnyonbenny.com/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<link rel="image_src" href="<?php print $defaultImgPath; ?>" />
<meta property="og:image" content="<?php print $defaultImgPath; ?>" />
<script language="javascript" src="https://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
body { background: url("/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
#page { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
#header { background: url("https://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
#footer { background: url("https://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
td, td.caption {margin-left:auto;margin-right:auto;text-align:center;}
</style>

<link rel="stylesheet" href="https://theskinnyonbenny.com/lightview.css" type="text/css" />

<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script language="javascript" type="text/javascript" src="./js/excanvas.js"></script>
<script language="javascript" type="text/javascript" src="./js/lightview.js"></script>
<script language="javascript" type="text/javascript" src="./js/spinners.min.js"></script>
<style>
	.lightview {
		margin:12px;
		display:inline-block;
		vertical-align:middle;
	}
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
    <div style="margin-bottom:30px;"><a href="pgHome.php"><< Back to List of Galleries</a></div> 
    
    

    <?php
    
	
	print $gal_desc;
	$picDescArray = file($path."pic-desc.txt", FILE_IGNORE_NEW_LINES); //explode(file_get_contents($path."pic-desc.txt"),"\n");
	
	?>
	
	<div style="float:right; background-color:#CDCDCD; border:2px solid #AD7070; width:280px; padding:7px;" class="datestamp">Picture Navigation: Click any thumbnail to open the full size image and caption.  When the full image appears, you can scroll to the next using left and right buttons to the corresponding side of the picture.  Your keyboard's arrow keys should also work, as will the scroll wheel on most computers.</div>
	
	<?php
    
	foreach($picDescArray as $pic){
		$imgFileName = substr($pic, 0, strpos($pic, '|'));
		$thbFileName = urlencode("_thb_".$imgFileName);
		$imgFileName = urlencode($imgFileName);
		$caption = htmlspecialchars(substr($pic, strpos($pic, '|') + 1));
		print "<a class=\"lightview\" href=\"{$path}{$imgFileName}\" data-lightview-caption=\"{$caption}\" data-lightview-group=\"group1\"><img src=\"{$path}{$thbFileName}\" alt=\"{$imgFileName}\"></a>".PHP_EOL;
	}
    
    ?>
</div></div>
</body>
</hmtl>


