<?php /* Don't remove this line, it calls the b2 function files ! */ $blog=1; include ("blog.header.php"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- layout credits goto http://bluerobot.com/web/layouts/layout2.html -->

<head>
<title><?php bloginfo('name') ?><?php single_post_title(' :: ') ?><?php single_cat_title(' :: ') ?><?php single_month_title(' :: ') ?></title>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta http-equiv="reply-to" content="<?php bloginfo('admin_email'); ?>" />
<meta http-equiv="imagetoolbar" content="no" />
<meta content="TRUE" name="MSSmartTagsPreventParsing" />

<style type="text/css" media="screen">
@import url( layout2b.css );
</style>
<link rel="stylesheet" type="text/css" media="print" href="print.css" />
<link rel="alternate" type="text/xml" title="RDF" href="<?php bloginfo('rdf_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php comments_popup_script() ?>

</head>
<body>
<div id="header"><a href="" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></div>

<div id="content">


<!-- // b2 loop start -->
	<?php while($row = mysql_fetch_object($result)) { start_b2(); ?>


<?php the_date("","<h2>","</h2>"); ?>
<?php permalink_anchor(); ?>
<div class="storyTitle"><?php the_title(); ?>
   <a href="?cat=<?php the_category_ID() ?>" title="category: <?php the_category() ?>"><span class="storyCategory">[<?php the_category() ?>]</span></a>&nbsp;-&nbsp;
<span class="storyAuthor"><?php the_author() ?> - <?php the_author_email() ?></span> @ <a href="<?php permalink_link() ?>"><?php the_time() ?></a>
</div>

<div class="storyContent">
<?php the_content(); ?>

<div class="rightFlush">
<?php link_pages("<br />Pages: ","<br />","number") ?> 
<?php comments_popup_link("Comments (0)", "Comments (1)", "Comments (%)") ?> 
<?php trackback_popup_link("TrackBack (0)", "TrackBack (1)", "TrackBack (%)") ?> 
<?php pingback_popup_link("PingBack (0)", "PingBack (1)", "PingBack (%)") ?>

<?php trackback_rdf() ?>

<!-- this includes the comments and a form to add a new comment -->
<?php include ("b2comments.php"); ?>

<!-- this includes the trackbacks -->
<?php include ("b2trackback.php"); ?>

<!-- this includes the pingbacks -->
<?php include ("b2pingbacks.php"); ?>

</div>

</div>


<!-- // this is just the end of the motor - don't touch that line either :) -->
	<?php } ?> 


</div>

<p class="centerP"><?php timer_stop(1); ?>
[powered by <a href="http://cafelog.com" target="_blank"><b>b2</b></a>.]
</p>


<div id="menu">

<h4>quick links:</h4>

<a href="http://www.crying-babies.com/" title="b2's homepage">Crying Babies</a><br />
<a href="https://theskinnyonbenny.com" title="another link">A Plunger on My Ass</a><br />
<a href="http://www.lagumbo.com/brrg/restaurantchinese.htm" title="another link">Chinese Food</a><br />
<a href="http://www.travelsecrets.com/tricks/#dangerous" title="another link">Dangerous Airlines</a><br />


<h4>categories:</h4>

<?php list_cats(0, 'All', 'name'); ?>

<h4>search:</h4>

<form name="searchform" method="get" action="<?php echo $PHP_SELF; /*$siteurl."/".$blogfilename*/ ?>">
<p>
<input type="text" name="s" size="15" /><br />
<input type="submit" name="submit" value="search" />
</p>
</form>

<h4>archives:</h4>

<?php include("b2archives.php"); ?>
<br />


<h4>other:</h4>

<a href="b2login.php">login</a><br />
<a href="b2register.php">register</a><br />
<br />

<a href="b2rss.php"><img src="b2-img/xml.gif" alt="view this weblog as RSS !" width="36" height="14" border="0"  /></a><br />
<a href="http://validator.w3.org/check/referer" title="this page validates as XHTML 1.0 Transitional"><img src="http://www.w3.org/Icons/valid-xhtml10.gif" alt="Valid XHTML 1.0!" height="31" width="88" border="0" /></a>

</div>

<div id="chaff">
<a href="mailto:abuse@[127.0.0.1]" title="anti sp@mbot addrss">4 sp@mbots e-mail me</a>
</div>
<!-- BlueRobot was here. -->
</body>
</html>

