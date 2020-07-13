<?php

/**
 * @package codechief
 */


$codechief_profile = get_option('codechief_profile');

$check = isset($codechief_profile['codechief_widget_checkbox']) ? 
         $codechief_profile['codechief_widget_checkbox'] : '';

if ( $check != 1 ) 
{
  return;
}

class AuthorProfileWidget extends WP_Widget {

    function __construct(){
        $params = array(
          'description' => __('A simple author profile box','codechief'),
          'name' => __('CodeChief: Author Box','codechief')
        );

        parent::__construct('CodeChief','',$params ); 

        add_action( 
          'admin_init',
          array($this,'codechief_script_loaded')
        );
    }
    
    public function codechief_script_loaded() {

        wp_enqueue_media();
        wp_enqueue_script( 'custom-js');
        wp_enqueue_script( 'custom-js', CODECHIEF_PLUGIN_URL .'assets/custom.js', array( 'wp-color-picker' ), false, true );
    }

    public function form($instance){
        extract($instance);
        ?>
        <p>
        <label for=""><?php echo esc_html('Author Name','codechief'); ?></label>
        <input
            class="widefat"
            id="<?php echo $this->get_field_id('title'); ?>"
            name="<?php echo $this->get_field_name('title'); ?>"
            value="<?php echo isset($title) ? esc_attr($title) : ''; ?>" 
          />
        </p>
        
        <p>
            <button class="button button-secondary" id="author_info_image"><?php echo esc_html('Author Image','codechief'); ?></button>
            <input type="hidden" id="<?php echo $this->get_field_id('link'); ?>"  name="<?php echo $this->get_field_name('link'); ?>" class="image_er_link" value="<?php echo isset($link) ? esc_url($link) : ''; ?>"
            />
            <div class="image_show">
                <img src="<?php echo isset($link) ? esc_url($link) : ''; ?>" alt="" width="50" height="50">
            </div>
        </p>

        <p>
        <label for=""><?php echo esc_html('Image width','codechief'); ?></label><br>
        <small><?php echo esc_html('Give image width value in px','codechief'); ?></small>
        <input
            class="widefat"
            type="number"
            id="<?php echo $this->get_field_id('width'); ?>"
            name="<?php echo $this->get_field_name('width'); ?>"
            value="<?php echo isset($width) ? esc_attr($width) : ''; ?>" 
          />
        </p>

        <p>
        <label for=""><?php echo esc_html('Image height','codechief'); ?></label><br>
        <small><?php echo esc_html('Give image height value in px','codechief'); ?></small>
        <input
            class="widefat"
            type="number"
            id="<?php echo $this->get_field_id('height'); ?>"
            name="<?php echo $this->get_field_name('height'); ?>"
            value="<?php echo isset($height) ? esc_attr($height) : ''; ?>" 
          />
        </p>

        <p>
        <label for="<?php echo $this->get_field_id('description'); ?>"><?php echo esc_html('Author Bio','codechief'); ?></label>
        <textarea 
            class="widefat" id="<?php echo $this->get_field_id('description'); ?>" name="<?php echo    $this->get_field_name('description'); ?>"><?php echo isset($description) ? esc_attr($description) : ''; ?>
        </textarea>
        </p>

        <p>
        <label for=""><?php echo esc_html('Facebook profile link','codechief'); ?></label>
        <input
            class="widefat"
            type="text"
            id="<?php echo $this->get_field_id('facebook_link'); ?>"
            name="<?php echo $this->get_field_name('facebook_link'); ?>"
            value="<?php echo isset($facebook_link) ? esc_attr($facebook_link) : '#'; ?>" 
          />
        </p>

        <p>
        <label for=""><?php echo esc_html('Twitter profile link','codechief'); ?></label>
        <input
            class="widefat"
            type="text"
            id="<?php echo $this->get_field_id('twitter_link'); ?>"
            name="<?php echo $this->get_field_name('twitter_link'); ?>"
            value="<?php echo isset($twitter_link) ? esc_attr($twitter_link) : '#'; ?>" 
          />
        </p>
        
        <p>
        <label for=""><?php echo esc_html('Linkedin profile link','codechief'); ?></label>
        <input
            class="widefat"
            type="text"
            id="<?php echo $this->get_field_id('linkedin_link'); ?>"
            name="<?php echo $this->get_field_name('linkedin_link'); ?>"
            value="<?php echo isset($linkedin_link) ? esc_attr($linkedin_link) : '#'; ?>" 
          />
        </p>

        <?php
    }

    public function widget($args, $instance)
    {  

       extract($args);
       extract($instance);

       $title = apply_filters('widgets_title',$title);
       $description = apply_filters('widgets_description',$description);
       
  echo '<div class="profile-sidebar">
        <div class="profile-userpic">
          <img src="'.esc_url($link).'" class="img-responsive codechief_author_image" alt="'.esc_html($title).'">
        </div>
        <div class="profile-usertitle">
          <div class="profile-usertitle-name">
            '.esc_html($title).'
          </div>
          <div class="profile-usertitle-job">
            '.esc_html($description).'
          </div>
        </div>
        <div class="profile-userbuttons">
          <a href="'.esc_url($facebook_link).'" class="codechief_social"><i class="fa fa-facebook"></i></a>
          <a href="'.esc_url($twitter_link).'" class="codechief_social"><i class="fa fa-twitter"></i></a>
          <a href="'.esc_url($linkedin_link).'" class="codechief_social"><i class="fa fa-linkedin"></i></a>
        </div>
      </div>
<br>';
   
        echo '<style type="text/css">
        img.codechief_author_image{
              width: ' . esc_attr($width) . 'px !important;
              height: ' . esc_attr($height) . 'px !important;
        }
        </style>';
    }
}

add_action('widgets_init','codechief_author_box'); 

/**
  *-------------------------------------------------------------------
  * Registering our widget
  *-------------------------------------------------------------------
  */

function codechief_author_box(){

    register_widget('AuthorProfileWidget');

}