<?php

/**
 * @package codechief
 */

namespace App\Admin;

class DisableUpdateSettingsPage 
{
    public $settings;
    
    public function __construct()
    {  

    add_action(
      'admin_init',
       array($this,'codechief_manage_auto_update')
    );

      /** 
        * Retrieves an option value based on an option name.
        *
        * @param get_option( string $option, mixed $default = false )
        */

       $this->settings = get_option('codechief_auto_update');
       
    }

    public function codechief_manage_auto_update(){
        
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
            'codechief_auto_update', 
            'codechief_auto_update',
            array($this,'codechief_auto_update_callback')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
            'codechief_section', 
            __('General Settings','codechief'), 
            array($this,'codechief_plugin_update_section_callback'), 
            'codechief_plugin_update_page' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'plugin_update_check', 
            __('Disable automatic WordPress plugin updates','codechief'), 
            array($this,'codechief_plugin_update_checkbox'), 
            'codechief_plugin_update_page', 
            'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'theme_update_check', 
            __('Disable automatic WordPress theme updates','codechief'), 
            array($this,'codechief_theme_update_checkbox'), 
            'codechief_plugin_update_page', 
            'codechief_section' 
        );


      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'comments_disable', 
            __('Disable WordPress default theme comments system','codechief'), 
            array($this,'codechief_comments_disable'), 
            'codechief_plugin_update_page', 
            'codechief_section' 
        );
    }
    
    
    //All callback function
    public function codechief_auto_update_callback($settings){

       return $settings;

    }

    public function codechief_plugin_update_section_callback(){}

    public function codechief_plugin_update_checkbox()
    {
       $val = isset( $this->settings['plugin_update_check'] ) == 1 
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_auto_update[plugin_update_check]" 
               value="1" '.$val.' />';
   
    }

    public function codechief_theme_update_checkbox()
    {
       $val = isset( $this->settings['theme_update_check'] ) == 1 
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_auto_update[theme_update_check]" 
               value="1" '.$val.' />';
    }

    public function codechief_comments_disable()
    {
       $val = isset( $this->settings['comments_disable'] ) == 1 
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_auto_update[comments_disable]" 
               value="1" '.$val.' />';
    }



}
