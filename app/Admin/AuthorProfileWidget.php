<?php

/**
 * @package codechief
 */

error_reporting(0);

$codechief_profile = get_option('codechief_profile');

$check = $codechief_profile['codechief_widget_checkbox'];

if ( $check != 1 ) 
 {
    return;
 }
 else
 {
    goto run_below_code;
 }

run_below_code:

class AuthorProfileWidget extends WP_Widget {

    function __construct(){
        $params = array(
           'description' => __('A simple author profile box','codechief'),
           'name' => __('CodeChief: Author Box','codechief')
        );

        parent::__construct('CodeChief','',$params ); 

        add_action( 'admin_init',array($this,'codechief_script_loaded'));
    }
    
    public function codechief_script_loaded() {

        wp_enqueue_media();
        wp_enqueue_script( 'custom-js');
        wp_enqueue_script( 'custom-js', PLUGIN_URL .'assets/custom.js', array( 'wp-color-picker' ), false, true );
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
                <img src="<?php echo isset($link) ? esc_url($link) : ''; ?>" alt="">
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

        <?php
    }

    public function widget($args, $instance)
    {  

       extract($args);
       extract($instance);

       $title = apply_filters('widgets_title',$title);
       $description = apply_filters('widgets_description',$description);

       echo $before_widget;
         echo $before_title . $title . $after_title; ?>
        <img src="<?php echo $link; ?>" alt="<?php echo $title; ?>" class="codechief_author_image">
         <?php echo "<p>$description</p>";
       echo $after_widget;


        echo '<style type="text/css">
        img.codechief_author_image{
              width: ' . $width . 'px !important;
              height: ' . $height . 'px !important;
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