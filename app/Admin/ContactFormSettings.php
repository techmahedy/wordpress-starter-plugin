<?php

/**
 * @package codechief
 */

namespace App\Admin;

class ContactFormSettings 
{
    public $settings;
    
    public function __construct()
    {  

        add_action(
          'admin_init',
           array($this,'codechief_load_contact_setting_data')
        );

      /** 
        * Retrieves an option value based on an option name.
        *
        * @param get_option( string $option, mixed $default = false )
        */

       $this->settings = get_option('codecheif_contact');
       
    }

    public function codechief_load_contact_setting_data(){
        
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
            'codecheif_contact', 
            'codecheif_contact',
            array($this,'codehcief_return_contact_value')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
            'codechief_section', 
            __('General Settings','codechief'), 
            array($this,'codechief_contact_section_callback'), 
            'codechief_contact_page' 
        );

        /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'codechief_contact_custom_class_name', 
            __('Enter your custom class name, if you want to change this default form design','codechief'), 
            array($this,'codechief_contact_form_class_name'), 
            'codechief_contact_page', 
            'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'codechief_contact_admin_email', 
            __('Enter super admin email to get mail in your email account','codechief'), 
            array($this,'codechief_contact_admin_email'), 
            'codechief_contact_page', 
            'codechief_section' 
        );
    }
    
    
    //All callback function
    public function codehcief_return_contact_value($options){

       return $options;

    }

    public function codechief_contact_section_callback(){}

    public function codechief_contact_form_class_name()
    {
 
      $val = isset( $this->settings['codechief_contact_custom_class_name'] ) 
                ? $this->settings['codechief_contact_custom_class_name'] : 'input100';
       echo '<input 
               type="text" 
               name="codecheif_contact[codechief_contact_custom_class_name]" 
               value="'.$val.'"  />';
   
    }

    public function codechief_contact_admin_email()
    {
       $val = isset( $this->settings['codechief_contact_admin_email'] ) 
                ? $this->settings['codechief_contact_admin_email'] : '';
       echo '<input 
               type="text" 
               name="codecheif_contact[codechief_contact_admin_email]" 
               value="'.$val.'"  />';
    }

}
