<?php 

namespace Base\Admin;

class ShowLikeButtonAfterPostPage 
{   

    public function __construct() {
     
    $like_button = get_option('codecheif_options');

    $check = $like_button['color_check'];

    if( $check != 1)

	add_filter( 
        "the_content", 
        array( $this,"add_like_button_after_post_content") 
    );

	}
	
  /** 
    * Create like button after single content
    * @param $content
    * @return $content
    */

    public function add_like_button_after_post_content($content)
    {   
    	$options = get_option('codecheif_options');

        $color = $options['color_picker'] ? $options['color_picker'] : "#0f9d58";
        $hovar_color = $options['color_picker_hovar'] ? $options['color_picker_hovar'] : "#0f9d58";
        $background_color = $options['bg_color_check'] ? $options['bg_color_check'] : "#0f9d58";
        $border_color = $options['border_color_picker'] ? $options['border_color_picker'] : "#0f9d58";
        $hovar_border_color = $options['hovar_border_color'] ? $options['hovar_border_color'] : "#0f9d58";

        echo '<style type="text/css">
        i.fa.fa-thumbs-up{
              color: '.$color.' !important;
              background: '.$background_color.' !important;
              border: 2px solid '.$border_color.' !important;
        }
        i.fa.fa-thumbs-up:hover {
            background: '.$hovar_color.'!important;
            border: 2px solid '.$hovar_border_color.' !important;
        }
        </style>';

        if (is_single()) {  

          $content .= '<span class="codechief-like-button"><p class="like-font">Was this article helpful?</p><i class="fa fa-thumbs-up" id="codechief-like" data-id="'.get_the_ID().'" aria-hidden="true"></i> <div id="" class="like-bottom">'.\Base\Ajax\AjaxServiceProvider::codechief_like_ajax_get_request(get_the_ID()).'</div><P id="message"></></span>';
        }

        return $content;
    }
	
}
