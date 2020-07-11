<?php 

  /** 
    * A simple starter plugin for bloggers
    * @package codechief
    * @version 1.0.0
    */

namespace App\Ajax;

class AjaxServiceProvider
{   

    public function __construct() {
        
        add_action(
          'wp_ajax_codechief_like_ajax_post_request',
          array($this,'codechief_like_ajax_post_request')
        );

        add_action(
          'wp_ajax_nopriv_codechief_like_ajax_post_request',
          array($this,'codechief_like_ajax_post_request')
        );

        add_action(
          'wp_ajax_codechief_submit_contact_form_request',
          array($this,'codechief_submit_contact_form_request')
        );

        add_action(
          'wp_ajax_nopriv_codechief_submit_contact_form_request',
          array($this,'codechief_submit_contact_form_request')
        );

	  }
	
  /** 
    * save data to database after sending ajax request
    * @param $content
    * @return $content
    */

    public function codechief_like_ajax_post_request()
    {

      global $wpdb;

      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      $table_name = $wpdb->prefix . "codechief_like"; 
       
      $post_id = sanitize_text_field(wp_unslash($_POST['post_id'])); 
      $ip = $_SERVER['REMOTE_ADDR']; 
       
      $check_user_like = $wpdb->get_var("SELECT COUNT(*) FROM $table_name WHERE (post_id = '".$post_id."' AND ip = '". $ip ."')");

      if($check_user_like != true) {
       if(isset($post_id) && isset($ip)){
       
        $wpdb->insert(
            ''.$table_name.'',
              array(
                'post_id' => $post_id,
                'value' => 1,
                'ip' => $ip
              ),
              array(
                  '%d',
                  '%d',
                  '%f'
              )
          );
    
        if($wpdb->insert_id) 
        {
          echo esc_html('thanks for loving this post','codechief');
        }
     }
   }
   else
   {
    echo esc_html('You already like this post','codechief');
   }

    wp_die();

   }

   public static function codechief_like_ajax_get_request($id)
   {
       global $wpdb;

       require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
       $table_name = $wpdb->prefix . "codechief_like"; 

       $post_id = $id;

       if( isset( $post_id ) )
       {

       $count = $wpdb->get_results( "SELECT * FROM $table_name WHERE post_id = $post_id");

       $row = count( $count );

       return $row;

       }
   }
   
  /**
   * Sending contact form mail
   */
  
   public function codechief_submit_contact_form_request()
   {
      
     /**
      *---------------------------------------------------------------
      * get contact form options page data
      *---------------------------------------------------------------
      */

      $box_options = get_option('codecheif_contact');

      $admin_email = $box_options['codechief_contact_admin_email'];

      $name    = sanitize_text_field($_POST['name']); 
      $email   = sanitize_text_field($_POST['email']); 
      $subject = sanitize_text_field($_POST['subject']); 
      $body    = sanitize_text_field($_POST['body']); 

      $headers[] = '';
      $to = $admin_email;

      wp_mail($to , $subject, $body, $headers);
   }
	
}
