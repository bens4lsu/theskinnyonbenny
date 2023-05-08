<?php
/*
  osCommerce, Open Source E-Commerce Solutions
  http://www.oscommerce.com

  Copyright (c) 2003 osCommerce

  Released under the GNU General Public License
*/

// Define the webserver and path parameters
// * DIR_FS_* = Filesystem directories (local/physical)
// * DIR_WS_* = Webserver directories (virtual/URL)
  define('HTTP_SERVER', 'http://theskinnyonbenny.com');		
  define('HTTPS_SERVER', 'https://st02.startlogic.com');
  define('ENABLE_SSL', false);			// secure webserver for checkout procedure?
  define('HTTP_COOKIE_DOMAIN', 'theskinnyonbenny.com');
  define('HTTPS_COOKIE_DOMAIN', 'theskinn.startlogic.com');
  define('HTTP_COOKIE_PATH', '/osc/catalog/');
  define('HTTPS_COOKIE_PATH', '/osc/catalog/');
  define('DIR_WS_HTTP_CATALOG', '/osc/catalog/');
  define('DIR_WS_HTTPS_CATALOG', '/osc/catalog/');
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');

  define('DIR_WS_DOWNLOAD_PUBLIC', 'pub/');
  define('DIR_FS_CATALOG', '/home/users/web/b1051/sl.theskinn/public_html/osc/catalog/');
  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');

// define our database connection
  define('DB_SERVER', 'theskinn.startlogicmysql.com'); // eg, theskinn.startlogicmysql.com - should not be empty for productive servers
  define('DB_SERVER_USERNAME', 'theskinn_p_os1');
  define('DB_SERVER_PASSWORD', 'o1oscar');
  define('DB_DATABASE', 'theskinn_p_os1');
  define('USE_PCONNECT', 'false'); // use persistent connections?
  define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'
?>
