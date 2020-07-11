<?php 

/**
 * @package codechief
 */

namespace App\Admin;

class AllOptionsPageForm
{   

    public function __construct() {

    /**
      *-------------------------------------------------------------------
      * Run this hook When the class is instantiate
      *-------------------------------------------------------------------
      */

	    add_action(
        'admin_menu',
        array($this,'add_menu_page')
      );

	  }
     
    public function add_menu_page()
    { 
    /**
      *-------------------------------------------------------------------
      * Creating plugin options page
      *-------------------------------------------------------------------
      *
      * This function takes a capability which will be used to determine whether or not a page is included in the menu.
      *
      * The function which is hooked in to handle the output of the page must check that the user has the required capability as well. 
      *
      * @param $page_title, $menu_title, $capability, $menu_slug, $function and a optional $position
      *
      */

	    add_options_page(
        __( 'CodeChief', 'codechief' ),
        __( 'CodeChief', 'codechief' ),
        'administrator',
        'codechief',
        array(
            $this,
            'settings_page'
        )
	   );
    }

    /**
     * @param null
     * @return options page form to save data
     * @var void
     */
    
    public function settings_page()
    { 
      ?>
  
	     <div class="wrap">
        <h1><?php echo esc_html('Manage plugin settings and options page!','codechief') ?></h1>
 
        <ul class="nav nav-tabs">

          <li class="active"><a href="#tab-1"><?php echo esc_html('Like Settings','codechief') ?></a></li>
          <li><a href="#tab-2"><?php echo esc_html('Roles & Permissions Setting','codechief') ?></a></li>
          <li><a href="#tab-3"><?php echo esc_html('Email Settings','codechief') ?></a></li>
          <li><a href="#tab-4"><?php echo esc_html('Profile Settings','codechief') ?></a></li>
          <li><a href="#tab-5"><?php echo esc_html('Others Settings','codechief') ?></a></li>
          <li><a href="#tab-6"><?php echo esc_html('Contact Form Settings','codechief') ?></a></li>
          <li><a href="#tab-7"><?php echo esc_html('About','codechief') ?></a></li>

        </ul>

        <div class="tab-content">
          <div id="tab-1" class="tab-pane active">

           <form action="options.php" method="post">
               
          <?php
                  
                /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

              settings_fields( 'codecheif_options' );

                /**
                  * @param do_settings_sections( string $page )
                  */

              do_settings_sections( 'codechief' );

              submit_button();
          ?>

               
           </form>
              
            </div>

            <div id="tab-2" class="tab-pane">
             <form action="options.php" method="post">
              <?php
                
                 /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

                  settings_fields( 'codechief_roles' );


                /**
                  * @param do_settings_sections( string $page )
                  */

                  do_settings_sections( 'codechief_roles_page' );

                  submit_button();
              ?>
             </form>
            </div>

            <div id="tab-3" class="tab-pane">
              <?php echo esc_html("If you checked this checkbox then when a guest author or admin or any user create a new post, an email with this current post permalink is sent to post author!" ,"codechief") ?>
              <form action="options.php" method="post">
              <?php
            
                /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

                  settings_fields( 'codecheif_email_options' );

                /**
                  * @param do_settings_sections( string $page )
                  */

                  do_settings_sections( 'codechief_email_page' );

                  submit_button();
              ?>
             </form>
            </div>

            <div id="tab-4" class="tab-pane">
              <?php echo esc_html("Choose which options do you want to show your website!" ,"codechief") ?>
              <form action="options.php" method="post">
              <?php
            
                /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

                  settings_fields( 'codechief_profile' );

                /**
                  * @param do_settings_sections( string $page )
                  */

                  do_settings_sections( 'codechief_profile_page' );
                  
                  submit_button();
              ?>
             </form>
            </div>

             <div id="tab-5" class="tab-pane">
              <?php echo esc_html("Choose which options do you want to activate!" ,"codechief") ?>
              <form action="options.php" method="post">
              <?php
            
                /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

                  settings_fields( 'codechief_auto_update' );

                /**
                  * @param do_settings_sections( string $page )
                  */

                  do_settings_sections( 'codechief_plugin_update_page' );
                  
                  submit_button();
              ?>
             </form>
            </div>


             <div id="tab-6" class="tab-pane">
               <h1 style="font-family:bold;"><?php echo esc_html('CodeChief contact form settings info', 'codechief'); ?></h1>
                <h2><?php echo esc_html('Shortcode:', 'codechief') ?> <?php echo esc_attr('[codechief_contact]', 'garuda-keen-rating'); ?></h2>
                <p><?php echo esc_html('Use this shortcode to display this rating plugin. You can display any where. Just use this shortcode.', 'codechief'); ?></p>
               <P><?php echo esc_html("To show this contact form just use this shortcode [codechief_contact] and paste it into your contact page. You can choose also codechief plugin contact page template from template box. " ,"codechief") ?></P>
              <form action="options.php" method="post">
              <?php
            
                /** 
                  * A settings group name. This should match the group name used in register_setting().
                  *
                  * @param settings_fields( string $option_group )
                  */

                  settings_fields( 'codecheif_contact' );

                /**
                  * @param do_settings_sections( string $page )
                  */

                  do_settings_sections( 'codechief_contact_page' );
                  
                  submit_button();
              ?>
             </form>
            </div>

            <div id="tab-7" class="tab-pane">

              <h1 style="font-family:bold;"><?php echo esc_html('About this plugin', 'codechief'); ?></h1>
              <p><?php echo esc_html('If you find any issues of this plugin, please contact with me.', 'codechief'); ?></p>
              <P><?php echo esc_html("To contact with me, visit" ,"codechief") ?><a href="https://www.codechief.org/contact-us"> <?php echo esc_html('Contact','codechief'); ?></a></P>
        
            </div>

          </div>
        </div>
    
     <?php
    }
}

     
  