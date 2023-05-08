<?php
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	$vid = isset ($_GET['vid']) ? ($_GET['vid']) : 2;  //default 2 = ben's jeep

	$sql='	SELECT v.`Date` , v.`Gallons` , v.`Cost` , v.FillUpFlag , 
				v.`Description` , v.`Mileage` , s.ServiceDescription,
				vv.VehicleDescription, vv.StartMileage, v.VehicleID,
				f.FileType, f.FileSize, f.FileID 
			FROM tblVL v 
				INNER JOIN tblVLLuServices s ON s.ServiceID = v.ServiceID
				INNER JOIN tblVLLuVehicles vv on vv.VehicleID = v.VehicleID
				left outer join tblVLFiles f on v.FileID = f.FileID
			where v.VehicleID = '.$vid.' 
			order by v.Date, v.Mileage';

	$J=mysql_query($sql)or die (mysql_error());
	
	$vsql = 'select VehicleID, VehicleDescription from tblVLLuVehicles order by VehicleDescription';
	$V = mysql_query($vsql) or die (mysql_error());
	$vopts = '';
	while ($row = mysql_fetch_array($V)) {
		if ($row['VehicleID'] == $vid){
			$vopts .= '<option value="#" selected="true">'.$row['VehicleDescription'].'</option>';
		}
		else {
			$vopts .= '<option value="cars.php?vid='.$row['VehicleID'].'">'.$row['VehicleDescription'].'</option>';
		}
	}
	
	$ssql = 'select ServiceID, ServiceDescription from tblVLLuServices order by ServiceID';
	$S = mysql_query($ssql) or die(mysql_error());
	$sopts = '[';
	$sopts2 = '';
	while ($row = mysql_fetch_array($S)){
		$sopts .= '\''.$row['ServiceDescription'].'\', ';
		$sopts2 .= '<option value="'.$row['ServiceID'].'">'.$row['ServiceDescription'].'</option>';
	}
	$sopts = substr ($sopts, 0, -2).']';
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
		
		.tlevbox {
			border:1px solid #000000; 
			padding:0.75em; 
			padding-bottom:4em; 
			margin-top:30px;
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
			border: 1px solid #000000;
			background-color:#E8E8E8;
		}

		#main_table tfoot tr th input {
			width:3em;
			font-size:60%;
		}

		#main_table tfoot tr th select {
			font-size:75%;
		}

		.dataTables_filter, .dataTables_length {
			margin-bottom: 15px;
		}

		
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
								{type: "number-range" },
								null,
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" }]						
				});
			mTable.fnPageChange('last');

			// reload form if they select a different auto
			$('#selauto').change(function() {
				window.location = $(this).val();
			});

			// make the black boxes all the same size, and make the big table fit.
			$(".tlevbox").each( function() {
				$(this).css("width", $("#main_table").css("width"));
			});


			// if they don't choose fuel, hide the gallons and fill up flag
			$("#service").change( function() {
				if ($(this).val() != 1)	{
					$(".hideifnotfuel").css("display", "none");
					$("#fill").attr("checked", false);
					$("#gallons").val(0);
				}
				else{
					$(".hideifnotfuel").css("display", "table-row");
					$("#fill").attr("checked", true);
				}
			});
		});	
		
	</script>

	<h2>Auto Fuel and Maintenance Log</h2>
	<form method="post" action="postcars.php" style="padding-top:30px;">
		<span style="display:none;"><input name="vid" value="<?php print $vid ?>"></input></span>

		<div style="width:100%; border:1px solid black; padding: 0.75em;" class="tlevbox">
			<span style="font-weight:bold; padding-right:1em;">Auto:  </span>
			<select id="selauto">
				<?php print $vopts; ?>
			</select>
		</div>
		
		<div style="border:1px solid #000000; padding:0.75em; padding-bottom:4em; margin-top:30px;" class="tlevbox">
			<h3 style="position:relative; top:-8px;">History</h3>
			<table id="main_table">
				<thead>
					<tr><th style="width:19em;">Date</th><th>Type</th><th>Mileage</th><th>Gal</th><th>Fill?</th><th>Cost</th><th>PPG</th><th>MPG This</th><th>MPG All</th><th>Tot Cost</th><th>CPM This</th><th>CPM All</th></tr>
				</thead>
				<tbody>
					<?php
					
						$tGallons = 0;
						$tCost = 0;
						$mpgall = 0;
						$prevMiles = 0;  //don't use vehicle's start mileage, because you subract that out of the calcs within the loop.

						while ($row = mysql_fetch_array($J)){
							$tMiles = $row['Mileage'] - $row['StartMileage'];
							$tGallons += $row['Gallons'];
							$miles = $tMiles - $prevMiles;
							if ($row['ServiceDescription'] == 'Fuel'){
								$prevMiles = $tMiles;
							}
							$tCost += $row['Cost'];
							$ppg = ($row['Gallons'] > 0) ? $row['Cost']/$row['Gallons'] : 0;
							
							if ($row['FillUpFlag'] == 1 && $row['Gallons'] > 0){
								$fill = 'Yes';
								$mpgthis = $miles/$row['Gallons'];
								$mpgall = ($tGallons > 0) ? $tMiles/$tGallons : 0;
							}
							else {
								$fill = 'No';
								$mpgthis = 0;
							}
							$cpmthis = ($miles > 0) ? $row['Cost']/$miles : 0;
							$cpmall = ($tMiles > 0) ? $tCost/$tMiles : 0;

							$note = (strlen ($row['Description']) > 0) ? ' <img src="/img/note_icon.gif" alt="note" title="'.$row['Description'].'" style="display:inline;" />' : '';
							$file = (strlen ($row['FileSize']) > 0) ? '<img src="/img/file_icon.gif" alt="attachment" style="display:inline; margin-left:4px;" onclick="window.open(\'download.php?app=vl&file='.$row['FileID'].'&size='.$row['FileSize'].'&type='.$row['FileType'].'\');" />' : '';
							print '<tr><td>'.$row['Date'].$note.$file.'</td>
										<td>'.$row['ServiceDescription'].'</td>
										<td>'.$row['Mileage'].'</td>
										<td style="text-align:right">'.number_format($row['Gallons'],3).'</td>
										<td>'.$fill.'</td><td style="text-align:right">'.number_format($row['Cost'],2).'</td>
										<td style="text-align:right">'.number_format($ppg,3).'</td>
										<td style="text-align:right">'.number_format($mpgthis,1).'</td>
										<td style="text-align:right">'.number_format($mpgall,1).'</td>
										<td style="text-align:right">'.number_format($tCost,2).'</td>
										<td style="text-align:right">'.number_format($cpmthis,3).'</td>
										<td style="text-align:right">'.number_format($cpmall,3).'</td>
									</tr>';
						}
					?>

				</tbody>
				<tfoot>
					<tr><th>Filter Results:</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th></tr>
				</tfoot>
		
			
			</table>
		</div>
	
		<div style="margin-top:25px;" class="tlevbox" >
			<h3>Add New</h3>
			<table class="inputtable"><tr class="tabtoprows">
				<td class="tablabel">Service:</td><td class="tabinputleft"><select id="service" name="service" tabindex="1"><?php print $sopts2; ?></select></td>
				<td class="tablabel" >Date:</td><td class="tabinputleft"><input type="text" id="datepicker" name="date" tabindex="2"></input></td>
				<td class="tablabel">Cost:</td><td class="tabinputleft"><input type="text" id="cost" name="cost" tabindex="3"></input></td>
				
				</tr><tr>
				<td class="tablabel">Mileage:</td><td class="tabinputleft"><input type="text" tabindex="6" name="mileage"></input></td>
				<td class="tablabel">Password:</td><td class="tabinputleft"><input type="password" tabindex="6" name="password"></input></td>
				<td class="tablabel">Attachment:</td><td> File Upload Control Goes Here  </td>
				
				</tr><tr class="hideifnotfuel">
				<td class="tablabel" >Fill?</td><td class="tabinputleft"><input type="checkbox" id="fill" name="fill" tabindex="4" checked="true"></input></td>
				<td class="tablabel">Gallons:</td><td class="tabinputleft"><input type="text" id="gallons" name="gallons" tabindex="5"></input></td>
				<td colspan="2">&nbsp;</td>
				
				</tr><tr>
				<td colspan="6" class="bigcell">
					Notes:<br /><br />
					<textarea name="notes" tabindex="8" style="width:900px; height:5em;"></textarea>
				</td>
				
				</tr>
				<tr><td colspan="6"><input type="submit" value="Submit" tabindex="9"></input></td></tr>
			</table>
		</div>	
	</form>

</body>
</html>
