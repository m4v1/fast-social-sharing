<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/public
 * @author     M4v1 <email@example.com>
 */
class FastSocialSharingPublic {

	/**
	 * Initialize the class and set its properties.
	 */
   public function run()
   {
    	add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
   }

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_register_style( 'fast-social-sharing', plugin_dir_url( __FILE__ ) . 'css/fast-social-sharing-public.css', array(), false, 'all' );
		wp_enqueue_style('fast-social-sharing');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->fast_social_sharing, plugin_dir_url( __FILE__ ) . 'js/fast-social-sharing-public.js', array( 'jquery' ), $this->version, false );

	}

}
