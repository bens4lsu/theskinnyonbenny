<?php

	function showVideo($clip_id){  
	
		$clips = file_get_contents ('http://vimeo.com/api/v2/video/'.$clip_id.'.xml');
		$xml = new SimpleXMLElement ($clips);
		foreach ($xml->children() as $node ){
			$title = $node->title;
			$description = $node->description;
			$width=($node->width <= 640)?$node->width:640;
			$height=($node->width <= 640)?$node->height:$node->height*640/$node->width;
		}
		print '<h3 style="text-align:left; padding-bottom:30px;">'.$title.'</h3>';
		print '<iframe src="http://player.vimeo.com/video/'.$clip_id.'?title=0&amp;byline=0&amp;portrait=0&amp;color=666698" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
		print '<div style="margin-top:20px; margin-left:6px; text-align:left; ">'.$description.'</div>';
		
	}

	$now = time(); 
 	$your_date = strtotime("2019-01-29");
 	$postForThisManyDays = 15;
	$datediff = $now - $your_date;
	$numWeeks = floor($datediff/(60*60*24*$postForThisManyDays));

	$newClips = array (314079416);	
	
	if (isset($newClips[$numWeeks])){
		print '<h2>Video</h2><p>You\'re in luck. You\'ve checked in while there is new video posted!</p>';
		showVideo($newClips[$numWeeks]);
	}
	else {
		//$AllVideos = array();
		//$AlbumsForRandomPicks = array (2116098  //Home Movies V&K, starting Sept. 2012
		//							,1818656    //Home Movies V&K, starting Jan 2012
		//							,1730821	//Russia Trip Family Videos
		//							,1508748	//Home Movies V:  Dec 2010 - Nov 2011
		//							,1671571	//Lake George
		//							,1623831	//Heather and Vanya Make Cookies
		//							,1087859	//Home Movies V:  Nov 2009 - Nov 2010
		//							,3359		//Home Movies V:  July 2007 - Oct 2009
		//							,1769241	//Interesting, Unusual, or Funny - Volume 2
		//							,20180		//Interesting, Unusual, or Funny - Volume 2
		//							,171964		//Saints Playoffs 2010 
		//							,24431);
		//foreach ($AlbumsForRandomPicks as $albumID){
		//	$clips = file_get_contents ('http://vimeo.com/api/v2/album/'.$albumID.'/videos.xml');
		//	$xml = new SimpleXMLElement ($clips);
		//	foreach ($xml->children() as $node ){
		//		//print_r($node);
		//		$AllVideos[] = $node->id;
		//	}
		//}
		//print_r($AllVideos);
		//print '<h2>Video</h2><p>A random video from my collection...</p>';
		//showVideo($AllVideos[array_rand($AllVideos)]);
	}
?>