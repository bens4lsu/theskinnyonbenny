<?php



$body = file_get_contents('Body.xml');

//load all mp4 files from the directory into an array
if ($handle = opendir('.')) {
	while (($file = readdir($handle)) !== false) {
		if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".mp4")
			$files[]=$file;
	}
}

rsort($files);
$tab = chr(9);
$nl = chr(13).chr(10);
$itemList = $nl;

for ($i = 0; $i < count($files); $i++){
	$file = $files[$i];

	$year = substr($files[$i],0,4);
	$month = substr($files[$i],4,2);
	$day = substr($files[$i],6,2);
	$pubDate = returnRFC2822DateTime ($year, $month, $day);
	$titleSummaryDuration = str_replace ($nl,$nl.$tab.$tab.$tab,file_get_contents($year.$month.$day.'.txt'));
	$fsize=filesize($file);

	$itemList = $itemList.$tab.$tab.'<item>'.$nl;
	$itemList = $itemList.$tab.$tab.$tab.$titleSummaryDuration.$nl;
	$itemList = $itemList.$tab.$tab.$tab.'<itunes:author>Ben Schultz</itunes:author>'.$nl;
	$itemList = $itemList.$tab.$tab.$tab.'<enclosure url="https://theskinnyonbenny.com/podcast/'.$file.'" length="'.$fsize.'" type="audio/mp4"/>'.$nl;
	$itemList = $itemList.$tab.$tab.$tab.'<guid>https://theskinnyonbenny.com/podcast/'.$file.'</guid>'.$nl;
	$itemList = $itemList.$tab.$tab.$tab.'<pubDate>'.$pubDate.'</pubDate>'.$nl;
	$itemList = $itemList.$tab.$tab.'</item>'.$nl;
}


$body = str_replace('<!-- Items Go Here -->',$itemList,$body);


printf ($body);


function returnRFC2822DateTime ($year, $month, $day){

	$utime = mktime (1,1,1,$month,$day,$year);
	$weekday=date('w',$utime);

	switch ($weekday){
		case 0:
			$dow = 'Sun';
			break;
		case 1:
			$dow = 'Mon';
			break;
		case 2:
			$dow = 'Tue';
			break;
		case 3:
			$dow = 'Wed';
			break;
		case 4:
			$dow = 'Thu';
			break;
		case 5:
			$dow = 'Fri';
			break;
		case 6:
			$dow = 'Sat';
			break;
	};

	switch ($month){
		case 1:
			$monthWordShort = 'Jan';
			break;
		case 2:
			$monthWordShort = 'Feb';
			break;
		case 3:
			$monthWordShort = 'Mar';
			break;
		case 4:
			$monthWordShort = 'Apr';
			break;
		case 5:
			$monthWordShort = 'May';
			break;
		case 6:
			$monthWordShort = 'Jun';
			break;
		case 7:
			$monthWordShort = 'Jul';
			break;
		case 8:
			$monthWordShort = 'Aug';
			break;
		case 9:
			$monthWordShort = 'Sept';
			break;
		case 10:
			$monthWordShort = 'Jan';
			break;
		case 11:
			$monthWordShort = 'Jan';
			break;
		case 12:
			$monthWordShort = 'Jan';
			break;
	};

	$output = $dow.', '.$day.' '.$monthWordShort.' '.$year.' 12:00:00 -0600';
	return $output;
}



?>