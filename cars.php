<?php
	$db_connection = mysql_connect ('theskinn.startlogicmysql.com', 'theskinn_public', '1') or die (mysql_error());
	$db_select = mysql_select_db ('theskinn_main') or die (mysql_error());

	$vid = isset ($_POST['vid']) ? ($_POST['vid']) : 1;  //default 1 = ben's jeep

	$sql='	SELECT v.`Date` , v.`Gallons` , v.`Cost` , v.FillUpFlag , 
				v.`Description` , v.`Mileage` , s.ServiceDescription,
				vv.VehicleDescription, vv.StartMileage, v.VehicleID,
				f.FileType, f.FileSize, f.FileID 
			FROM tblVL v 
				INNER JOIN tblVLLuServices s ON s.ServiceID = v.ServiceID
				INNER JOIN tblVLLuVehicles vv on vv.VehicleID = v.VehicleID
				left outer join tblVLFiles f on v.FileID = f.FileID
			where v.VehicleID = '.$vid.' 
			order by v.Date';

	$J=mysql_query($sql)or die (mysql_error());
	
	$vsql = 'select VehicleID, VehicleDescription from tblVLLuVehicles order by VehicleDescription';
	$V = mysql_query($vsql) or die (mysql_erroe());
	$vopts = '';
	while ($row = mysql_fetch_array($V)) {
		if ($row['VehicleID'] == $vid){
			$vopts .= '<option val="#" selected="true">'.$row['VehicleDescription'].'</option>'
		}
		else {
			$vopts .= '<option val="cars.php?vid='.$row['VehicleID'].'">'.$row['VehicleDescription'].'</option>';
		}
	}
	
	$ssql = 'select ServiceDescription from tblVLLuServices order by ServiceID';
	$S = mysql_query($ssql) or die(mysql_error());
	$sopts = '[';
	while ($row = mysql_fetch_array($S)){
		$sopts .= '\''.$row['ServiceDescription'].'\', ';
	}
	$sopts = substr ($sopts, -2).']';
?>

<html>
<head>
	<title>Auto Info Journal</title>
	<meta charset="UTF-8" />
	<LINK href="/skinnyonbennyStyle.css" rel="stylesheet" type="text/css" />
	<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
	<link href="jquery.dataTables.css" rel="stylesheet" type="text/css"/>
	<script src="jquery-1.8.0.js"></script>
	<script src="jquery.ui.core.js"></script>
	<script src="jquery.ui.widget.js"></script>
	<script src="jquery.ui.datepicker.js"></script>
	<script src="jquery.dataTables.js"></script>
	<script src="jquery.dataTables.columnFilter.js"></script>
	<style>
		.inputtable {
			border:1px solid #000000;
		}
		td, th {
			vertical-align:top;
			font-size:80%;
			padding:1em;
		}

		.tablabel {
			text-align: right;
			height:2em;
		}

		th {
			text-align:left;
		}

		#main_table {
			width:980px;
		}

		#main_table tfoot tr th  {
			font-size:70%;
			font-weight:normal;
		}

		#main_table tfoot tr th input {
			width:3em;
			font-size:60%;
		}

		#main_table tfoot tr th select {
			font-size:75%;
		}

		html > body.mainbox > form > div > div#main_table_wrapper.dataTables_wrapper > table#main_table.dataTable > tfoot > tr > th > span.filter_column.filter_select > select.search_init.select_filter

	</style>
