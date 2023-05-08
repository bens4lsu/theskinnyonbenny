

<html>
<head>
	<title>BFJ Entry</title>
	<meta charset="UTF-8" />
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css" />

</head>

<body class="mainbox" >
<?php 
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());
	print '<pre>';print_r($_POST);print '</pre>'; 
	
	$date = isset ($_POST['date']) ? date('Y-m-d', strtotime($_POST['date'])) : '';
	$Placelist = isset ($_POST['placelist']) ? $_POST['placelist'] : array();
	$other = isset ($_POST['other']) ? $_POST['other'] : '';
	$notes = isset ($_POST['notes']) ? $_POST['notes'] : '';
	$allday = isset ($_POST['allday']) ? $_POST['allday'] : '';
	$password = isset ($_POST['password']) ? $_POST['password'] : '';


	if ($date == '' || $allday == ''){
		print 'Error.  Need date and all day flag.';
	}
	else if ($password <> 'bbbbb6'){
		print 'Error.  Password mismatch.';
	}
	else {
		$sql = 'insert tblBFJournal (Dt, AllDay, Notes) values (\''.$date.'\',\''.$allday.'\',\''.str_replace ('\'', '\'\'', $notes).'\')';
		mysql_query($sql) or die (mysql_error().'  '.$sql);
		$Others = trim($other) == '' ? array() : explode ("\n",$other);
		foreach ($Others as $newplace){
			$locale = trim(substr($newplace, 0, strpos($newplace, '-')));
			if ($locale == ''){					//no locale specified
				$place = trim($newplace);
				$id = 4; //other
			}
			else {
				$place = trim(substr($newplace, strpos($newplace, '-')+1));			
				$sql = 'select LocaleID from tblBFLuLocales where LocaleDescription = \''.$locale.'\'';
				$S = mysql_query($sql) or die (mysql_error().'  '.$sql);
				if (mysql_num_rows($S) == 0){		//need to create new locale
					$sql = 'insert tblBFLuLocales (LocaleDescription, OrderNum) values (\''.$locale.'\', 10)';
					$S2 = mysql_query($sql) or die (mysql_error().'  '.$sql);
					$id = mysql_insert_id();
				}
				else {								//use existing locale
					$row = mysql_fetch_array($S);
					$id = $row['LocaleID'];
				}
			}
			//add the new place
			$sql = 'insert tblBFLuPlaces (Place, LocaleID) values (\''.$place.'\', '.$id.')';
			$S3 = mysql_query($sql) or die (mysql_error().'  '.$sql);
			$pid = mysql_insert_id();
			$Placelist[] = $pid;
		}
		foreach ($Placelist as $value){
			$sql = 'insert tblBFJournalPlaces (Dt, PlaceID) values (\''.$date.'\','.$value.')';
			mysql_query($sql) or die (mysql_error().'  '.$sql);
		}
		print '<script type="text/javascript">window.location="./bfj.php"</script>';
	}

?>

</body>
</html>
