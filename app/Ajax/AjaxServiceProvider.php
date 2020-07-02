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
       
       $post_id = $_POST['post_id']; 
       $ip = getenv("REMOTE_ADDR");  
       
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
          echo 'thanks for loving this post';
        }
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

      $name = $_POST['name']; 
      $email = $_POST['email']; 
      $subject = $_POST['subject']; 
      $body = $_POST['body']; 

      $message = $body;

      $headers[] = '';
      $to = "mail@codechief.org";

      wp_mail($to , $subject, $message, $headers);
   }
	
}
