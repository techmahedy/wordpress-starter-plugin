<?php 

/**
 * @package codechief
 */

namespace Base\Plugin;

class PluginSettingsLinkButton
{   

    public function __construct()
    { 

    /**
      *--------------------------------------------------------------------
      * Run this method when plugin is activated
      *--------------------------------------------------------------------
      */
        add_filter(
          'plugin_action_links_' . CODECHIEF_PLUGIN_BASENAME, 
          array($this,'add_plugin_page_settings_link')
        );
    }
    
    /**
      *-------------------------------------------------------------------
      * Creating plugin settings link button
      *-------------------------------------------------------------------
      *
      * This function will create plugin settings link button after activating plugin. After clicking this setting button user can visit plugin setting page and can handle all the plugin options.
      * 
      *
      * @param null
      * @var void
      * @return $links
      *
      */
    public function add_plugin_page_settings_link($links)
    {
    	$links[] = '<a href="' .
        admin_url('options-general.php?page=codechief') .
        '">' . esc_html('Settings', 'codechief') . '</a>';
        return $links;
    }
}
