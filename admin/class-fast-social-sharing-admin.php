<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/admin
 * @author     Your Name <email@example.com>
 */

class FastSocialSharingAdmin
{
  public function addAdminPage()
  {
    add_menu_page( 'Fast Social Sharing Page', 'Fast Social Sharing', 'manage_options', 'fast-social-sharing', array( $this, 'displayAdminPage') );
  }

  public function displayAdminPage(){
    echo "<h1>Hello World!</h1>";
  }

  public function run()
  {
    //$this->addAdminPage();
    add_action('admin_menu', array( $this, 'addAdminPage'));
  }
}
