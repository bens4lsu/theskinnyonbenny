<?php

if ($handle = opendir('./dailyphoto/2022/')) {
	while (($file = readdir($handle)) !== false) {
    if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".jpg")
       $files[]=$file;
    }
}

$now_array = getdate();
rsort($files);
$i=0;

while (substr($files[$i],0,4) > $now_array["year"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) > $now_array["mon"] || substr($files[$i],0,4) == $now_array["year"] && substr($files[$i],4,2) == $now_array["mon"] && substr($files[$i],6,2) > $now_array["mday"]){
	$i++;
}
$year = substr($files[$i],0,4);
$month = substr($files[$i],4,2);
$day = substr($files[$i],6,2);
?>

<h2>The Daily Photo</h2>

<?php 

if ($i < count($files)){
	// print "$i-$year-$month-$day";
	echo "<img src=\"/dailyphoto/".$year."/".$year.$month.$day.".jpg\" width=\"178\">"; ?>
	<p>Have you seen them all?  Check the <a href="/dailyphoto">daily photo page</a> to be sure.</p>
	<?php
}
else {  ?>
		<p>The daily photo is away for a short vacation.</p><p>Check back in a few days for more.</p>
	<?php
	
}