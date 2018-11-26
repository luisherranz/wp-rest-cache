<?php

/**
 * Fired during plugin deactivation
 *
 * @link:       http://www.acato.nl
 * @since       2018.1
 *
 * @package     WP_Rest_Cache
 * @subpackage  WP_Rest_Cache/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @package     WP_Rest_Cache
 * @subpackage  WP_Rest_Cache/includes
 * @author:     Richard Korthuis - Acato <richardkorthuis@acato.nl>
 */
class WP_Rest_Cache_Deactivator {

    /**
     * Deactivate the plugin. Clear cache and delete Must-Use plugin.
     */
    public static function deactivate() {
        WP_Rest_Cache_Caching::get_instance()->clear_caches( true );
        if ( file_exists( WPMU_PLUGIN_DIR . '/wp-rest-cache.php' ) ) {
            // @TODO: If multisite only delete if not active on ANY subsite
            unlink( WPMU_PLUGIN_DIR . '/wp-rest-cache.php' );
        }
    }
}