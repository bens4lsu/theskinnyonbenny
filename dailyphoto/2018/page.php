<?php
include ("../ttcalendar.php");

if (phpversion()>="4.2.0"){
	$post_variable_array="_POST";
	$get_variable_array="_GET";
}
else{
	$post_variable_array="HTTP_POST_VARS";
	$get_variable_array="HTTP_GET_VARS";
}

#get values for year, month and day. Check post, then get

$now_array = getdate();

if(isset(${$post_variable_array}["year"])){ $year=${$post_variable_array}["year"]; }
if(isset(${$get_variable_array}["year"])){ $year=${$get_variable_array}["year"]; }
if(!isset($year)){ $year=$now_array["year"];}

if(isset(${$post_variable_array}["month"])){ $month=${$post_variable_array}["month"]; }
if(isset(${$get_variable_array}["month"])){ $month=${$get_variable_array}["month"]; }
if(!isset($month)){ $month=$now_array["mon"];}

if(isset(${$post_variable_array}["day"])){ $day=${$post_variable_array}["day"]; }
if(isset(${$get_variable_array}["day"])){ $day=${$get_variable_array}["day"]; }
if(!isset($day)){ $day=$now_array["mday"];}

//load all jpg files from the directory into an array
if ($handle = opendir('.')) {
	while (($file = readdir($handle)) !== false) {
    if (substr (mb_convert_case($file,MB_CASE_LOWER), -4, 4) == ".jpg")
       $files[]=$file;
    }
}
if(count($files) > 0)
	rsort($files);
	
$path = (!empty($_SERVER['HTTPS'])) ? 'https://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : 'http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$levels = 0;
for ($i = 0; $i <= $levels; $i++){
	$path = substr($path, 0, strrpos($path, '/'));
}
$fullimagepath = $path.'/'.$year.substr('0'.$month, -2).substr('0'.$day, -2).'.jpg';

?>

<html>
<head>
<?php include ('../../tracking.php') ?>

