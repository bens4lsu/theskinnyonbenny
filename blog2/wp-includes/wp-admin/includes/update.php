<?php
/**
 * WordPress Administration Update API
 *
 * @package WordPress
 * @subpackage Admin
 */

// The admin side of our 1.1 update system

/**
 * Selects the first update version from the update_core option
 *
 * @return object the response from the API
 */
function get_preferred_from_update_core() {
	$updates = get_core_updates();
	if ( !is_array( $updates ) )
		return false;
	if ( empty( $updates ) )
		return (object)array('response' => 'latest');
	return $updates[0];
}

/**
 * Get available core updates
 *
 * @param array $options Set $options['dismissed'] to true to show dismissed upgrades too,
 * 	set $options['available'] to false to skip not-dimissed updates.
 * @return array Array of the update objects
 */
function get_core_updates( $options = array() ) {
	$options = array_merge( array('available' => true, 'dismissed' => false ), $options );
	$dismissed = get_option( 'dismissed_update_core' );
	if ( !is_array( $dismissed ) ) $dismissed = array();
	$from_api = get_option( 'update_core' );
	if ( empty($from_api) )
		return false;
	if ( !is_array( $from_api->updates ) ) return false;
	$updates = $from_api->updates;
	if ( !is_array( $updates ) ) return false;
	$result = array();
	foreach($updates as $update) {
		if ( array_key_exists( $update->current.'|'.$update->locale, $dismissed ) ) {
			if ( $options['dismissed'] ) {
				$update->dismissed = true;
				$result[]= $update;
			}
		} else {
			if ( $options['available'] ) {
				$update->dismissed = false;
				$result[]= $update;
			}
		}
	}
	return $result;
}

function dismiss_core_update( $update ) {
	$dismissed = get_option( 'dismissed_update_core' );
	$dismissed[ $update->current.'|'.$update->locale ] = true;
	return update_option( 'dismissed_update_core', $dismissed );
}

function undismiss_core_update( $version, $locale ) {
	$dismissed = get_option( 'dismissed_update_core' );
	$key = $version.'|'.$locale;
	if ( !isset( $dismissed[$key] ) ) return false;
	unset( $dismissed[$key] );
	return update_option( 'dismissed_update_core', $dismissed );
}

function find_core_update( $version, $locale ) {
	$from_api = get_option( 'update_core' );
	if ( !is_array( $from_api->updates ) ) return false;
	$updates = $from_api->updates;
	foreach($updates as $update) {
		if ( $update->current == $version && $update->locale == $locale )
			return $update;
	}
	return false;
}

function core_update_footer( $msg = '' ) {
	if ( !current_user_can('manage_options') )
		return sprintf( '| '.__( 'Version %s' ), $GLOBALS['wp_version'] );

	$cur = get_preferred_from_update_core();
	if ( ! isset( $cur->current ) )
		$cur->current = '';

	if ( ! isset( $cur->url ) )
		$cur->url = '';

	if ( ! isset( $cur->response ) )
		$cur->response = '';

	switch ( $cur->response ) {
	case 'development' :
		return sprintf( __( 'You are using a development version (%1$s). Cool! Please <a href="%2$s">stay updated</a>.' ), $GLOBALS['wp_version'], 'update-core.php');
	break;

	case 'upgrade' :
		if ( current_user_can('manage_options') ) {
			return sprintf( '<strong>'.__( '<a href="%1$s">Get Version %2$s</a>' ).'</strong>', 'update-core.php', $cur->current);
			break;
		}

	case 'latest' :
	default :
		return sprintf( __( 'Version %s' ), $GLOBALS['wp_version'] );
	break;
	}
}
add_filter( 'update_footer', 'core_update_footer' );

function update_nag() {
	global $pagenow;

	if ( 'update-core.php' == $pagenow )
		return;

	$cur = get_preferred_from_update_core();

	if ( ! isset( $cur->response ) || $cur->response != 'upgrade' )
		return false;

	if ( current_user_can('manage_options') )
		$msg = sprintf( __('WordPress %1$s is available! <a href="%2$s">Please update now</a>.'), $cur->current, 'update-core.php' );
	else
		$msg = sprintf( __('WordPress %1$s is available! Please notify the site administrator.'), $cur->current );

	echo "<div id='update-nag'>$msg</div>";
}
add_action( 'admin_notices', 'update_nag', 3 );

