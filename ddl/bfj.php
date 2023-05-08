<?php
	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

	$setup = mysql_query('select @startDate := min(Dt) from tblBFJournal') or die (mysql_error());
	$setup = mysql_query('select @endDate := max(Dt) from tblBFJournal') or die (mysql_error());

	$sql='	select dates.Dt,
			   ifnull(info.AllDay,\'No\') as AllDay,
			   info.Notes, 
			   info.Places, 
			   info.PlaceIDs
			from
			   (select date_add(@startDate, INTERVAL d1.a1+d2.a2+d3.a3+d4.a4 DAY) as Dt from
				(select 0 a1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7
					union select 8 union select 9) d1
				cross join
				   (select 0 a2 union select 10 union select 20 union select 30 union select 40 union select 50 union select 60 union select 70
					union select 80 union select 90) d2
				cross join
				   (select 0 a3 union select 100 union select 200 union select 300 union select 400 union select 500 union select 600 union select 700
					union select 800 union select 900) d3
				cross join
				   (select 0 a4 union select 1000 union select 2000 union select 3000 union select 4000 union select 5000 union select 6000 union select 7000
					union select 8000 union select 9000) d4
				where date_add(@startDate, INTERVAL d1.a1+d2.a2+d3.a3+d4.a4 DAY) <= @endDate
			   ) dates
			   left outer join
				  (select j.Dt, AllDay, Notes, GROUP_CONCAT(PLACE) as Places, GROUP_CONCAT(p.PlaceID) as PlaceIDs
				   from tblBFJournal j 
					  left outer join tblBFJournalPlaces jp on j.Dt = jp.Dt 
					  left outer join tblBFLuPlaces p on jp.PlaceID = p.PlaceID 
				   group by j.Dt, j.AllDay, j.Notes order by j.Dt
				  ) info
				on dates.Dt = info.Dt
			order by dates.Dt';

	$J=mysql_query($sql)or die (mysql_error());
	
	
	/*  compute jscript object to populate the select list  */
	$T=mysql_query('SELECT LocaleDescription, PlaceID, Place from tblBFLuLocales l join tblBFLuPlaces p where l.LocaleID = p.LocaleID order by l.OrderNum, l.LocaleDescription, p.Place') or die (mysql_error());
	$curLocale = null;
	$jsObject = null;
	while ($row = mysql_fetch_array($T)){
		if ($curLocale <> $row['LocaleDescription']){
			if ($curLocale == null){
				$jsObject = '{\'';
			}
			else {
				$jsObject = substr($jsObject, 0, -1);
				$jsObject .= '},\'';
			}
			$jsObject .= $row['LocaleDescription'].'\':{';
			$curLocale = $row['LocaleDescription'];
		}
		$jsObject .= $row['PlaceID'].':\''.str_replace ('\'', '\\\'', $row['Place']).'\',';
	}
	$jsObject = substr($jsObject, 0, -1).'}}';
?>

<html>
<head>
	<title>BF Journal</title>
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

	</style>
</head>
<body class="mainbox" >
	<script type="text/javascript">
		$(document).ready(function() {
			var selOptgroups = <?php print $jsObject; ?> //{'br':{1:'opt1',2:'opt2',3:'opt3'},'other':{4:'opt4'}};
			var nextkey = 4;
			var id;
			$.each(selOptgroups, function(key, opts) {   
				id = "og_" + key;
				$('#placelist').append($('<optgroup label="' + key + '" id="' + id + '" ></optgroup>')); 
				$.each (opts, function(okey, value) {
					$('#'+id).append($('<option>', { value : okey }).text(value)); 
				});
			});
			$("#datepicker").datepicker();
			var mTable = $("#main_table").dataTable( {
				"iDisplayLength" : 25	
			} )
				.columnFilter({
					aoColumns: [ null,
								{type: "select", values: ['Yes', 'No']},
								null,
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" },
								{type: "number-range" }]						
				});
			mTable.fnPageChange('last');
		});


		
	</script>

	<div style="border:1px solid #000000; padding:0.75em; padding-bottom:4em; margin-top:30px;">
		<table id="main_table">
			<thead><tr><th style="width:7em;">Date</th><th>All Day</th><th>Places</th><th>Place Pts</th><th>New Place Pts</th><th>Consec Pts</th><th>Cumulative</th></tr></thead><tbody>
			<?php

			$year = 1900;
			$pCumPrev = -1;
			while ($row = mysql_fetch_array($J)){
				$Dt = explode($row['Dt'], '-');
				$curyear = $Dt[0];
				if ($year <> $curyear){  // re-initialize every year
					$PlaceHistory = array();
					$consecDays = 0;
					$pCum = 0;
					$year = $curyear;
				}
				$pPlaces = 0;
				$pConsec = 0;
				$pNewP = 0;
				$rowPlaces = explode(',',$row['PlaceIDs']);
				foreach($rowPlaces as $placeid){
					if (in_array($placeid, $PlaceHistory)  && $placeid <> null){
						$pPlaces++;
					}
					else if (isset ($rowPlaces[0]) && trim($rowPlaces[0]) <> ''){
						$pNewP += 5;
					}
					$PlaceHistory[] = $placeid;
				}
				if ($row['AllDay'] == 'Yes'){
					$consecDays++;
					if ($consecDays == 3) {
						$pConsec = 50;
					}
					else if ($consecDays > 3){
						$pConsec = pow (2, $consecDays - 4) * 50;
					}
				}
				else{
					$consecDays = 0;
				}
				
				$pCum += $pNewP + $pConsec + $pPlaces;

				$noteicon = strlen($row['Notes']) > 0 ? ' <img src="/img/note_icon.gif" alt="note" title="'.$row['Notes'].'" style="display:inline;"/>' : '';

				if ($pCum <> $pCumPrev) {
					print '<tr><td>'.$row['Dt'].$noteicon.'</td><td>'.$row['AllDay'].'</td><td>'.str_replace (',', ', ', $row['Places']).'</td><td>'.$pPlaces.'</td><td>'.$pNewP.'</td><td>'.$pConsec.'</td><td>'.$pCum.'</td></tr>';
				}
				$pCum = $pCumPrev;
			}
			?>
			</tbody>
			<tfoot>
				<tr><th>Filter Results:</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th><th>&nbsp;</th></tr>
			</tfoot>
		</table>
	</div>
	
	<form method="post" action="postbfj.php" style="padding-top:30px;">
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
				<textarea name="notes" tabindex="6" style="width:20em; height:37em;"></textarea></td>
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