<title>Ben's daily photos on theskinnyonbenny.com</title>
<meta name=description content="Web Page for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Photo, Photoblog, Humor, Images">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<meta property="og:image" content="<?php print $fullimagepath; ?>" />
<meta property="og:description" content="" />
<link rel="stylesheet" type="text/css" href="http://theskinnyonbenny.com/style.css">
<link rel="shortcut icon" href="/img/headers/favicon.ico" type="image/x-icon" />
<script language="javascript" src="http://theskinnyonbenny.com/menu.js"></script>
<style type="text/css" media="screen">
	body { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bgcolor.jpg"); }
	#page { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/bg.jpg") repeat-y top; border: none; }
	#header { background: url("http://theskinnyonbenny.com/img/headers/header-theskinnyonbenny.jpg") no-repeat bottom center; }
	#footer { background: url("http://theskinnyonbenny.com/blog2/wp-content/themes/ben/images/footer.jpg") no-repeat bottom; border: none;}
	#header 	{ margin: 0 !important; margin: 0 0 0 1px; padding: 1px; height: 198px; width: 758px; }
	#headerimg 	{ margin: 7px 9px 0; height: 192px; width: 740px; }
</style>
</head>
<body>
<div class="topleft"><img src="http://theskinnyonbenny.com/img/BenPurpleGold.JPG"></div>
<div class="sb2"><?php include("../../menu2.php"); ?></div>

<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

	<div id="content" class="widecolumn">


		<?php
			if(count($files) > 0){
				if (strlen($month) == 1)
					$month="0".$month;
				if (strlen($day) == 1)
					$day="0".$day;

				if (!file_exists($year.$month.$day.".jpg"))
					include ("../noimage.php");
				else{
					switch ($month) {
						case 1:
						   $monthtext = "January";
							break;
						case 2:
						   $monthtext = "February";
							break;
						case 3:
							$monthtext = "March";
							break;
						case 4:
						   $monthtext = "April";
							break;
						case 5:
						   $monthtext = "May";
							break;
						case 6:
							$monthtext = "June";
							break;
						case 7:
						   $monthtext = "July";
							break;
						case 8:
						   $monthtext = "August";
							break;
						case 9:
							$monthtext = "September";
							break;
						case 10:
						   $monthtext = "October";
							break;
						case 11:
						   $monthtext = "November";
							break;
						case 12:
							$monthtext = "December";
							break;
					}

					echo "<div class = \"post\"><h2 style=\"padding-bottom:1.5em;\">".$monthtext." ".$day.", ".$year."</h2><div class = \"entry\">";
					if (file_exists ($year.$month.$day.".txt"))
						include ($year.$month.$day.".txt");
					echo "<br><br><center><img src=\"".$year.$month.$day.".jpg"."\"></center><br><br>";

				}

				$key = array_search ($year.$month.$day.".jpg", $files);

				if ($key !== (count($files)-1)){					//This seems backwards, but we sorted in reverse order at the top of the file.
					$prevyear = substr($files[$key+1],0,4);
					$prevmonth = substr($files[$key+1],4,2);
					$prevday = substr($files[$key+1],6,2);
				}

				if ($key !== 0){
					$nextyear = substr($files[$key-1],0,4);
					$nextmonth = substr($files[$key-1],4,2);
					$nextday = substr($files[$key-1],6,2);
				}
			}
		?>

		
		<!--Twitter and Facebook links  -->
		<?php
			$currenturl = rawurlencode('http://theskinnyonbenny.com'.$_SERVER["REQUEST_URI"]);
			$tinyurl = rawurlencode (file_get_contents ('http://tinyurl.com/api-create.php?url='.$currenturl));
		?>
		<div><a href="http://facebook.com/share.php?u=<?php print $currenturl; ?> " target="_blank"><img src="http://theskinnyonbenny.com/blog2/wp-content/plugins/sociable/images/facebook.png" alt="facebook" /></a>
		<a href="http://twitter.com/home?status=<?php print $tinyurl; ?>" target="_blank"><img src="http://theskinnyonbenny.com/blog2/wp-content/plugins/sociable/images/twitter.gif" alt="twitter" /></a></div>


			</div>  </div>  <!--  ends the entry div -->

		<div class="navigation">
			<table border="0" width="100%">
				<tr><td class="alignleft">
					<?php
						if ($key !== (count($files)-1) && file_exists($year.$month.$day.".jpg"))
							echo "<font size=\"-1\"><a href=\"http://theskinnyonbenny.com/dailyphoto/2018/page.php?year=".$prevyear."&month=".$prevmonth."&day=".$prevday."\">&laquo; Previous</font></a>";
					?>
					</td>
					<td class="alignright">
						<?php
							if ($key !== 0 && file_exists($year.$month.$day.".jpg") && (substr($files[$key-1],0,4) < $now_array["year"] || substr($files[$key-1],0,4) == $now_array["year"] && substr($files[$key-1],4,2) < $now_array["mon"] || substr($files[$key-1],0,4) == $now_array["year"] && substr($files[$key-1],4,2) == $now_array["mon"] && substr($files[$key-1],6,2) <= $now_array["mday"]))
							echo "<font size=\"-1\"><a href=\"http://theskinnyonbenny.com/dailyphoto/2018/page.php?year=".$nextyear."&month=".$nextmonth."&day=".$nextday."\">Next &raquo;</font></a>";
						?>
					</td>
				</tr>
			</table>
		</div>


		<center><table border = 1>

		<?php

		$i=1;
		for ($disp_month = 1; $disp_month <= 12; $disp_month++) {
			if($i==1)
				echo "<tr>\n";
			$month_array = returnmontharray($disp_month, $year);

			for ($j=1; $j<=returnmonthlength($disp_month,$year); $j++) {
				$fnmonth = $disp_month;
				$fnday = $j;
				if (strlen($fnmonth) == 1)
					$fnmonth="0".$fnmonth;
				if (strlen($fnday) == 1)
					$fnday="0".$fnday;
				$fn=$year.$fnmonth.$fnday.".jpg";
				if ((file_exists($fn)) and ($fnmonth < $now_array["mon"] or $fnmonth == $now_array["mon"] and $fnday <= $now_array["mday"] or $year < $now_array["year"])){
					$month_array = dayrangelink($month_array,"page.php",$j,$j); //Add links to the days
					$month_array = dayrangecolour($month_array,"#dddddd",$j);   //Changes bkgrnd for linked day to gray
				}
			}

			if($month==$disp_month){                                           //Make today''s date magenta.
				$month_array = dayrangecolour($month_array,"#ff00ff",$day);
			}
			$monthname_array = getdate(strtotime($year . "-" . $disp_month . "-01"));
			echo "<td valign=\"top\" align=\"center\"><font size=\"-1\">\n<b>" . $monthname_array["month"] . "</b>\n" . returnmonthhtml($month_array,"") . "\n</font></td>\n"; #display the month as HTML
			if($i==4){
				echo "</tr>\n"; #finish the table row
				$i=1;
			}
			else{
				$i++;
			}
		}

		?>

		</table></center>

		<?php include('../otheryears.php'); ?>

	</div>

	<?php include("../../indexFooter.php");	?>

</div>
</body>
</html>