// Called directly from dashboard
function update_right_now_message() {
	$cur = get_preferred_from_update_core();

	$msg = sprintf( __('You are using <span class="b">WordPress %s</span>.'), $GLOBALS['wp_version'] );
	if ( isset( $cur->response ) && $cur->response == 'upgrade' && current_user_can('manage_options') )
		$msg .= " <a href='update-core.php' class='button'>" . sprintf( __('Update to %s'), $cur->current ? $cur->current : __( 'Latest' ) ) . '</a>';

	echo "<span id='wp-version-message'>$msg</span>";
}

function wp_plugin_update_row( $file, $plugin_data ) {
	$current = get_option( 'update_plugins' );
	if ( !isset( $current->response[ $file ] ) )
		return false;

	$r = $current->response[ $file ];

	$details_url = admin_url('plugin-install.php?tab=plugin-information&plugin=' . $r->slug . '&TB_iframe=true&width=600&height=800');

	echo '<tr><td colspan="5" class="plugin-update">';
	if ( ! current_user_can('update_plugins') )
		printf( __('There is a new version of %1$s available. <a href="%2$s" class="thickbox" title="%1$s">View version %3$s Details</a>.'), $plugin_data['Name'], $details_url, $r->new_version);
	else if ( empty($r->package) )
		printf( __('There is a new version of %1$s available. <a href="%2$s" class="thickbox" title="%1$s">View version %3$s Details</a> <em>automatic upgrade unavailable for this plugin</em>.'), $plugin_data['Name'], $details_url, $r->new_version);
	else
		printf( __('There is a new version of %1$s available. <a href="%2$s" class="thickbox" title="%1$s">View version %3$s Details</a> or <a href="%4$s">upgrade automatically</a>.'), $plugin_data['Name'], $details_url, $r->new_version, wp_nonce_url('update.php?action=upgrade-plugin&amp;plugin=' . $file, 'upgrade-plugin_' . $file) );

	echo '</td></tr>';
}
add_action( 'after_plugin_row', 'wp_plugin_update_row', 10, 2 );

function wp_update_plugin($plugin, $feedback = '') {
	global $wp_filesystem;

	if ( !empty($feedback) )
		add_filter('update_feedback', $feedback);

	// Is an update available?
	$current = get_option( 'update_plugins' );
	if ( !isset( $current->response[ $plugin ] ) )
		return new WP_Error('up_to_date', __('The plugin is at the latest version.'));

	// Is a filesystem accessor setup?
	if ( ! $wp_filesystem || ! is_object($wp_filesystem) )
		WP_Filesystem();

	if ( ! is_object($wp_filesystem) )
		return new WP_Error('fs_unavailable', __('Could not access filesystem.'));

	if ( $wp_filesystem->errors->get_error_code() )
		return new WP_Error('fs_error', __('Filesystem error'), $wp_filesystem->errors);

	//Get the base plugin folder
	$plugins_dir = $wp_filesystem->wp_plugins_dir();
	if ( empty($plugins_dir) )
		return new WP_Error('fs_no_plugins_dir', __('Unable to locate WordPress Plugin directory.'));

	//And the same for the Content directory.
	$content_dir = $wp_filesystem->wp_content_dir();
	if( empty($content_dir) )
		return new WP_Error('fs_no_content_dir', __('Unable to locate WordPress Content directory (wp-content).'));

	$plugins_dir = trailingslashit( $plugins_dir );
	$content_dir = trailingslashit( $content_dir );

	// Get the URL to the zip file
	$r = $current->response[ $plugin ];

	if ( empty($r->package) )
		return new WP_Error('no_package', __('Upgrade package not available.'));

	// Download the package
	$package = $r->package;
	apply_filters('update_feedback', sprintf(__('Downloading update from %s'), $package));
	$download_file = download_url($package);

	if ( is_wp_error($download_file) )
		return new WP_Error('download_failed', __('Download failed.'), $download_file->get_error_message());

	$working_dir = $content_dir . 'upgrade/' . basename($plugin, '.php');

	// Clean up working directory
	if ( $wp_filesystem->is_dir($working_dir) )
		$wp_filesystem->delete($working_dir, true);

	apply_filters('update_feedback', __('Unpacking the update'));
	// Unzip package to working directory
	$result = unzip_file($download_file, $working_dir);

	// Once extracted, delete the package
	unlink($download_file);

	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($working_dir, true);
		return $result;
	}

	if ( is_plugin_active($plugin) ) {
		//Deactivate the plugin silently, Prevent deactivation hooks from running.
		apply_filters('update_feedback', __('Deactivating the plugin'));
		deactivate_plugins($plugin, true);
	}

	// Remove the existing plugin.
	apply_filters('update_feedback', __('Removing the old version of the plugin'));
	$this_plugin_dir = trailingslashit( dirname($plugins_dir . $plugin) );

	// If plugin is in its own directory, recursively delete the directory.
	if ( strpos($plugin, '/') && $this_plugin_dir != $plugins_dir ) //base check on if plugin includes directory seperator AND that its not the root plugin folder
		$deleted = $wp_filesystem->delete($this_plugin_dir, true);
	else
		$deleted = $wp_filesystem->delete($plugins_dir . $plugin);

	if ( ! $deleted ) {
		$wp_filesystem->delete($working_dir, true);
		return new WP_Error('delete_failed', __('Could not remove the old plugin'));
	}

	apply_filters('update_feedback', __('Installing the latest version'));
	// Copy new version of plugin into place.
	$result = copy_dir($working_dir, $plugins_dir);
	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($working_dir, true);
		return $result;
	}

	//Get a list of the directories in the working directory before we delete it, We need to know the new folder for the plugin
	$filelist = array_keys( $wp_filesystem->dirlist($working_dir) );

	// Remove working directory
	$wp_filesystem->delete($working_dir, true);

	// Force refresh of plugin update information
	delete_option('update_plugins');

	if( empty($filelist) )
		return false; //We couldnt find any files in the working dir, therefor no plugin installed? Failsafe backup.

	$folder = $filelist[0];
	$plugin = get_plugins('/' . $folder); //Ensure to pass with leading slash
	$pluginfiles = array_keys($plugin); //Assume the requested plugin is the first in the list

	return  $folder . '/' . $pluginfiles[0];
}

