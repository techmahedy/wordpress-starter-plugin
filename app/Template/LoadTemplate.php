<?php 

/**
 * @package  Keenshot Companion
 */

namespace App\Template;

class LoadTemplate 
{
	
    public $templates;

	public function __construct()
	{  

		$box_options = get_option('codechief_auto_update');

        $check_template = $box_options['load_contact_page_template'];
        
	  /**
		* lOAD ALL THE CUSTOM PAGE TEMPLATE
		*
		* @return array list of page template
		*/

		$this->templates = array(
			'Pages/contact.php' => 'CodeChief Contact',
			'Pages/guest-post.php' => 'Guest Post',
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
		  add_filter( 'theme_page_templates', array( $this, 'codechief_custom_template' ) );
		  add_filter( 'template_include', array( $this, 'codechief_load_template' ) );
		  add_shortcode('codechief_contact', array($this,'codechief_contact_page' ) );
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
	   return \App\Pages\Contact::LoadContactPageMarcup();
	}
}