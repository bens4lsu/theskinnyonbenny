
		
		<br><br>
		<b>Other Years:</b>&nbsp;&nbsp;

		<?php

			for ($i == 2004; $i <= $year; $i++) {
				if (!($i == $year)){
					print '<a href="http://theskinnyonbenny.com/dailyphoto/'.$i.'/index.php>'.$i.'</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
				}
			}