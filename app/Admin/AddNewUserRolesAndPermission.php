<?php 

/**
 * @package codechief
 */

namespace App\Admin;

class AddNewUserRolesAndPermission 
{   
    

    public function __construct() 
    {

    /**
      *--------------------------------------------------------------------
      * Run this hook When the class is instantiate
      *--------------------------------------------------------------------
      */

	    add_action(
        'admin_menu',
        array($this,'codechief_save_role')
      );

	  }
     
    public function codechief_save_role()
    { 

       $codechief_uac = get_option('codechief_roles');

       $read = $codechief_uac['codechief_role_is_read'] == 1 ? "true" : 'false';
       $edit = $codechief_uac['codechief_role_can_edit'] == 1 ? "true" : 'false';
       $delete = $codechief_uac['codechief_role_can_delete'] == 1 ? "true" : 'false';
       $options = $codechief_uac['codechief_role_manage_options'] == 1 ? "true" : 'false';


      /**
        *------------------------------------------------------------------
        * Creating user roles and capabilities
        *------------------------------------------------------------------
        *
        * This function takes a capability which will be used to determine whether or not a page is included in the menu.
        *
        * The function which is hooked in to handle the output of the page must check that the user has the required capability as well. 
        *
        * @param $role_name, $role_display_name, $capability
        *
        */

      add_role(
        $codechief_uac['codechief_role_name'],
        __( $codechief_uac['codechief_role_display_name'] ),
        array(
        'read'           => $read,  
        'edit_posts'     => $edit,
        'delete_posts'   => $delete, 
        'manage_options' => $options
        ) );
      
    }
}

     
  