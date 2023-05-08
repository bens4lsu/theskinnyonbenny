<?php
// ** MySQL settings ** //
//define('DB_NAME', 'sites_theskinny');     // The name of the database
//define('DB_USER', 'theskinn_user');     // Your MySQL username
//define('DB_PASSWORD', 'dN)h~H5AzrzLsT552d37880#9305'); // ...and password
//define('DB_HOST', '162.209.78.149');     // 99% chance you won't need to change this value


	define('DB_HOST', '10.4.0.199');
	define('DB_NAME', 'sites_theskinny');	
	define('DB_USER', 'theskinn_user');
	define('DB_PASSWORD', 'dN)h~H5AzrzLsT552d37880#9305');
	define('DB_DSN', 'mysql:dbname=sites_theskinny;host=10.4.0.199');

define('DB_CHARSET', 'utf8');
define('DB_COLLATE', '');
// Change the prefix if you want to have multiple blogs in a single database.
$table_prefix  = 'wpben_';   // example: 'wp_' or 'b2' or 'mylogin_'

// Change this to localize WordPress.  A corresponding MO file for the
// chosen language must be installed to wp-includes/languages.
// For example, install de.mo to wp-includes/languages and set WPLANG to 'de'
// to enable German language support.
define ('WPLANG', '');

/* Stop editing */

define('ABSPATH', dirname(__FILE__).'/');
require_once(ABSPATH.'wp-settings.php');
?>
