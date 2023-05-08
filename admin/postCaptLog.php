<html>
<head>
<?php include ('../tracking.php') ?>

	<title>Capt Log Entry</title>
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css"/>
</head>
<body class="mainbox" >

<body>
<center>
<p>
<?php  	ini_set ('display_errors',1);
	extract ($_POST);
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	if (@mysql_query ("INSERT INTO `tblCaptainsLog` ( `LogItemID` , `Date` , `Route`, `Conditions`,`Crew`, BoatID ) VALUES ( '','$date', '$route','$conditions','$crew', 2); "))
	  {echo '<b>Added Succesfully<//b>';}
	else
	  {echo '<b>Entry Failed<//b>';
	   echo mysql_error();};
	   print "INSERT INTO `tblCaptainsLog` ( `LogItemID` , `Date` , `Route`, `Conditions`,`Crew` ) VALUES ( '','$date', '$route','$conditions','$crew'); ";

?>
</p>
<p>
<a href="AddCaptLog.html">Add Another</a>
</p>
<p>
<a href="/ve/CaptLog.php">View Output</a>
</p>
</center>

</body>
</html>