</head>
<body class="mainbox" >

	<script type="text/javascript">
		$(document).ready(function() {
			$("#datepicker").datepicker();
			var mTable = $("#main_table").dataTable( {
				"iDisplayLength" : 25	
			} )
				.columnFilter({
					aoColumns: [ null,
								{type: "select", values: <?php print $sopts; ?> },
								{type: "number-range" },
								null,
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" }]						
				});
			mTable.fnPageChange('last');
		});	
		
		$('auto').change(function() {
			window.location = $(this).val;
		});
		
	</script>

	<h2>Auto Fuel and Maintenance Log</h2>
	<form method="post" action="postbfj.php" style="padding-top:30px;">

		<div style="width:100%; border:1px solid black; padding: 0.75em;">
			<span style="font-weight:bold; padding-right:1em;">Auto:  </span>
			<select id="auto">
				<?php print $vopts; ?>
			</select>
		</div>
		
		<div style="border:1px solid #000000; padding:0.75em; padding-bottom:4em; margin-top:30px;">
			<table id="main_table">
				<thead>
					<tr><th style="width:19em;">Date</th><th>Type</th><th>Mileage</th><th>Gal</th><th>Fill?</th><th>Cost</th><th>PPG</th><th>MPG This</th><th>MPG All</th><th>Tot Cost</th><th>CPM This</th><th>CPM All</th></tr>
				</thead>
				<tbody>
					<?php
					
						$prevMiles = $row['StartMileage'];
						$tGallons = 0;
						$tCost = 0;
						$mpgall = 0;

						while ($row = mysql_fetch_array($J)){
							$tGallons += $row['Gallons'];
							$miles = $row['Mileage'] - $prevMiles;
							$prevMiles = $row['Mileage'];
							$tCost += $row['Cost'];
							$ppg = ($row['Gallons'] > 0) ? $row['Cost']/$row['Gallons'] : 0;
							
							if ($row['FillUpFlag'] == 1 && $row['Gallons'] > 0){
								$fill = 'Yes';
								$mpgthis = $miles/$row['Gallons'];
								$mpgall = ($tGallons > 0) ? $row['Mileage']/$tGallons : 0;
							}
							else {
								$fill = 'No';
								$mpgthis = 0;
							}
							$cpmthis = ($miles > 0) ? $row['Cost']/$miles : 0;
							$cpmall = ($row['Mileage'] > 0) ? $tCost/$row['Mileage'] : 0;

							$note = (strlen ($row['Description']) > 0) ? ' <img src="/img/note_icon.gif" alt="note" title="'.$row['Description'].'" style="display:inline;" />' : '';
							$file = (strlen ($row['FileSize']) > 0) ? '<img src="/img/file_icon.gif" alt="attachment" style="display:inline" onclick="window.open(\'download.php?app=vl&file='.$row['FileID'].'&size='.$row['FileSize'].'&type='.$row['FileType'].'\');" />' : '';
							print '<tr><td>'.$row['Date'].$note.$file.'</td><td>'.$row['ServiceDescription'].'</td><td>'.$row['Mileage'].'</td><td>'.number_format($row['Gallons'],2).'</td><td>'.$fill.'</td><td>'.number_format($row['Cost'],2).'</td><td>'.number_format($ppg,3).'</td><td>'.number_format($mpgthis,3).'</td><td>'.number_format($mpgall,3).'</td><td>'.number_format($tCost,2).'</td><td>'.number_format($cpmthis,3).'</td><td>'.number_format($cpmall,3).'</td></tr>';
						}
					?>

				</tbody>
				<tfoot>
					<tr><th>Filter Results:</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th></tr>
				</tfoot>
		
			
			</table>
		</div>
	

		<table class="inputtable"><tr class="tabtoprows">
			<td class="tablabel" >Date:</td><td class="tabinputleft"><input type="text" id="datepicker" name="date" tabindex="1"></input></td>
			<td rowspan="4" class="bigcell">
				Places:<br /><br />
				<select id="placelist" multiple="true" name="placelist[]" tabindex="4" style="width:24em; height:25em;">
				</select>
				<br /><br />
				<textarea name="other" tabindex="5" style="width:24em; height:10em;"></textarea>
			</td>
			<td rowspan="4" class="bigcell">
				Notes:<br /><br />
				<textarea name="notes" tabindex="6" style="width:20em; height:37em;"></textarea>
		</tr><tr  class="tabtoprows">
			<td class="tablabel">All Day?</td>
			<td class="tabinputleft">
				<select id="allday" name="allday" tabindex="2">
					<option value="No" selected="true">No</option>
					<option value="Yes" >Yes</option>
				</select>
			</td>
		</tr><tr>
			<td class="tablabel">Password:</td>
			<td class="tabinputleft"><input type="password" tabindex="3" name="password"></input></td>
		</tr>
		<tr><td colspan="3">&nbsp;</td></tr>
		<tr><td colspan="4"><input type="submit" value="Submit" tabindex="7" style="margin-left:8em;"></input></td></tr>
		
	</form>

</body>
</html>
