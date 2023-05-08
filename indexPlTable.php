<h2>My iTunes Recently Played....</h2>
<?php
    include ('classPlaylist.php');
	$pl = new Playlist ('./playlists/RecentlyPlayed.xml');
	$plTable = $pl->HtmlTableNarrow(10);
	print $plTable;
?>
<p><a href="Playlists.php">See more details...</a></p>