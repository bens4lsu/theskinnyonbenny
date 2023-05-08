
		
		<div class="otheryears">
		<h3>Other Years:</h3>

		<?php

			$Now_array = getdate();
			$current_year = $Now_array['year'];

			for ($i = 2005; $i <= $current_year; $i++) {

				if (!($i == $year) && $i != 2021) {				//don't print the link back to the year you're on and no 2021
					print '<a href="https://theskinnyonbenny.com/dailyphoto/'.$i.'/index.php">'.$i.'</a>';
				}
			}
		?> 
		</div>