<html>
<head>
<?php include ('tracking.php') ?>

<title>What My Itunes is Playing</title>
<meta name=description content="Music Playlists Page for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Music, iTunes, Playlist, MostRecent,">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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

	<?php
		include ('classPlaylist.php');
		
		$Pl = array();

		// for every xml in the directory, create a playlist object
		if ($handle = opendir('./playlists')) {
			while (($file = readdir($handle)) !== false) {
				if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".xml") {
				   $Pl[$file]=new Playlist('./playlists/'.$file);
				}
			}
		}

		$thisPl = isset($_GET['pl']) ? $_GET['pl'] : 'RecentlyPlayed.xml';

		// print out the playlist for the one selected
		
		//print $Pl[$thisPl]->ShowObjectData();
		
    ?>

        <p>The playlist page gets a daily update from iTunes on my Mac.  If you see some embarassing songs on here, be sure to give me a hard time about it.  I'll probably just claim that I was listening to good music on Pandora or something, but this is the raw truth.  Nothing I can do about it but stop listening to embarassing stuff.</p>

        <p>If you are a nerd who is curious how to do any of this, I'll post a blog on <a href="concordbusinessservicesllc.com">my tech blog</a> one day soon.</p>

        <p><a href="#listbottom">Jump to list of other playlists</a></p>

        <div id="playlistWide">
            <?php
                print '<h2>'.$Pl[$thisPl]->PlaylistName().'</h2>';
                print '<div style="margin:2em 3em;">'.$Pl[$thisPl]->PlaylistComment().'</div>';
                print $Pl[$thisPl]->HtmlTable(); 
            ?>
        </div>
		

    <?php
        //links to all of the other playlists
		ksort($Pl);
		if (count($Pl) > 1){
			print '<p id="listbottom">Other Playlists:</p><p>';
			foreach ($Pl as $plKey => $plObj) {
				if ($plKey != $thisPl) {
					print '<a href="https://theskinnyonbenny.com/Playlists.php?pl='.$plKey.'">'.$Pl[$plKey]->PlaylistName().'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
			}
			print '</p>';
		}
	?>
	
	</div>
		

<div>
<?php include("indexFooter.php");	?>
</div>


</div>
</body>
</html>

