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

sort($files);
$i = 0;
while (substr($files[$i],0,4) > $now_array["year"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) > $now_array["mon"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) == $now_array["mon"] && substr($files[$i],6,2) > $now_array["mday"])
	$i++;
$year = substr($files[$i],0,4);
$month = substr($files[$i],4,2);
$day = substr($files[$i],6,2);
echo "window.location=\"https://theskinnyonbenny.com/dailyphoto/2007/page.php?year=".$year."&month=".$month."&day=".$day."\"";

?>

</SCRIPT>
</HEAD>
<body></body></html>