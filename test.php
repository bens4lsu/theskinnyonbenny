<?php

	require_once('amazonLibrary.php');

    $params = Array(
        "Operation"=>'ItemSearch',
        "SearchIndex"=>'MP3Downloads',
        "ResponseGroup"=>'ItemAttributes,Tracks,Images',
        "Keywords"=>'2Pac,	God Bless the Dead [#],	Greatest Hits'
    );
    
    $am = new AmazonProductAPI();
    $xml_response=$am->queryAmazon($params);
    print '<pre>';
    print_r($xml_response);
    print '</pre>';
    $asin = $xml_response->Items->Item[0]->ASIN;
    $url = $xml_response->Items->Item[0]->DetailPageURL;
    
    print '<br><br>'.$asin.'<br><br>'.$url;

?>