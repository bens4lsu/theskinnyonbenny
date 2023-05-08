<html>
<head>
<?php include ('tracking.php') ?>

<link rel="stylesheet" href="https://theskinnyonbenny.com/pgstyle.css" type="text/css" media="screen" />
</head>
<body bgcolor="#B5B5CD">

<?php

	$get_variable_array="HTTP_GET_VARS";
	if(isset(${$get_variable_array}["spgmGal"])){ $spgmGal=${$get_variable_array}["spgmGal"]; }

	include ("/home/users/web/b1051/sl.theskinn/public_html/img/gal/".$spgmGal."/gal-desc.txt");
?>

</body>
</html>
</html>