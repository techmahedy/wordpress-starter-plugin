<?php 

/**
 * @package codechief
 */

namespace App\Plugin;

class PluginActivated
{   

    public static function codechief_plugin_activated()
    {  
      
    /**
      *--------------------------------------------------------------------
      * Run this method when plugin is activated
      *--------------------------------------------------------------------
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
	      time timestamp DEFAULT '0000-00-00 00:00:00' NOT NULL,
	      post_id mediumint(9) NOT NULL,
	      value mediumint(9) NOT NULL,
	      ip varchar(55) NOT NULL,
	      PRIMARY KEY  (id)
	    ) $charset_collate;";

	    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	    dbDelta($sql);
    }
}
