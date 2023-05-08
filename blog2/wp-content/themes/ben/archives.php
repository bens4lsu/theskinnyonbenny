<?php get_header(); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>

<div id="content" class="widecolumn">

<?php
	require_once ("../db-pdo.class.php");
	$sqlList = $db->prepare ("SELECT `post_date`, `post_title`, `ID` FROM `wpben_posts` where post_type = 'post' and post_status = 'publish' ORDER BY `post_date` DESC");

	$prevMonthCode = '';
	$firstFlag = false;
	print_r($db->selectRowsArrayAssoc($sqlList));
	while ($row = $db->selectRowsArrayAssoc($sqlList)){
		$intDate = strtotime ($row[post_date]);

		$currMonthCode = date('MY',$intDate);
		if ($prevMonthCode <> $currMonthCode) {
			echo '<h2>'.date ('F Y', $intDate).'</h2><br />';
		}
		echo '<a style=\'margin-left:30px;\' href=\'https://theskinnyonbenny.com/blog2/archives/'.$row[ID].'\'>'.date ('l, F j, Y', $intDate).':  '.$row[post_title].'</a><br />';
		$prevMonthCode = $currMonthCode;
	}
?>

</div>

<?php get_footer(); ?>
