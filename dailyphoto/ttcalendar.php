<?php

# TT calendar library 1.0
# (c)copyright John W. List 2004 http://www.technotoad.com

# This library is free software; you can redistribute it and/or
# modify it under the terms of the GNU Lesser General Public
# License as published by the Free Software Foundation; either
# version 2.1 of the License, or (at your option) any later version.

# This library is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
# Lesser General Public License for more details.

# You should have received a copy of the GNU Lesser General Public
# License along with this library; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

function returnmonthlength($month,$year){
#returns the number of days in a given month
	switch ($month) {
	    case 1: #jan
	    case 3: #mar
	    case 5: #may
	    case 7: #july
	    case 8: #aug
	    case 10: #oct
	    case 12: #dec
	        $monthlength = 31;
	    break;
	    case 4: #apr
	    case 6: #jun
	    case 9: #sep
	    case 11: #nov
	        $monthlength = 30;
	    break;
	    case 2: #feb
	        $monthlength = 28;
		if(checkdate(2,29,$year)){$monthlength=29;} #check for leap years
	    break;
	}
return $monthlength;
}

function returnmontharray($month, $year,$daynames=""){
	#returns an array representing the 6 calendar weeks that can contain the month
	$first_day_array = getdate(mktime(0,0,0,$month,1,$year));
	$monthlength = returnmonthlength($month,$year);
	$first_day = $first_day_array["wday"]+1; #to give a sunday based week
	$last_day = ($first_day+$monthlength)-1; # -1 cos 1 based array
	$month_array = array();
	$today=1;
	for ($i = $first_day; $i <= $last_day; $i++) {
		$month_array[$i]["num"]=$today;
		$today++;
	}
	#now populate the month and the year into the array
	$month_array["month"] = $month;
	$month_array["year"] = $year;
	#get the day names
	if($daynames==""){
		$daynames = array("S","M","T","W","T","F","S"); #default English
	}
	$month_array["daynames"] = $daynames;
return $month_array;
}

function dayrangecolour($month_array,$colour,$start,$end=""){
#sets the "col" attribute for a range of days in a month array to the value specified
	if($end==""){ $end=$start; } #just one day
	$i=0;
	do{ #find first day
		$i++;
	}while($month_array[$i-1]["num"]!=$start);
	for ($day = $i; $day <= ($i+($end-$start)); $day++) {
		$month_array[$day]["col"]=$colour;
	}
return $month_array;
}

function daycolour($month_array,$daytocolour,$colour){
#colours the same day every week with a colour.
	$daytocolour++; #add one to the day to give zero=sunday based days like those PHP's getdate() returns
	for ($day = $daytocolour; $day <= 42; $day=$day+7) {
		$month_array[$day]["col"]=$colour;
	}
return $month_array;
}

function dayrangelink($month_array,$link,$start,$end=""){
#sets the "link" attribute for a range of days in a month array to the value specified
	if($end==""){ $end=$start; } #just one day
	$i=0;
	do{ #find first day
		$i++;
	}while($month_array[$i-1]["num"]!=$start);
	for ($day = $i; $day <= ($i+($end-$start)); $day++) {
		$month_array[$day]["link"]=$link;
	}
return $month_array;
}

function returnmonthhtml($month_array,$topcolour="",$tableattributes=""){
#returns an HTML table showing the month
	$month = $month_array["month"];
	$year = $month_array["year"];
	$daynames = $month_array["daynames"];
	if($tableattributes!=""){$tableattributes=" " . $tableattributes;}
	$html = "<table" . $tableattributes . ">\n<tr>";
	if($topcolour!=""){$topcolour=" bgcolor=\"" . $topcolour . "\"";}
	foreach ($daynames as $dayname) {
		$html .= "<td" . $topcolour . "><font size=\"-1\"><b>" . $dayname . "</b></font></td>";
	}
	$html .= "</tr>\n";
	$cellcount=1;
	for ($i = 1; $i <= 42; $i++) {
		if($cellcount==1){$html.="<tr>";}
		$day = $month_array[$i]["num"];
		if(isset($month_array[$i]["col"]) && $month_array[$i]["col"]!=""){ #have we been given a colour
			$html .= "<td bgcolor=\"" . $month_array[$i]["col"] . "\">";
		}
		else{
			$html .= "<td>";
		}
		$html .= "<font size=\"-1\">";
		if($month_array[$i]["link"]!=""){
			if(strstr($month_array[$i]["link"],"?")){ $separator = "&"; } else { $separator = "?"; }
			$html .= "<a href=\"" . $month_array[$i]["link"] . $separator . "year=" . $year . "&month=" . $month . "&day=" . $day . "\">";
		}
		if($day!=""){$html.=$day;}
		if($month_array[$i]["link"]!=""){ $html .= "</a>"; }
		$html .= "</font>";
		$html .= "</td>";
		if($cellcount==7){
			$html.="</tr>\n";
			$cellcount=0;
			if($month_array[$i+1]["num"]==""){break;} #leave the table if the next row's empty
		}
		$cellcount++;
	}
	$html.="</table>";
return $html;
}

?>
