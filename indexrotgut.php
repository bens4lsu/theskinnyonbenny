   	<?php
		ini_set ('display_errors',1);
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

		$postQry = mysql_query ("SELECT post_content, id, post_title, post_name 
FROM wpheather_posts p 
   inner join wpheather_term_relationships r on p.ID = r.object_id
where p.post_status='publish' and r.term_taxonomy_id = 15
ORDER BY p.post_date DESC LIMIT 1");
		$Content = mysql_fetch_array ($postQry);
		$Text = explode ('<!--more-->', $Content['post_content']);
		$txt = $Text[0];

		if (strlen($txt) > 900 ){
			$big = substr ($txt, 0, 900);
			$txt = substr ($big, 0, strrpos($big, '. ')+1);
		}
		$txt = str_replace ("\n","<br/>",$txt);
	
	?>
   <table><tr><td><img src="/rotgut/wp-content/themes/fontella-10/images/logo.gif" style="display:inline; height:50px;"></td><td><h2>From <a href="http://therotgutfiles.com" target="_blank">therotgutfiles.com</a>:  <?php print $Content['post_title']; ?></h2></td></tr></table>  <p><?php print $txt; ?>
   <p align="right"><a href="http://therotgutfiles.com/permadrinks/<?php echo $Content['post_name']; ?>" target="_blank">Read it all...</a></p>






