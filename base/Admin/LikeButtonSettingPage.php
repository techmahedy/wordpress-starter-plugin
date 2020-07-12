<?php

/**
 * @package codechief
 */

namespace Base\Admin;

class LikeButtonSettingPage 
{

    public $settings;
    
    public function __construct()
    {  

    /**
      *-------------------------------------------------------------------
      * Run this hook When the class is instantiate
      *-------------------------------------------------------------------
      */

      add_action(
        'admin_init',
        array($this,'codechief_manage_settings_page')
      );

    /** 
      * Retrieves an option value based on an option name.
      *
      * @param get_option( string $option, mixed $default = false )
      */

       $this->settings = get_option('codecheif_options');
       
    }

    public function codechief_manage_settings_page(){
        
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
          'codecheif_options', 
          'codecheif_options',array($this,'codechief_validate_settings')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
          'codechief_section', 
          __('General Settings','codechief'), 
          array($this,'codechief_section_callback'), 'codechief' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'color_picker', 
          __('Select color for thumbs-up icon','codechief'), 
          array($this,'codechief_color_picker'), 'codechief',
           'codechief_section' 
         );

      /** 
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'border_color_check', 
          __('Select button border color','codechief'), 
          array($this,'codechief_border_color_picker'), 'codechief', 
          'codechief_section' 
        );

      /** 
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'bg_color_check', 
          __('Select button background color','codechief'), 
          array($this,'codechief_button_bg_color_picker'), 'codechief', 
          'codechief_section' 
        );

      /** 
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'color_picker_hovar', 
          __('Select hovar background color','codechief'), 
          array($this,'codechief_hovar_color_picker'), 'codechief', 
          'codechief_section' 
        );

      /** 
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'hovar_border_color', 
          __('Select hovar border color','codechief'), 
          array($this,'codechief_hovar_border_color'), 'codechief', 
          'codechief_section' 
        );

      /** 
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'color_check', 
          __('Hide like button','codechief'), 
          array($this,'codechief_hide_color_checkbox'), 'codechief', 
          'codechief_section' 
        );

    }
    
    
    //All callback function
    public function codechief_validate_settings($options){

       return $options;

    }

    public function codechief_section_callback(){}

    public function codechief_color_picker()
    {   

       $val = isset( $this->settings['color_picker'] ) ? 
               $this->settings['color_picker'] : '#ffffff';

       echo '<input 
              type="text" 
              value="'.$val.'" 
              class="my-color-field" 
              data-default-color="#ffffff" 
              name="codecheif_options[color_picker]" />';

    }

    public function codechief_hide_color_checkbox()
    {
       $val = isset( $this->settings['color_check'] ) == 1 ? 
               'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codecheif_options[color_check]"" 
               value="1" '.$val.' />';
   
    }

    public function codechief_hovar_color_picker()
    {   

       $val = isset( $this->settings['color_picker_hovar'] ) 
                ? $this->settings['color_picker_hovar'] : '#0f9d58';
       
       echo '<input 
               type="text" 
               value="'.$val.'" 
               class="my-color-field" 
               data-default-color="#0f9d58" 
               name="codecheif_options[color_picker_hovar]" />';

    }

    public function codechief_border_color_picker()
    {
       $val = isset( $this->settings['border_color_picker'] ) 
               ? $this->settings['border_color_picker'] : '#0f9d58';
       
       echo '<input 
               type="text" 
               value="'.$val.'" 
               class="my-color-field" 
               data-default-color="#0f9d58" 
               name="codecheif_options[border_color_picker]" />';
    }

    public function codechief_button_bg_color_picker()
    {
       $val = isset( $this->settings['bg_color_check'] ) 
               ? $this->settings['bg_color_check'] : '#0f9d58';
       
       echo '<input 
               type="text" 
               value="'.$val.'" 
               class="my-color-field" 
               data-default-color="#0f9d58" 
               name="codecheif_options[bg_color_check]" />';
    }

    public function codechief_hovar_border_color()
    {
       $val = isset( $this->settings['hovar_border_color'] ) 
               ? $this->settings['hovar_border_color'] : '#0f9d58';
       
       echo '<input 
               type="text" 
               value="'.$val.'" 
               class="my-color-field" 
               data-default-color="#0f9d58" 
               name="codecheif_options[hovar_border_color]" />';
    }


}