function wp_update_theme($theme, $feedback = '') {
	global $wp_filesystem;

	if ( !empty($feedback) )
		add_filter('update_feedback', $feedback);

	// Is an update available?
	$current = get_option( 'update_themes' );
	if ( !isset( $current->response[ $theme ] ) )
		return new WP_Error('up_to_date', __('The theme is at the latest version.'));

	$r = $current->response[ $theme ];

	$themes = get_themes();
	foreach ( (array) $themes as $this_theme ) {
		if ( $this_theme['Stylesheet'] == $theme ) {
			$theme_directory = preg_replace('!^/themes/!i', '', $this_theme['Stylesheet Dir']);
			break;
		}
	}
	unset($themes);

	if ( empty($theme_directory) )
		return new WP_Error('theme_non_existant', __('Theme does not exist.'));

	// Is a filesystem accessor setup?
	if ( ! $wp_filesystem || ! is_object($wp_filesystem) )
		WP_Filesystem();

	if ( ! is_object($wp_filesystem) )
		return new WP_Error('fs_unavailable', __('Could not access filesystem.'));

	if ( $wp_filesystem->errors->get_error_code() )
		return new WP_Error('fs_error', __('Filesystem error'), $wp_filesystem->errors);

	//Get the base plugin folder
	$themes_dir = $wp_filesystem->wp_themes_dir();
	if ( empty($themes_dir) )
		return new WP_Error('fs_no_themes_dir', __('Unable to locate WordPress Theme directory.'));

	//And the same for the Content directory.
	$content_dir = $wp_filesystem->wp_content_dir();
	if( empty($content_dir) )
		return new WP_Error('fs_no_content_dir', __('Unable to locate WordPress Content directory (wp-content).'));

	$themes_dir = trailingslashit( $themes_dir );
	$content_dir = trailingslashit( $content_dir );

	if ( empty($r->package) )
		return new WP_Error('no_package', __('Upgrade package not available.'));

	// Download the package
	apply_filters('update_feedback', sprintf(__('Downloading update from %s'), $r['package']));
	$download_file = download_url($r['package']);

	if ( is_wp_error($download_file) )
		return new WP_Error('download_failed', __('Download failed.'), $download_file->get_error_message());

	$working_dir = $content_dir . 'upgrade/' . basename($theme_directory);

	// Clean up working directory
	if ( $wp_filesystem->is_dir($working_dir) )
		$wp_filesystem->delete($working_dir, true);

	apply_filters('update_feedback', __('Unpacking the update'));
	// Unzip package to working directory
	$result = unzip_file($download_file, $working_dir);

	// Once extracted, delete the package
	unlink($download_file);

	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($working_dir, true);
		return $result;
	}

	//TODO: Is theme currently active? If so, set default theme
	/*
	if ( is_plugin_active($plugin) ) {
		//Deactivate the plugin silently, Prevent deactivation hooks from running.
		apply_filters('update_feedback', __('Deactivating the plugin'));
		deactivate_plugins($plugin, true);
	}*/

	// Remove the existing plugin.
	apply_filters('update_feedback', __('Removing the old version of the theme'));
	$deleted = $wp_filesystem->delete($themes_dir . $theme_directory, true);

	if ( ! $deleted ) {
		$wp_filesystem->delete($working_dir, true);
		return new WP_Error('delete_failed', __('Could not remove the old plugin'));
	}

	apply_filters('update_feedback', __('Installing the latest version'));
	// Copy new version of plugin into place.
	$result = copy_dir($working_dir, $themes_dir);
	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($working_dir, true);
		return $result;
	}

	//Get a list of the directories in the working directory before we delete it, We need to know the new folder for the plugin
	//$filelist = array_keys( $wp_filesystem->dirlist($working_dir) );

	// Remove working directory
	$wp_filesystem->delete($working_dir, true);

	// Force refresh of plugin update information
	delete_option('update_themes');

	/*if( empty($filelist) )
		return false; //We couldnt find any files in the working dir, therefor no plugin installed? Failsafe backup.

	$folder = $filelist[0];
	$plugin = get_plugins('/' . $folder); //Ensure to pass with leading slash
	$pluginfiles = array_keys($plugin); //Assume the requested plugin is the first in the list

	return  $folder . '/' . $pluginfiles[0];*/
}


