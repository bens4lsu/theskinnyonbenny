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
  define('HTTP_SERVER', 'https://theskinnyonbenny.com');
  define('HTTP_CATALOG_SERVER', 'https://theskinnyonbenny.com');
  define('HTTPS_CATALOG_SERVER', 'https://theskinnyonbenny.com');
  define('ENABLE_SSL_CATALOG', false); 	// secure webserver for catalog module
  define('DIR_FS_DOCUMENT_ROOT', '/home/users/web/b1051/sl.theskinn/public_html/osc/catalog/'); // where the pages are located on the server
  define('DIR_WS_ADMIN', '/osc/catalog/admin/'); 	// absolute path required
  define('DIR_FS_ADMIN', '/home/users/web/b1051/sl.theskinn/public_html/osc/catalog/admin/'); // absolute pate required
  define('DIR_WS_CATALOG', '/osc/catalog/'); 		// absolute path required
  define('DIR_FS_CATALOG', '/home/users/web/b1051/sl.theskinn/public_html/osc/catalog/'); // absolute path required
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_CATALOG_IMAGES', DIR_WS_CATALOG . 'images/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');
  define('DIR_WS_CATALOG_LANGUAGES', DIR_WS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_LANGUAGES', DIR_FS_CATALOG . 'includes/languages/');
  define('DIR_FS_CATALOG_IMAGES', DIR_FS_CATALOG . 'images/');
  define('DIR_FS_CATALOG_MODULES', DIR_FS_CATALOG . 'includes/modules/');
  define('DIR_FS_BACKUP', DIR_FS_ADMIN . 'backups/');

// define our database connection
  define('DB_SERVER', 'theskinn.startlogicmysql.com'); // eg, theskinn.startlogicmysql.com - should not be empty for productive servers
  define('DB_SERVER_USERNAME', 'theskinn_p_os1');
  define('DB_SERVER_PASSWORD', 'o1oscar');
  define('DB_DATABASE', 'theskinn_p_os1');
  define('USE_PCONNECT', 'false'); // use persisstent connections?
  define('STORE_SESSIONS', ''); // leave empty '' for default handler or set to 'mysql'
?>
