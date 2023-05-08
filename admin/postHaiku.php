<html>
<head>
<?php include ('../tracking.php') ?>

	<title>Haiku Entry</title>
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body class="mainbox" >

<body>
<center>
<p>
<?php  	ini_set ('display_errors',1);
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	if (@mysql_query ("INSERT INTO `tblHaikus` ( `HaikuID` , `HaikuText` , `DateAdded`, `Title` ) VALUES ( '','$newentry', NOW( ),'$title' ); "))
	  {echo '<b>Added Succesfully<//b>';}
	else
	  {echo '<b>Entry Failed<//b>';
	   echo mysql_error();};

?>
</p>
<p>
<a href="AddHaiku.html">Add Another</a>
</p>
<p>
<a href="/x/tcHaikus.php">View Output</a>
</p>
</center>

</body>
</html>