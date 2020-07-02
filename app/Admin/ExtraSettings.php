<?php

/**
 * @package codechief
 */

namespace App\Admin;

class ExtraSettings 
{
    
    public function __construct()
    {  

     /**
       *-------------------------------------------------------------------
       * Run this hook When the class is instantiate
       *-------------------------------------------------------------------
       */

        $box_options = get_option('codechief_auto_update');

        $check_plugin = $box_options['plugin_update_check'];

        $check_theme = $box_options['theme_update_check'];

        $check_comments = $box_options['comments_disable'];
        
      /**
        * @var $check_plugin
        * @return checking whether the plugin auto update is activated or not.
        */

        if( $check_plugin == 1)
        {

         add_filter( 'auto_update_plugin', '__return_false' );
       
        }

      /**
        * @var $check_theme
        * @return checking whether the theme auto update is activated or not.
        */

        if( $check_theme == 1)
        {

         add_filter( 'auto_update_theme', '__return_false' );
       
        }

     
      /**
        * @var $check_theme
        * @return checking whether the theme auto update is activated or not.
        */

        if( $check_comments == 1)
        {

       /**
         *-------------------------------------------------------------------
         * Hiding comment box and all exixting comments and comment menu
         *-------------------------------------------------------------------
         */

         add_filter( 'comments_open', '__return_false', 10 , 2 );
         add_filter('pings_open', '__return_false', 20, 2 );

       /**
         * Hiding existing comments
         */
       
         add_filter('comments_array', '__return_empty_array', 10, 2 );

      /**
        * @var void
        * @return checking whether the comment options is activated or not. If not then hiding comments menu from admin panel
        */

         add_action('admin_menu', array( $this,'codechief_remove_comment_menu_from_admin_panel') );
       
        }

      }

      public function codechief_remove_comment_menu_from_admin_panel()
      {
         remove_menu_page('edit-comments.php');
      }

}
