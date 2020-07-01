<?php

/**
 * @package codechief
 */

namespace App\Admin;

class UserRoleAndCapabilitiesPage
{

    public $settings;
    
    public function __construct()
    {  

     add_action( 
      'admin_init', 
      array($this,'codechief_add_new_user_role_permissions' )
    );

      /** 
        * Retrieves an option value based on an option name.
        *
        * @param get_option( string $option, mixed $default = false )
        */

       $this->settings = get_option('codechief_roles');
       
    }

    public function codechief_add_new_user_role_permissions(){
        
      /** 
        * Registers a setting and its data.
        *
        * @param $option_group, $option_name, array $args = array() 
        */

        register_setting(
          'codechief_roles', 
          'codechief_roles',
          array($this,'codechief_options_validate_settings')
        );

      /** 
        * Add a new section to a settings page.
        *
        * @param $id, $title, $callback, $page 
        */

        add_settings_section( 
          'codechief_section', 
          __('General Settings','codechief'), 
          array($this,'codechief_section_role'), 
          'codechief_roles_page' 
        );

        /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_name', 
          __('Enter new role name','codechief'), 
          array($this,'codechief_roles_name'), 
          'codechief_roles_page', 'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_display_name', 
           __('Enter role display name','codechief'),
          array($this,'codechief_role_display_name'), 
          'codechief_roles_page', 
          'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_is_read', 
          __('User can read post ? ','codechief'),
          array($this,'codechief_role_is_read'), 
          'codechief_roles_page', 
          'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_can_edit', 
          __('User can edit post ? ','codechief'), 
          array($this,'codechief_role_can_edit'), 
          'codechief_roles_page', 
          'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_can_delete', 
         __('User can delete post ? ','codechief'), 
          array($this,'codechief_role_can_delete'), 
          'codechief_roles_page', 
          'codechief_section' 
        );

      /** 
        * Add a new field to a section of a settings page.
        *
        * @param $id, $title, $callback, $page, $section 
        */

        add_settings_field( 
          'codechief_role_manage_options', 
          __('User can manage options ? ','codechief'), 
          array($this,'codechief_role_manage_options'), 
          'codechief_roles_page', 
          'codechief_section' 
        );

    }
    
    
    //All callback function
    
    public function codechief_options_validate_settings($settings){

       return $settings;

    }

    public function codechief_section_role(){}

    public function codechief_roles_name(){
      echo "<input 
              name='codechief_roles[codechief_role_name]' 
              type='text' 
              value='{$this->settings['codechief_role_name']}' />";
    }

    public function codechief_role_display_name(){
      echo "<input 
            name='codechief_roles[codechief_role_display_name]' 
            type='text' 
            value='{$this->settings['codechief_role_display_name']}' />";
    }

    public function codechief_role_is_read()
    {
       $val = isset( $this->settings['codechief_role_is_read'] ) == 1 
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_roles[codechief_role_is_read]"" 
               value="1" '.$val.' />';
   
    }

    public function codechief_role_can_edit()
    {
       $val = isset( $this->settings['codechief_role_can_edit'] ) == 1
                ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_roles[codechief_role_can_edit]"" 
               value="1" '.$val.' />';
   
    }

    public function codechief_role_can_delete()
    {
       $val = isset( $this->settings['codechief_role_can_delete'] ) == 1 
               ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_roles[codechief_role_can_delete]" 
               value="1" '.$val.' />';
   
    }

    public function codechief_role_manage_options()
    {
       $val = isset( $this->settings['codechief_role_manage_options'] ) == 1 ? 'checked' : '';

       echo '<input 
               type="checkbox" 
               name="codechief_roles[codechief_role_manage_options]"
               value="1" '.$val.' />';
   
    }


}

