<?php

	$db_connection = mysql_connect ('162.209.78.149', 'theskinn_user', 'dN)h~H5AzrzLsT552d37880#9305') or die (mysql_error());
	$db_select = mysql_select_db ('sites_theskinny') or die (mysql_error());

  $query1 = "select LinkID, URL, Description, DateAdded from tblLinks where IsCurrentFlag = 1";
  $query1_result = @mysql_query ($query1);
  $row1 = @mysql_fetch_array ($query1_result);
?>

<table width="100%" cellpadding="10">
  <tr>
    <td><?php echo $row1[Description]; ?></td>
  </tr>
  <tr><td><?php echo "<a href=\"$row1[URL]\" target=\"_blank\"><center>$row1[URL]</center></a>"; ?>
	  <br><a href="mailto:webmaster@theskinnyonbenny.com?subject=Link%20Of%20The%20Week%20Recommendation"><center>Suggest the Next One</center></a>
	  <br><!--<a href="/x/LOTWPast.php"><center>Look at Past LOTWs</center></a>-->
	</td>
  </tr>

</table>


