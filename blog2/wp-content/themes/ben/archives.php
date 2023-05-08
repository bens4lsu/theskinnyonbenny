<?php get_header(); ?>

<div id="content" class="widecolumn">

<?php
	ini_set ('display_errors',1);
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	$sqlList = mysql_query ("SELECT `post_date`, `post_title`, `ID` FROM `wpben_posts` where ID <> 175 and ID <> 177 and post_type = 'post' and post_status = 'publish' ORDER BY `post_date` DESC");

	$prevMonthCode = '';
	$firstFlag = false;
	while ($row = mysql_fetch_array ($sqlList)){
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
