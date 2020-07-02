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

		$this->templates = array(
			'Pages/contact.php' => 'Contact',
		);

		add_filter( 'theme_page_templates', array( $this, 'codechief_custom_template' ) );
		add_filter( 'template_include', array( $this, 'codechief_load_template' ) );
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
}