<?php 

/**
 * @package codechief
 */

namespace App\Admin\Pages;

class StarRating
{
	public function __construct()
	{
	  add_filter( 
        "the_content", 
        array( $this,"show_star_rating_icon_after_content") 
      );
	}

  /** 
    * Create star rating option with jQuery library
    * @param $content
    * @return $content
    */

	public function show_star_rating_icon_after_content( $content )
	{  

	    if (is_single()) {  

         

        }

        return $content;
	}
    
}
