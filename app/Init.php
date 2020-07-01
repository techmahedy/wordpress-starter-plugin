<?php

/**
 * @package  codechief
 */

namespace App;

final class Init
{   

	/**
	 * Store all the classes inside an array
	 * @return array Full list of classes
	 */
	public static function codechief_get_class() 
	{
		return [
			Base\LoadFrontendAndAdminScript::class,
			Plugin\PluginActivated::class,
			Plugin\PluginDeActivated::class,
			Admin\AllOptionsPageForm::class,
			Admin\LikeButtonSettingPage::class,
			Plugin\PluginSettingsLinkButton::class,
			Admin\ShowLikeButtonAfterPostPage::class,
			Admin\UserRoleAndCapabilitiesPage::class,
			Admin\AddNewUserRolesAndPermission::class,
			Ajax\AjaxServiceProvider::class,
			Admin\SendMailToAuthorAfterPublishPost::class,
			Admin\SendEmailToAuthorPage::class,
			Admin\UserProfileOptionsPage::class,
			Admin\AuthorBoxAfterContent::class,
			Admin\DisableUpdateSettingsPage::class,
		];
	}

	/**
	 * Loop through the classes, initialize them, 
	 * and call the register() method if it exists
	 * @return
	 */
	public static function codechief_services_loaded() 
	{
		foreach ( self::codechief_get_class() as $class ) {
			$service = self::codechief_class_instantiate( $class );
			if ( method_exists( $service, '__construct' ) ) {
				$service->__construct();
			}
		}
	}

	/**
	 * Initialize the class
	 * @param  class $class    class from the services array
	 * @return class instance  new instance of the class
	 */
	private static function codechief_class_instantiate( $class )
	{
		$instance = new $class();

		return $instance;
	}
}