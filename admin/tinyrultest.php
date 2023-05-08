<html>
<head>
	<title>Link of the Week Entry</title>
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body class="mainbox" >

<body>
<center>
<p>
<?php

	require ("twitter.lib.php");
	ini_set ('display_errors',1);

	while(list($key, $value) = each($HTTP_GET_VARS))
	{
		echo $key." = ".$value."<br />";
	}

	$post_vars = $HTTP_GET_VARS;
	$url = $post_vars["url"];
	$comments = $post_vars["comments"];



	print "nnn".$url."     ".$comments;

	//mark the current one as inactive

			print 'http://tinyurl.com/api-create.php?url='.$url;
			$tinyurl=file_get_contents('http://tinyurl.com/api-create.php?url='.$url);

			print $tinyurl;



?>
</p>
<p>
<a href="AddLinkWeek.html">Add Another</a>
</p>
<p>
<a href="/index.php">Home</a>
</p>
</center>

</body>
</html>