<?php

// note:  chmod folder to 775, recursive, before running.  chmod back to 755 after complete.

$strDateToFreeStart = '2017-02-23';
//$strDateToFreeEnd = '2017-02-01';

$strDateToFreeEnd = isset($strDateToFreeEnd) ? $strDateToFreeEnd : $strDateToFreeStart;
$dtFreeStart = new DateTime($strDateToFreeStart);
$dtFreeEnd = new DateTime($strDateToFreeEnd);
$interval = $dtFreeStart->diff($dtFreeEnd);
$interval = new DateInterval('P'.($interval->days + 1).'D');  // find the interval to move.  Need to add a day.

if ($handle = opendir('.')) {
	while (($file = readdir($handle)) !== false) {
    if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".jpg")
       $files[]=$file;
    }
}

rsort($files);
foreach ($files as $file){
	$strFileDate = substr($file, 0, 4).'-'.substr($file, 4, 2).'-'.substr($file, 6, 2);
	$dtFileDate = new DateTime($strFileDate);
	if ($dtFileDate >= $dtFreeStart){
		$strFileOldName = $dtFileDate->format('Ymd');
		$dtFileNewDate = $dtFileDate->add($interval);
		$strFileNewName = $dtFileNewDate->format('Ymd');
		print "$strFileDate $strFileOldName $strFileNewName<br>";
//		rename ($strFileOldName.'.jpg', $strFileNewName.'.jpg');
//		rename ($strFileOldName.'.txt', $strFileNewName.'.txt');
	}
}