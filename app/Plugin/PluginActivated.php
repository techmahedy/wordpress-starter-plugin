<?php 

/**
 * @package codechief
 */

namespace App\Plugin;

class PluginActivated
{   
    public function __construct() 
    {
      add_action(
        'admin_init', 
        array(PluginActivated::class,'codechief_redirect_after_installation')
      );
    }
    
    public function codechief_activate()
    {
      add_option( 
        'codechief_redirect_after_installation',
        true 
      );
    }
    
    /**
      *----------------------------------------------------------------
      * Force user to redirect plugin settings page
      *----------------------------------------------------------------
      *
      * This function check where is the redirect location
      *
      * This table is used for like option. 
      * wp_safe_redirect() method @return redirect $page
      * @param null
      * @var void
      * @return redirect $page
      *
      */

    public function codechief_redirect_after_installation()
    {

    if ( get_option( 'codechief_redirect_after_installation', false ) ) {
  
      delete_option( 'codechief_redirect_after_installation' );
      
    /**
      *-----------------------------------------------------------------
      * Redirect codechief page after activationg plugin
      *-----------------------------------------------------------------
      */

      wp_safe_redirect( admin_url( 'options-general.php?page=codechief' ) );

      exit;

      }
    }

    public static function codechief_plugin_activated()
    {  
      
    /**
      *-----------------------------------------------------------------
      * Run this method when plugin is activated
      *-----------------------------------------------------------------
      */

    	flush_rewrite_rules();

    }
    
    /**
      *-----------------------------------------------------------------------
      * Creating plugin custom database table
      *-----------------------------------------------------------------------
      *
      * This function create table for codechief plugin. This is custom table.
      *
      * This table is used for like option. 
      *
      * @param null
      * @var void
      * @return new database table
      *
      */

    public function create_database_table()
    {
    	global $wpdb;

	    $table_name = $wpdb->prefix . "codechief_like";
	    $charset_collate = $wpdb->get_charset_collate();

	    $sql = "CREATE TABLE IF NOT EXISTS $table_name (
	      id mediumint(9) NOT NULL AUTO_INCREMENT,
	      post_id mediumint(9) NOT NULL,
	      value mediumint(9) NOT NULL,
	      ip varchar(55) NOT NULL,
	      PRIMARY KEY  (id)
	    ) $charset_collate;";

	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    dbDelta($sql);
    }
}
