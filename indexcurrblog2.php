<?php
   	ini_set ('display_errors',1);
   	require_once ('db-pdo.class.php');
    $db->stmt = $db->prepare("SELECT post_content, id, post_title FROM wpben_posts where post_status='publish' ORDER BY post_date DESC LIMIT 1");
    $content = $db->selectRowAssoc();
    $text = explode ('<!--more-->', $content['post_content']);
    $txt = $text[0];
    $txt = str_replace ("<skinny:nohome>","<!--",$txt);
    $txt = str_replace ("</skinny:nohome>","-->",$txt);
    $txt = str_replace ("\n","<br/>",$txt);
		
?>
   <table width="100%"><tr><td><h2><a href="/blog2/archives/<?php echo $content['id']; ?>"><?php print $content['post_title']; ?></a></h2></td><td style="text-align:right; padding-right:8px;"><img src="/img/blogdrawing.gif" style="display:inline; height:50px;"></td></tr></table>
   <p><?php print $txt; ?></p>
   <p align="right"><a href="/blog2/archives/<?php echo $content['id']; ?>">Read it all...</a></p>








