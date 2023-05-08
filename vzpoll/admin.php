<?php
// admin password
$admin_password="o1oscar"; // change this to your password
///////////////////////  don't edit under here
/// words variables

$how_many="How many answers ?";
$write_question="Write down the poll's <b>question</b> :";
$write_answers="Write down your poll's <b>answers</b> :";
$choose="Choose what you want to do";
$modify="Modify Poll";
$create="Create Poll";
$submit="Submit";
$save="Save";
$login="Login";
if(!isset($mode)){$mode="login";}
switch($mode){
case("login"):
echo"<html><body topmargin=\"50\">";
echo"<div align=\"center\">";
echo"<center>";
echo"<table cellspacing=\"1\" cellpadding=\"5\" border=\"1\" width=\"500\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" height=\"240\">";
echo"<tr>";
echo"<td align=\"center\" height=\"63\" bgcolor=\"#C0C0C0\">";
echo"<b><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">Please 
enter your password to login</font></b>";
echo"</td>";
echo"</tr>";
echo"<tr>";

echo"<td  align=\"center\" width=\"100%\" height=\"170\" bgcolor=\"#000066\">";
echo"<form action=\"admin.php?mode=choose\" method=\"post\">";
echo"<input type=\"password\" name=\"password\" size=\"15\" style=\"border:0; height:20\">";
echo"&nbsp;<input type=\"submit\" value=\" $login \" style=\"font-family:sans-serif; 
font-size:14;font-style:bold; background:#669999 none;color:#fff; border:0; height:20\">";
echo"</form>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"</center>";
echo"</div></body></html>";
break;

case("choose"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<html><body topmargin=\"50\">";
echo"<div align=\"center\">";
echo"<center>";
echo"<table cellspacing=\"1\" cellpadding=\"5\" border=\"1\" width=\"500\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" height=\"240\">";
echo"<tr>";
echo"<td colspan=\"2\" align=\"center\" height=\"63\" bgcolor=\"#C0C0C0\">";
echo"<b><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$choose</font></b>";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td  align=\"center\" width=\"50%\" height=\"170\" bgcolor=\"#000066\">";
echo"<form action=\"admin.php?mode=configure\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<input type=\"submit\" value=\" $create \" style=\"font-family:sans-serif; font-size:14;font-style:bold; background:#669999 none;color:#fff;
border:0; height:22 \">";
echo"</form>";
echo"</td>";

echo"<td  align=\"center\" width=\"50%\" height=\"170\" bgcolor=\"#000066\">";
echo"<form action=\"admin.php?mode=modify\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<input type=\"submit\" value=\"$modify\" style=\"font-family:sans-serif; font-size:14;font-style:bold; background:#669999 none;color:#fff; border:0; height:22 \">";
echo"</form>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"</center>";
echo"</div></body></html>";

break;

case("configure"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<html><body topmargin=\"50\">";
echo"<div align=\"center\">";
echo"<center>";
echo"<table cellspacing=\"1\" cellpadding=\"5\" border=\"1\" width=\"500\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" height=\"240\">";
echo"<tr>";
echo"<td align=\"center\" height=\"63\" bgcolor=\"#C0C0C0\">";
echo"<b><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$how_many</font></b>";
echo"</td>";
echo"</tr>";
echo"<form action=\"admin.php?mode=create\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<tr>";
echo"<td  align=\"center\" width=\"100%\" height=\"170\" bgcolor=\"#000066\">";
echo"<input type=\"text\" size=\"10\" name=\"number\">";
echo"&nbsp;<input type=\"submit\" value=\"$submit\" style=\"font-family:sans-serif; font-size:14;font-style:bold; background:#669999 none;color:#fff; 
border:0; height:22 \">";
echo"</td>";
echo"</tr>";
echo"</form>";
echo"</table>";
echo"</center>";
echo"</div></body></html>";
break;

case("create"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
echo"<html><body topmargin=\"50\">";
echo"<div align=\"center\">";
echo"<center>";
echo"<table cellspacing=\"0\" cellpadding=\"0\" width=\"500\" border=\"1\" style=\"border-collapse: collapse\" bordercolor=\"#111111\">";
echo"<tr>";
echo"<td align=\"center\" height=\"63\" bgcolor=\"#C0C0C0\" colspan=\"2\">";
echo"<b><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">Create Poll</font></b>";
echo"</td>";
echo"</tr>";
echo"</table>";
echo"<table cellspacing=\"0\" cellpadding=\"0\" width=\"500\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" style=\"border: 1pt solid 
#000000;padding: 4px;}\" bgcolor=\"000066\">";
echo"<form action=\"admin.php?mode=create_confirm&number=$number\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<tr><td>&nbsp;</td></tr>";
echo"<tr>";
echo"<td align=\"center\">";
echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#ffffff\">$write_question</font>";
echo"</td>";
echo"</tr>";
echo"<tr>";
echo"<td align=\"center\">";
echo"<input type=\"text\" size=\"70\" name=\"question\">";
echo"</td>";
echo"</tr>";

echo"<tr>";
echo"<td align=\"center\">";
echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#ffffff\">$write_answers</font>";
echo"</td>";
echo"</tr>";

for($i=1;$i<=$number;$i++){
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#ffffff\"><b>$i</b> :</font> <input type=\"text\" size=\"50\" name=\"selection[$i]\">";
 echo"</td>";
 echo"</tr>";
}
echo"<tr>";
 echo"<td align=\"center\">";
echo"<br><input type=\"submit\" value=\"-------- Create --------\" style=\"font-family:sans-serif; font-size:14;font-style:bold; background:#669999 
none;color:#fff; border:0; height:22 \">";
echo"</td>";
 echo"</tr>";
echo"</table>";
echo"</form>";
echo"</center>";
echo"</div></body></html>";
break;

case("create_confirm"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
$file_to_write=array();
$question=stripslashes($question);
$file_to_write[]="$question";
for($i=1;$i<=$number;$i++){
$answer=stripslashes($selection[$i]);
$file_to_write[]="$answer|0";
}
$file=implode("\n",$file_to_write);
$new_file = fopen ("poll.txt", "w");
fputs($new_file,$file);
fclose($new_file);
$ip_file = fopen ("ip.txt", "w");
fputs($ip_file,"");
fclose($ip_file);
header("Location: poll.php");
break;

case("modify"):
if($password==$admin_password){}else{header("Location: admin.php?mode=login");exit;}
$file_options=fopen("poll.txt","r");
$options=fread($file_options,filesize("poll.txt"));
fclose($file_options);
$options=explode("\n",$options);
$count=count($options);
$number=$count-1;
echo"<html><head><title>Modify Poll</title></head>";
echo"<body topmargin=\"50\">";
echo"<div align=\"center\"><center>";
echo"<table cellspacing=\"0\" cellpadding=\"0\" width=\"580\" border=\"1\" style=\"border-collapse: collapse\" bordercolor=\"#111111\">";
echo"<tr>";
echo"<td align=\"center\" height=\"63\" bgcolor=\"#C0C0C0\" colspan=\"2\">";
echo"<b><font face=\"Verdana,Arial\" size=\"2\" color=\"#000000\">$modify</font></b>";
echo"</td>";
echo"</tr>";
echo"</table>";

echo"<table cellspacing=\"0\" cellpadding=\"0\" width=\"580\" style=\"border-collapse: collapse\" bordercolor=\"#111111\" style=\"border: 1pt solid 
#000000;padding: 4px;}\" bgcolor=\"000066\">";
echo"<form action=\"admin.php?mode=create_confirm&number=$number\" method=\"post\">";
echo"<input type=\"hidden\" name=\"password\" value=\"$password\">";
echo"<tr><td align=\"center\">&nbsp;</td><td align=\"center\">&nbsp;</td></tr>";
while (list($chiave,$valore)= each($options)){
 if($chiave=="0"){
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#ffffff\"><b>Question</b> : </font>";
 echo"</td>";
 echo"<td align=\"center\">";
 echo"<input type=\"text\" size=\"65\" name=\"question\" value=\"$valore\" style=\"border:0\">";
 echo"</td>";
 echo"</tr>";
 }
 else{
 $options_values=explode("|",$valore);
 $option=$options_values[0];
 echo"<tr>";
 echo"<td align=\"center\">";
 echo"<font face=\"Verdana,Arial\" size=\"2\" color=\"#ffffff\"><b>Answer $chiave</b> : </font>";
 echo"</td>";
 echo"<td align=\"center\">";
 echo"<input type=\"text\" size=\"65\" name=\"selection[$chiave]\" value=\"$option\" style=\"border:0\">";
 echo"</td>";
 echo"</tr>";
 }
}
echo"<tr><td align=\"center\">&nbsp;</td><td align=\"center\">&nbsp;</td></tr>";
echo"<tr>";
echo"<td align=\"center\" colspan=\"2\">";
echo"<input type=\"submit\" value=\"$save\" style=\"font-family:sans-serif; font-size:14;font-style:bold; background:#669999 none;color:#fff;
border:0; height:22; width:60;\">";
echo"</td>";
echo"</tr>";
echo"</form>";
echo"</table>";
echo"</center></div>";
echo"</body></html>";
break;
}
?>