function wp_update_core($current, $feedback = '') {
	global $wp_filesystem;

	@set_time_limit( 300 );

	if ( !empty($feedback) )
		add_filter('update_feedback', $feedback);

	// Is an update available?
	if ( !isset( $current->response ) || $current->response == 'latest' )
		return new WP_Error('up_to_date', __('WordPress is at the latest version.'));

	// Is a filesystem accessor setup?
	if ( ! $wp_filesystem || ! is_object($wp_filesystem) )
		WP_Filesystem();

	if ( ! is_object($wp_filesystem) )
		return new WP_Error('fs_unavailable', __('Could not access filesystem.'));

	if ( $wp_filesystem->errors->get_error_code() )
		return new WP_Error('fs_error', __('Filesystem error'), $wp_filesystem->errors);

	// Get the base WP folder
	$wp_dir = $wp_filesystem->abspath();
	if ( empty($wp_dir) )
		return new WP_Error('fs_no_wp_dir', __('Unable to locate WordPress directory.'));

	// And the same for the Content directory.
	$content_dir = $wp_filesystem->wp_content_dir();
	if( empty($content_dir) )
		return new WP_Error('fs_no_content_dir', __('Unable to locate WordPress Content directory (wp-content).'));

	$wp_dir = trailingslashit( $wp_dir );
	$content_dir = trailingslashit( $content_dir );

	// Get the URL to the zip file
	$package = $current->package;

	// Download the package
	apply_filters('update_feedback', sprintf(__('Downloading update from %s'), $package));
	$download_file = download_url($package);

	if ( is_wp_error($download_file) )
		return new WP_Error('download_failed', __('Download failed.'), $download_file->get_error_message());

	$working_dir = $content_dir . 'upgrade/core';
	// Clean up working directory
	if ( $wp_filesystem->is_dir($working_dir) ) {
		$wp_filesystem->delete($working_dir, true);
	}

	apply_filters('update_feedback', __('Unpacking the core update'));
	// Unzip package to working directory
	$result = unzip_file($download_file, $working_dir);
	// Once extracted, delete the package
	unlink($download_file);

	if ( is_wp_error($result) ) {
		$wp_filesystem->delete($working_dir, true);
		return $result;
	}

	// Copy update-core.php from the new version into place.
	if ( !$wp_filesystem->copy($working_dir . '/wordpress/wp-admin/includes/update-core.php', $wp_dir . 'wp-admin/includes/update-core.php', true) ) {
		$wp_filesystem->delete($working_dir, true);
		return new WP_Error('copy_failed', __('Could not copy files'));
	}
	$wp_filesystem->chmod($wp_dir . 'wp-admin/includes/update-core.php', FS_CHMOD_FILE);

	require(ABSPATH . 'wp-admin/includes/update-core.php');

	return update_core($working_dir, $wp_dir);
}

function maintenance_nag() {
	global $upgrading;
	if ( ! isset( $upgrading ) )
		return false;

	if ( current_user_can('manage_options') )
		$msg = sprintf( __('An automated WordPress update has failed to complete - <a href="%s">please attempt the update again now</a>.'), 'update-core.php' );
	else
		$msg = __('An automated WordPress update has failed to complete! Please notify the site administrator.');

	echo "<div id='update-nag'>$msg</div>";
}
add_action( 'admin_notices', 'maintenance_nag' );

?>
