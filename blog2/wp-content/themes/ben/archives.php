<?php get_header(); 

?>

<div id="content" class="widecolumn">

<?php
	require_once ("../db-pdo.class.php");
	$db->stmt = $db->prepare ("SELECT `post_date`, `post_title`, `ID` FROM `wpben_posts` where post_type = 'post' and post_status = 'publish' ORDER BY `post_date` DESC");
    $results = $db->selectRowsArrayAssoc();
	$prevMonthCode = '';
	$firstFlag = false;
	foreach ($results as $row){
		$intDate = strtotime ($row['post_date']);

		$currMonthCode = date('MY',$intDate);
		if ($prevMonthCode <> $currMonthCode) {
			echo '<h2>'.date ('F Y', $intDate).'</h2><br />';
		}
		echo '<a style=\'margin-left:30px;\' href=\'https://theskinnyonbenny.com/blog2/archives/'.$row['ID'].'\'>'.date ('l, F j, Y', $intDate).':  '.$row['post_title'].'</a><br />';
		$prevMonthCode = $currMonthCode;
	}
?>

</div>

<?php get_footer(); ?>
