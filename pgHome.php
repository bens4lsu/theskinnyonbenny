<?php 
	include("spgm/spgmlib.php");
	$InitWidth = 1024;
	$InitHeight = 768;

	$arrGalleries = spgm_CreateGalleryArray('', 1);

	// filter out galleries.  configure in pgHideGalleries.php

	include ('pgHideGalleries.php');
	foreach($arrGalleries as $key=>$value){
		$galNum = substr($value, 0, 3);
		if (in_array($galNum, $Hides)){
			unset ($arrGalleries[$key]);
		}	
	}

	rsort($arrGalleries);
?>

<html>
<head>
<?php include ('tracking.php') ?>

<title>Ben's Photo Collections</title>
<meta name=description content="Photo Site for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Baton Rouge, LSU, New Orleans, Sugar Bowl, Thailand, Halloween">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" href="/style.css" type="text/css" media="screen" />
<link rel="shortcut icon" href="img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
	td, td.caption {margin-left:auto;margin-right:auto;text-align:center;}
</style>

<script language="Javascript" type="text/javascript">

<!--

<?php  //script for hover effects


	$numGalleries = count ($arrGalleries);
	for ($i = 0; $i < $numGalleries; $i++){
		$key=str_replace(" ","",$arrGalleries[$i]);              //get rid of spaces, commas, or hyphens in the variable name
		$key=str_replace(".","",$key);
	    $key=str_replace("-","",$key);
	    $key=str_replace("'","",$key);
	    $keyred=$key."Red";
	    $Decl = "img".$key." = new Image;\n";
		$Decl = $Decl."img".$keyred." = new Image;\n";
		$Decl = $Decl."img".$key.".src = \"img/gal/".$arrGalleries[$i]."/data/normal.jpg\";\n";
		$Decl = $Decl."img".$keyred.".src = \"img/gal/".$arrGalleries[$i]."/data/red.jpg\";\n";
		echo $Decl;
	}

?>





function chgImg (imgName, newImg){
 var i = document.getElementsByName(imgName)[0];
 i.src = eval (newImg + ".src");
}

//-->
</script>

</head>

<body>

<div class="topleft"><img src="/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content" class="widecolumn">
		
	<h2>The Photo Collections...</h2><p>Click on any of the pictures in this part of the page to open the whole set of photos for that collection.  If this is your first trip in, give it a minute.  It may take this page a little while to load all of the pictures, but I like having one big giant list of my photo albums in one place.</p>

	<table border="0" cellpadding="2em" cellspacing="0" width="100%" height="1">

		<?php  //This code builds the pictures and captions on the home page.

			// load from spgm files

			$i = 0;
			while ($i < $numGalleries){
				if ($i%2 == 0){
					echo "<tr>\n";
					$Capt1 = str_replace ("%20", " ", $arrGalleries[$i]);
					$arrCapt1 = explode(" - ",$Capt1, 2);
					$id = $arrCapt1[0];
					$Capt1 = $arrCapt1[1];
				}
				$key=str_replace(" ","",$arrGalleries[$i]);              //get rid of spaces, commas, or hyphens in the variable name
				$key=str_replace(".","",$key);
				$key=str_replace("-","",$key);
	    		$keyred=$key."Red";

	    		$arrGalleries[$i] = str_replace(" ", "%20", $arrGalleries[$i]);

	    		$PicLink = "<td width=\"50%\" height=\"113\">\n";
				$PicLink = $PicLink."<a href=\"https://dynamic.theskinnyonbenny.com/gal/".$id."\" target=\"_blank\"";
				$PicLink = $PicLink." onmouseover=\"chgImg ('i".$key."','img".$keyred."');\" ";
				$PicLink = $PicLink." onmouseout=\"chgImg ('i".$key."','img".$key."');\" >\n";

				$PicLink = $PicLink."<img border=\"0\" src = \"img/gal/".$arrGalleries[$i]."/data/normal.jpg\" height=\"109\" name =\"i".$key."\"></a>\n";
				$PicLink = $PicLink."</td>\n\n";
				echo $PicLink;

				if ($i%2 == 1){
					echo "</tr>\n\n";
					$Capt2 = str_replace ("%20", " ", $arrGalleries[$i]);
					$arrCapt2 = explode(" - ",$Capt2, 2);
					$Capt2 = $arrCapt2[1];

					echo "<tr><td width=\"50%\" height=\"38\" class=\"caption\">".$Capt1."<td width=\"50%\" height=\"38\" class=\"caption\">".$Capt2."</td></tr>\n\n";
				}
				$i++;

			}

			//finish the table if there was an odd number
			if ($i%2 == 1){
				echo "</tr>\n\n";
				echo "<tr><td width=\"50%\" height=\"38\" class=\"caption\">".$Capt1."<td width=\"50%\" height=\"38\"></td></tr>\n\n";
			}

		?>

    </table>

	</div>

<?php include("indexFooter.php");	?>
</div>


</div>
</body>
</html>

