<!DOCTYPE html> 
<html>

<head>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-22429755-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?>  <?php wp_title(); ?></title>

<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
<script language="javascript" src="/menu.js"></script>
<script language="javascript" type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script language="javascript" type="text/javascript" src="/js/excanvas.js"></script>
<script language="javascript" type="text/javascript" src="/js/lightview.js"></script>
<script language="javascript" type="text/javascript" src="/js/spinners.min.js"></script>
<link rel="stylesheet" href="/lightview.css" type="text/css" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="/img/headers/favicon.ico" type="image/x-icon" />

<style type="text/css" media="screen">
	body { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/bgcolor.jpg"); }
	#header { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/header.jpg") no-repeat bottom center; }
	#footer { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/footer.jpg") no-repeat bottom; border: none;}
	#page { background: url("<?php bloginfo('stylesheet_directory'); ?>/images/bg.jpg") repeat-y top; border: none; }
</style>



<?php wp_head(); ?>
</head>
<body>

<div class="topleft"><img src="https://theskinnyonbenny.com/img/BenRobe.JPG"></div>
<div class="sb2"><?php include("/var/www/sites/theskinny/menu2.php"); ?></div>
<div id="page">
	<div id="header">
		<div id="headerimg"></div>
	</div>

