<html>
<head>
<?php include ('../tracking.php') ?>

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

	while(list($key, $value) = each($HTTP_POST_VARS))
	{
		echo $key." = ".$value."<br />";
	}

	$post_vars = $HTTP_POST_VARS;
	$url = $post_vars["url"];
	$comments = $post_vars["comments"];


	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	print $url."     ".$comments;

	//mark the current one as inactive
	if (@mysql_query ("Update tblLinks set IsCurrentFlag = 0 where IsCurrentFlag = 1 ")) {
		echo 'Old Link Marked Inactive';

		if (@mysql_query ("INSERT INTO tblLinks (URL, Description, IsCurrentFlag, DateAdded) values ('".$url."','".$comments."',1,CURDATE())")) {
			echo '<b>Added Succesfully<//b>';

			$tinyurl=file_get_contents('http://tinyurl.com/api-create.php?url='.$url);
			$twitter = new Twitter("bens4lsu", "o1oscar");
			$success = $twitter->updateStatus("Ben posted a new link of the week on https://theskinnyonbenny.com    The linked site is ".$tinyurl);
			print_r ($success);
		}
		else {
			echo '<b>Entry Failed<//b>';
			echo mysql_error();
			print "INSERT INTO tblLinks (URL, Description, IsCurrentFlag, DateAdded) values ('".$url."','".$comments."',1,CURDATE())";
		}
	}
	else {
		print "  Error:  problem updating old link.";
		echo '<b>Entry Failed<//b>';
		echo mysql_error();
		//		print "INSERT INTO tblLinks (URL, Description, IsCurrentFlag, DateAdded) values (".$url.",".$comments.",1,CURDATE())";
	}


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