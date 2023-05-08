<?php

	$get_variable_array="HTTP_GET_VARS";
	if(isset(${$get_variable_array}["spgmGal"])){ $spgmGal=${$get_variable_array}["spgmGal"]; }

?>

<html>
<head>
<?php include ('tracking.php') ?>

<title>Photo Collections on theskinnyonbenny</title>
<meta name=description content="Web Page for Ben Schultz, Baton Rouge, LA ">
<meta name=keywords content="Photograph Collections">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<!--META HTTP-EQUIV="Pragma" CONTENT="no-cache"-->
<!--META HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE"-->
<META HTTP-EQUIV="CACHE-CONTROL" CONTENT="PUBLIC">
<link rel="stylesheet" type="text/css" href="https://theskinnyonbenny.com/style.css">
<script src="spgm.js" type="text/javascript"></script>
<script src="contrib/overlib410/overlib.js" type="text/javascript"></script>
<script language="JavaScript">

	getWindowDimensions = function()
	{
	    var windowWidth = 0;
    	var windowHeight = 0;
    
	    if ( (document.documentElement) && (document.documentElement.clientWidth) )
    	    windowWidth = document.documentElement.clientWidth;
	    else if ( (document.body) && (document.body.clientWidth) )
    	    windowWidth = document.body.clientWidth;
	    else if ( (document.body) && (document.body.offsetWidth) )
    	    windowWidth = document.body.offsetWidth;
	    else if ( window.innerWidth )
    	    windowWidth = window.innerWidth - 18;
    
	    if ( (document.documentElement) && (document.documentElement.clientHeight) )
    	    windowHeight = document.documentElement.clientHeight;
	    else if ( (document.body) && (document.body.clientHeight) )
    	    windowHeight = document.body.clientHeight;
	    else if ( (document.body) && (document.body.offsetHeight) )
    	    windowHeight = document.body.offsetHeight;
	    else if ( window.innerHeight )
    	    windowHeight = window.innerHeight - 18;
    
	    return { width: windowWidth, height: windowHeight };
	}
  
  //maximize the window
  if (screen.availWidth <= 1024)
     window.moveTo (0, 0);
  ldim = getWindowDimensions();

  if (ldim[height] < 768)
  	h = 768
  else 
  	h = ldim[height];

  window.resizeTo (1024, h);
</SCRIPT>

</head>
<body bgcolor="#666698">

<div  align="left"><a class="sbtop" href="pgCurrPicFrame.php?spgmGal=<?php echo $spgmGal; ?>" target="_blank" onclick="window.close();" style="font-size:12px; color:red;">Click here for a view that works better on small screens or mobile devices.</a></div>

<table width="100%">
	<tr>
		<td align="center">

			<table border="2" bgcolor="#666698" cellspacing = "8" cellpadding = "2">
				<tr>
					<td colspan="2" bgcolor="#B5B5CD" >
						<iframe width="100%" height="70" id="Title" name="Title" frameborder="0" src="pgTitle.php?spgmGal=<?php echo $spgmGal; ?>">		Your browser does not support iframes.		</iframe>
					</td>
				</tr>
				<tr>
					<td bgcolor="#B5B5CD">
						<iframe width="190" height="680" id="Thumbnail" name="Thumbnail" frameborder="0" src="pgtn.php?spgmGal=<?php echo $spgmGal; ?>">		Your browser does not support iframes.		</iframe>
					</td>
					<td bgcolor="#B5B5CD">
						<!-- <iframe width="656" height="680"id="Main" name="Main" frameborder="0" scrolling="no" src="pgCurrPicFrame.php?spgmGal=<?php echo $spgmGal; ?>">				Your browser does not support iframes.		</iframe> -->
						<iframe width="671" height="580"id="Main" name="Main" frameborder="0" scrolling="auto" src="pgCurrPicFrame.php?spgmGal=<?php echo $spgmGal; ?>">				Your browser does not support iframes.		</iframe>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</body>
</html>