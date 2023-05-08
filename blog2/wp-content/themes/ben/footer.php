<?php

$localtime_assoc = localtime(time(), true);
$y = $localtime_assoc['tm_year']+1900;
?>
	<div id="footer">
		<small><br /><br /><span style="margin-left:50px">Copyright 2004-<?php echo $y; ?> theskinnyonbenny.com</span></small>
	</div>
</div>
</body>
</html>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93593623-1', 'auto');
  ga('send', 'pageview');

</script>
