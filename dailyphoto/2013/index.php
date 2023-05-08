<html><head>
<?php include ('../../tracking.php') ?>

<SCRIPT language="JavaScript">

<?php

$now_array = getdate();

if ($handle = opendir('.')) {
	while (($file = readdir($handle)) !== false) {
    if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".jpg")
       $files[]=$file;
    }
}

//rsort($files);
if (count($files) > 0) {
	$i = 0;
	while (substr($files[$i],0,4) > $now_array["year"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) > $now_array["mon"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) == $now_array["mon"] && substr($files[$i],6,2) > $now_array["mday"])
		$i++;
	$year = substr($files[$i],0,4);
	$month = substr($files[$i],4,2);
	$day = substr($files[$i],6,2);
	echo "window.location=\"http://theskinnyonbenny.com/dailyphoto/2013/page.php?year=".$year."&month=".$month."&day=".$day."\"";
}
else {
	//there are no photos for this year yet
	echo "window.location=\"http://theskinnyonbenny.com/dailyphoto/index.php";

}


?>

</SCRIPT>
</HEAD>
<body></body></html>