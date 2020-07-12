<?php

/**
 * @package codechief
 */

namespace Base\Admin;

class SendEmailToAuthorPage 
{
    public $settings;
    
    public function __construct()
    {  

        add_action(
          'admin_init',
           array($this,'codechief_manage_options_email_page')
        );

      /** 
        * Retrieves an option value based on an option name.
        *
        * @param get_option( string $option, mixed $default = false )
        */

       $this->settings = get_option('codecheif_email_options');
       
    }

    public function codechief_manage_options_email_page(){
        
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
            'codecheif_email_options', 
            'codecheif_email_options',
            array($this,'codehcief_return_options_page_value')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
            'codechief_section', 
            __('General Settings','codechief'), 
            array($this,'codechief_email_section_callback'), 
            'codechief_email_page' 
        );

        /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
            'email_check', 
            __('Activate sending mail to author after publishinhg post','codechief'), 
            array($this,'codechief_email_checkbox'), 
            'codechief_email_page', 
            'codechief_section' 
        );
    }
    
    
    //All callback function
    public function codehcief_return_options_page_value($options){

       return $options;

    }

    public function codechief_email_section_callback(){}

    public function codechief_email_checkbox()
    {
       $val = isset( $this->settings['email_check'] ) == 1 
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codecheif_email_options[email_check]" 
               value="1" '.$val.' />';
   
    }

}
