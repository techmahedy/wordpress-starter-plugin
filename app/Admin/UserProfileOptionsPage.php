<?php

/**
 * @package WordPress
 * @subpackage codechief
 * @version 1.0.0
 */

namespace App\Admin;

class UserProfileOptionsPage
{   
	public $settings;

    public function __construct()
    {
    	add_action( 
            'admin_init', 
            array($this,'codechief_user_profile_options' )
        );

    	$this->settings = get_option('codechief_profile');
    }

    public function codechief_user_profile_options($value='')
    {
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
            'codechief_profile', 
            'codechief_profile',
            array($this,'codechief_profile_validate_settings')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
            'codechief_section', 
            __('General Settings','codechief'), 
            array($this,'codechief_section_profile'), 
            'codechief_profile_page' 
        );

        /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'codechief_widget_checkbox', 
            __('Activate profile widget','codechief'), 
            array($this,'codechief_widget_checkbox_callback'), 
            'codechief_profile_page', 
            'codechief_section' 
        );

        add_settings_field( 
            'codechief_box_checkbox', 
            __('Activate profile box after post','codechief'), 
            array($this,'codechief_box_checkbox_callback'), 
            'codechief_profile_page', 
            'codechief_section' 
        );
    }

    public function codechief_section_profile(){}

    public function codechief_profile_validate_settings($settings)
    {
    	return $settings;
    }

    public function codechief_widget_checkbox_callback()
    {
       $val = isset( $this->settings['codechief_widget_checkbox'] ) == 1 
                ? 'checked' : '';

       echo '<input 
                type="checkbox" 
                name="codechief_profile[codechief_widget_checkbox]" 
                value="1" '.$val.' />';
    }

    public function codechief_box_checkbox_callback()
    {
       $val = isset( $this->settings['codechief_box_checkbox'] ) == 1 
                ? 'checked' : '';

       echo '<input 
              type="checkbox" 
              name="codechief_profile[codechief_box_checkbox]" 
              value="1" '.$val.' />';
    }
}
