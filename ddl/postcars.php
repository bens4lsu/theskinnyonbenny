

<html>
<head>
	<title>Autos Entry</title>
	<meta charset="UTF-8" />
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css" />

</head>

<body class="mainbox" >
<?php 
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());
	print '<pre>';print_r($_POST);print '</pre>'; 

	$date = isset ($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : '';
	$vid = isset ($_POST['vid']) ? $_POST['vid'] : 0;
	$service = isset ($_POST['service']) ? $_POST['service'] : 0;
	$cost = isset ($_POST['cost']) ? $_POST['cost'] : 0;
	$gallons = isset ($_POST['gallons']) ? $_POST['gallons'] : 0;
	$fill = isset ($_POST['fill'])  && $_POST['fill'] == 'on' ? 1 : 0;
	$notes = isset ($_POST['notes']) ? $_POST['notes'] : '';
	$password = isset ($_POST['password']) ? $_POST['password'] : '';
	$mileage = isset ($_POST['mileage']) ? $_POST['mileage'] : '';

	if ($date == '' || $vid == 0 || $service == 0){
		print 'Error.  Need date, vehicle, and type of service.';
	}
	else if (! is_numeric($cost) || ! is_numeric($gallons) || ! is_numeric($mileage)){
		print 'Error.  Cost, gallons, and mileage must be numeric.';
	}
	else if ($password <> 'bbbbb6'){
		print 'Error.  Password mismatch.';
	}
	else {
		$sql = 'insert tblVL (VehicleID, ServiceID, Date, Gallons, Cost, FillUpFlag, Description, Mileage) values ('.$vid.', '.$service.', \''.$date.'\', '.$gallons.', '.$cost.', '.$fill.', \''.str_replace ('\'', '\'\'', $notes).'\', '.$mileage.')';
		mysql_query($sql) or die (mysql_error().'  '.$sql);
		print '<script type="text/javascript">window.location="./cars.php?vid='.$vid.'"</script>';
	}


?>

</body>
</html>
