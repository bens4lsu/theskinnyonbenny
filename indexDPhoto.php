<?php
<?php
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  

$link = file_get_contents("https://dynamic.theskinnyonbenny.com/dp/currentImg", false, stream_context_create($arrContextOptions));

?>

<h2>The Daily Photo</h2>

<img src="<?php echo $link; ?>" width="178">
<p>Have you seen them all?  Check the <a href="/dailyphoto">daily photo page</a> to be sure.</p>
