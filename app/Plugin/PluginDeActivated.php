<?php 

/**
 * @package codechief
 */

namespace App\Plugin;

class PluginDeActivated
{
    public static function codechief_plugin_deactivated()
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
      * Deleteing plugin custom database table
      *-----------------------------------------------------------------------
      *
      * This function delete table for codechief plugin.
      *
      * This table is used for like option. 
      *
      * @param null
      * @var void
      * @return delete database table
      *
      */

    public function delete_database_table()
    {
    	global $wpdb;
  		$sql = "DROP TABLE IF EXISTS wp_codechief_like";
  		$wpdb->query($sql);
  		delete_option("my_plugin_db_version");
    }
}
