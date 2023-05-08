<?php

	require_once("../classAmazonLibrary.php");
	$artist = isset($_GET['artist']) ? urldecode($_GET['artist']) : '';
	$album = isset($_GET['album']) ? $_GET['album'] : '';
	$song = isset($_GET['song']) ? $_GET['song'] : '';

	$am = new AmazonProductAPI();
	$key = "$artist; $song; $album";

    $params = Array(
        "Operation"=>'ItemSearch',
        "SearchIndex"=>'MP3Downloads',
        "ResponseGroup"=>'ItemAttributes,Tracks,Images',
        "Keywords"=>$key
    );

	$xml_response=$am->queryAmazon($params);
    $url = isset($xml_response->Items->Item[0]->DetailPageURL) ? $xml_response->Items->Item[0]->DetailPageURL : 'amazonNotFound.php';
    header( 'Location: '.$url);

?>