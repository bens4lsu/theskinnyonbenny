<?php
/////////////////////////////////////////////////////////////////////////
/////////
/////////    Vz Poll 1.0
/////////    Author : Luca Penzo <starluka@libero.it>
/////////    Visit the site VzScripts at http://adpforum2.sourceforge.net
/////////
/////////////////////////////////////////////////////////////////////////
////////////
//////////// Configuration
// title
$title_size="2";
// table
$contour=1;
$padding=0;
$contour_color="#000000";
$width="100%";
$width_results=600;
$bgcolor="#CCCCCC";
// fonts
$font_face="Verdana";
$font_size="1";
$font_size_results="2";
$font_color="#000000";
// button
$submit="Vote";
// results tab
$results="Results";
$votes="votes";
$voted="You have already voted !";
$thanks="Thank you very much for your vote !";
$color1="#CCCCCC";
$color2="#999999";
/////////////////// end of configuration
/////////////////// POLL 1.0
if(!isset($mode)){$mode="poll";}
switch($mode){
case("poll"):
echo"<LINK REL=STYLESHEET TYPE=\"text/css\" HREF=\"http://theskinn.startlogic.com/vzpoll/poll.css\">";
echo"<table class=\"outer\" cellspacing=\"1\">";
echo"<tr>";
echo"<td class=\"one\" width=\"$width\">";
       echo"<table class=\"inner\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"$width\">"; 
	   echo"<tr>";
	   $file_options=fopen("poll.txt","r");
	   $options=fread($file_options,filesize("poll.txt"));
	   fclose($file_options);
	   $options=explode("\n",$options);
	   echo"<td width=\"100%\" align=\"center\"><span class=\"title\"><b>$options[0]</b></span></td>";
	   echo"</tr>";
	   echo"<tr>";
	   echo"<td height=\"5\"></td>";
	   echo"</tr>";
	   echo"</table>";
	   echo"<table class=\"inner\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">"; 
	   echo"<form action=\"http://theskinn.startlogic.com/vzpoll/poll.php?mode=vote\" method=\"post\" target=\"_blank\">";
	   while (list($chiave,$valore)=each($options)){
	   if($chiave==0){}else{
	   $options_values=explode("|",$valore);
       	   $option=$options_values[0];
	   echo"<tr>";
	   echo"<td width=\"10%\" valign=\"top\" align=\"right\"><input type=\"radio\" name=\"id\" value=\"$chiave\"></td>";
	   echo"<td width=\"90%\" valign=\"middle\">&nbsp;$option</td>";	
	   echo"</tr>";
	   echo"<tr>";
	   echo"<td height=\"6\"></td>";
	   echo"<td height=\"6\"></td>";
	   echo"</tr>";
	   }
	   }
	   echo"</table>";
	   echo"<table class=\"inner\" cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">";
	   echo"<tr>";
	   echo"<td height=\"6\"></td>";
	   echo"</tr>"; 
	   echo"<tr>";
	   echo"<td width=\"100%\" align=\"center\"><input type=\"submit\" value=\"$submit\"></td>";
	   echo"</form>";
	   echo"</tr>";
	   echo"<tr>";
	   echo"<td height=\"3\"></td>";
	   echo"</tr>";
	   echo"<tr>";
           echo"<td width=\"100%\" align=\"center\"><a href=\"#\" onClick=\"window.open('http://theskinn.startlogic.com/vzpoll/poll.php?mode=results&what=0','pollResult', 'resizable,width=640,height=200')\"><span class=\"link\">$results</span></a></td>";
	   echo"</tr>";
	   echo"</table>";
echo"</td></tr></table>";
break;

case("vote"):
if ($HTTP_X_FORWARDED_FOR == "") {
$ip = getenv(REMOTE_ADDR);
}
else {
$ip = getenv(HTTP_X_FORWARDED_FOR);
}
$ip_read=fopen("ip.txt","r");
$ip_data=fread($ip_read,filesize("ip.txt"));
fclose($ip_read);
$ip_data=explode("\n",$ip_data);
while (list($key,$value)= each($ip_data)){
 if($value==$ip){header("Location: poll.php?mode=results&what=2");exit;}
}
$ip_file = fopen ("ip.txt", "a");
fwrite($ip_file,"$ip\n");
fclose($ip_file);

$file_options=fopen("poll.txt","r");
$options=fread($file_options,filesize("poll.txt"));
fclose($file_options);
$options=explode("\n",$options);
$risultati=array();
$risultati[]=$options[0];
while (list($chiave,$valore)= each($options)){
if($chiave==0){}else{
 $options_values=explode("|",$valore);
 $option=$options_values[0];
 $vote=$options_values[1];
  if($id==$chiave){$vote=$vote+1;}
 $risultati[]="$option|$vote";
 }
}
$risultati=implode("\n",$risultati);
$new_file = fopen ("poll.txt", "w");
fputs($new_file,"$risultati");
fclose($new_file);
header("Location: poll.php?mode=results&what=1");
break;

case("results"):
$file_options=fopen("poll.txt","r");
$options=fread($file_options,filesize("poll.txt"));
fclose($file_options);
$options=explode("\n",$options);
$count=$options;
echo"<table cellspacing=\"$contour\" cellpadding=\"$padding\" border=\"0\" bgcolor=\"$contour_color\" width=\"$width_results\">";
echo"<tr>";
echo"<td bgcolor=\"$bgcolor\" width=\"$width_results\">";
echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"100%\">"; 
while (list($chiave1,$valore1)=each($count)){
if($chiave1==0){}else{
 $options_values=explode("|",$valore1);
 $vote=$options_values[1];
 $a=$a+$vote;
 }
}
echo"<tr>";
echo"<td width=\"100%\" align=\"center\"><font face=\"$font_face\" size=\"$title_size\" color=\"$font_color\"><b>$options[0]</b><br>$a $votes</font></td>";
echo"</tr>";
echo"<tr>";
echo"<td height=\"5\"></td>";
echo"</tr>";
echo"</table>";
echo"<table cellspacing=\"0\" cellpadding=\"5\" border=\"0\" width=\"100%\">"; 
if($a==0){$percent=0;}
else{$percent=100/$a;}
$col=1;
while (list($chiave,$valore)=each($options)){
if($chiave==0){}else{
 if($col=="1"){$bgcolor=$color1;$col--;}
 else{$bgcolor=$color2;$col++;}
 $options_values=explode("|",$valore);
 $option=$options_values[0];
 $vote=$options_values[1];
 echo"<tr>";
 echo"<td width=\"4%\" align=\"left\" valign=\"top\" bgcolor=\"$bgcolor\"><font face=\"$font_face\" size=\"$font_size_results\" color=\"$font_color\"><b>$chiave</b></font></td>";
 echo"<td width=\"38%\" align=\"left\" valign=\"top\" bgcolor=\"$bgcolor\"><font face=\"$font_face\" size=\"$font_size_results\" color=\"$font_color\">$option</font></td>";
 echo"<td width=\"38%\" align=\"left\" bgcolor=\"$bgcolor\">";
 $percentage=$vote*$percent;
 $point=explode(".",$percentage);
 $units=$point[0];
 $decimals=$point[1];
 $count=count($point);
  if($count>1){
  $len=strlen ($decimals);
  $decimals=substr_replace($decimals, '', 1, $len);
  $percentage="$units.$decimals";
  }
 for($i=1;$i<=$percentage;$i++){echo"<img src=\"bar.gif\" border=\"0\">";}
 echo"</td>";
 echo"<td width=\"10%\" align=\"left\" valign=\"middle\" bgcolor=\"$bgcolor\">";
 echo"<font face=\"$font_face\" size=\"1\" color=\"#000000\">$percentage %</font>";
 echo"</td>";
 echo"<td width=\"10%\" align=\"left\" valign=\"middle\" bgcolor=\"$bgcolor\">";
 echo"<font face=\"$font_face\" size=\"1\" color=\"#000000\">$vote $votes</font>";
 echo"</td>";
 echo"</tr>";
 }
}
echo"</table>";
echo"</td></tr></table>";
if($what=="1"){
echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"$width_results\">";
echo"<tr>";
echo"<td width=\"100%\" align=\"center\"><br><br><font face=\"$font_face\" size=\"2\" color=\"#000000\"><b>$thanks</b></font></td>";
echo"</tr>";
echo"</table>";
}
if($what=="2"){
echo"<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\" width=\"$width_results\">";
echo"<tr>";
echo"<td width=\"100%\" align=\"center\"><br><br><font face=\"$font_face\" size=\"2\" color=\"#000000\"><b>$voted</b></font></td>";
echo"</tr>";
echo"</table>";
}
break;
}
?>
