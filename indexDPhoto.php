<?php

$link = file_get_contents("https://dynamic.theskinnyonbenny.com/dp/currentImg");
?>

<h2>The Daily Photo</h2>

<img src="<?php echo $link; ?>" width="178">
<p>Have you seen them all?  Check the <a href="/dailyphoto">daily photo page</a> to be sure.</p>
