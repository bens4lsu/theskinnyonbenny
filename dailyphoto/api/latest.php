<?php

$dir =  date("Y");
$files = array();

if ($handle = opendir('../'.$dir)) {
	while (($file = readdir($handle)) !== false) {
    if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".jpg")
       $files[]=$file;
    }
}
if(count($files) > 0) {
	rsort($files);
	print json_encode(["lastDate" => substr($files[0], 0, 8)]);
}
else {
    print '{}';
}