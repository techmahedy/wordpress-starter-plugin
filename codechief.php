<?php

/*
Plugin Name: CodeChief
Plugin URI: https://wordpress.org/plugins/codechief
Description: A awesome WordPress plugin to manage many user options and create many new features easily from admin panel.
Version: 1.0.2
Author: CodeChief
Author URI: https://profiles.wordpress.org/mahedy150101/
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: codechief
*/


defined( 'ABSPATH' ) or die( 'Great!');

/**
 * @return importing those classes to autoload those class file
 */

use Base\Init;
use Base\Plugin\PluginActivated;
use Base\Plugin\PluginDeActivated;

/**
*--------------------------------------------------------------------------
* Autoload php classes and services
*--------------------------------------------------------------------------
*
* after incuding autoload.php file we can to all the classes automatically
* without running composer-dump autoload
*
* @param $file
*
*/

if ( file_exists( dirname( __FILE__ ) .'/vendor/autoload.php' ) ) {

	require_once dirname( __FILE__ ) .'/vendor/autoload.php';

	require_once dirname( __FILE__ ) .'/app/admin/AuthorProfileWidget.php';
}

/**
 * @return creating plugin path and plugin directrory url
 */

define( 'CODECHIEF_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'CODECHIEF_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * @method define constant global plugin version
 * @var void
 * @param null
 * @return plugin version
 */

if (!defined('CODECHIEF_VERSION')) {

	if ( is_admin() ) {

	    if( !function_exists('get_plugin_data') ){

	        require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	    }

	    $codechief_plugin_data = get_plugin_data( __FILE__ );
	}

    $codechief_plugin_version = $codechief_plugin_data['Version'];

    define('CODECHIEF_VERSION', $codechief_plugin_version);
}


/**
 * @return When this plugin will activate, this method will render.
 */

if ( class_exists( 'Base\\Plugin\\PluginActivated' ) ) {

   PluginActivated::codechief_plugin_activated();

}

/**
 * @return When this plugin will deactivate, this method will render.
 */

if ( class_exists( 'Base\\Plugin\\PluginDeActivated' ) ) {

  PluginDeActivated::codechief_plugin_deactivated();

}

/**
 *---------------------------------------------------------------------
 * Activation & Deactivation Hook
 *---------------------------------------------------------------------
 *
 * register_activation_hook call automatically when a plugin is installed
 * register_deactivation_hook call automatically when a plugin is uninstalled
 *
 * @param $file and a $callback function 
 *
 */

register_activation_hook(__FILE__, array(PluginActivated::class,'create_database_table'));

register_activation_hook( __FILE__, array(PluginActivated::class,'codechief_activate') );

register_deactivation_hook( __FILE__, array(PluginDeActivated::class,'delete_database_table' ));

/**
 * Create all classes instance and load servicess automatically.
 *
 * @return void
 */

if ( class_exists( 'Base\\Init' ) ) 
{
	Init::codechief_services_loaded();
}