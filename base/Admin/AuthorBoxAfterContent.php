<?php 

/**
 * @package codechief
 */

namespace Base\Admin;
 
class AuthorBoxAfterContent
{
    
    public function __construct()
    {  

      /**
       *-------------------------------------------------------------------
       * Run this hook When the class is instantiate
       *-------------------------------------------------------------------
       */

        $box_options = get_option('codechief_profile');

        $check = $box_options['codechief_box_checkbox'];
        
      /**
        * @var $check
        * @return checking whether the profile box is activated or not.
        */

        if( $check == 1)
        add_action( 
         'the_content', 
          array(AuthorBoxAfterContent::class,'codechief_author_info_box' )
        );
    }

    public function codechief_author_info_box($content)
    {
     
     global $post;
  
     if ( is_single() && isset( $post->post_author ) ) {
  
     $display_name = get_the_author_meta( 'display_name', $post->post_author );
  
     if ( empty( $display_name ) )
     $display_name = get_the_author_meta( 'nickname', $post->post_author );
 
     $user_description = get_the_author_meta( 'user_description', $post->post_author );
  
     $user_website = get_the_author_meta('url', $post->post_author);
  
     $user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
   
     if ( ! empty( $display_name ) )
  
     $author_details = '<p class="author_name">About ' . $display_name . '</p>';
  
     if ( ! empty( $user_description ) )

  
     $author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';
  
     $author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';  
  

     if ( ! empty( $user_website ) ) {
  

     $author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';
  
     } else { 

     $author_details .= '</p>';

     }
  
    $content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';

    }
            
      return $content;
    }
}
