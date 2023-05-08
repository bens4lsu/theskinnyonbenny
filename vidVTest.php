<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Vimeo Simple API PHP Example</title>
	<style type="text/css">
		ul { list-style-type: none; margin: 0; padding: 0; }
		li { display: inline; padding: 0; margin: 10px 2px; }
		img { border: 0; }
		img#portrait { float: left; margin-right: 5px; }
		#stats { clear: both; }
	</style>
</head>
<body>

<h1>test</h1>
	<?php

	$a = array ('a' => 'apple', 'b' => 'banana', 'c' => array ('x', 'y', 'z'));
	print_r ($a);
	$clips = file_get_contents ('http://vimeo.com/api/album/24431/clips.xml');
	print_r ($clips);

	?>




</body>
</html>
