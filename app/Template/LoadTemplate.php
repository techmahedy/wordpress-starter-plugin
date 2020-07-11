<?php 

/**
 * @package  Keenshot Companion
 */

namespace App\Template;

use App\Pages\Contact;
use App\Pages\GuestPost;

class LoadTemplate 
{
	
  public $templates;

	public function __construct()
	{  

		$box_options = get_option('codechief_auto_update');

    $check_template = $box_options['load_contact_page_template'];

    $guest_post = $box_options['guest_post'];
        
	  /**
		* lOAD ALL THE CUSTOM PAGE TEMPLATE
		*
		* @return array list of page template
		*/

		$this->templates = array(
			'Pages/contact.php' => __('CodeChief Contact','codechief'),
			'Pages/guestpost.php' => __('CodeChief Guest Post','codechief'),
		);
        

    /**
      *-----------------------------------------------------------------------
      * Loading plugin custom page template
      *-----------------------------------------------------------------------
      *
      * @param $check_template check whether the template is activated or not
      *
      *
      * @param $check_template
      * @var void
      * @return activated template
      *
      */

    if( $check_template == 1 )
		{
		  add_filter( 'theme_page_templates', array( $this, 'codechief_custom_template' ));
		  add_filter( 'template_include', array( $this, 'codechief_load_template' ) );
		  add_shortcode('codechief_contact', array($this,'codechief_contact_page' ) );
      add_shortcode('codechief_guestpost', array($this,'codechief_contact_page' ) );
		}

    /**
      *-----------------------------------------------------------------------
      * Checking guest post active or not. If active then load it
      *-----------------------------------------------------------------------
      *
      * @param $guest_post check whether the template is activated or not
      *
      *
      * @param $guest_post
      * @var void
      * @return activated template
      *
      */

    if( $guest_post == 1 )
		{
		  add_shortcode('codechief_guestpost', array($this,'codechief_guest_post_page' ) );
		}
		
	}

	public function codechief_custom_template( $templates )
	{
		$templates = array_merge( $templates, $this->templates );

		return $templates;
	}

	public function codechief_load_template( $template )
	{
		global $post;

		if ( ! $post ) {
			return $template;
		}
    
		$template_name = get_post_meta( $post->ID, '_wp_page_template', true );

		if ( ! isset( $this->templates[$template_name] ) ) {
			return $template;
		}
		$file = $this->plugin_path . $template_name;

		if ( file_exists( $file ) ) {
			return $file;
		}

		return $template;
	}

    /**
      *-----------------------------------------------------------------------
      * Loading contact page template after calling shortcode
      *-----------------------------------------------------------------------
      *
      *
      *
      * @param $check_template
      * @var void
      * @return contact page
      *
      */


	public function codechief_contact_page()
	{
	   return Contact::codechief_contact_page_markup();
	}

    /**
      *-----------------------------------------------------------------------
      * Loading guest post page template after calling shortcode
      *-----------------------------------------------------------------------
      *
      *
      *
      * @param $check_template
      * @var void
      * @return contact page
      *
      */
	public function codechief_guest_post_page()
	{
		return GuestPost::codechief_guestpost_markup();
	}
}