<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Fast_Social_Sharing
 * @subpackage Fast_Social_Sharing/includes
 * @author     Your Name <email@example.com>
 */

class FastSocialSharing
{
    // Create widget HTML
    // Call a separate object to manage hooks
    // Call admin area object

    public function displayFastSocialSharing( $content = null )
    {
        global $post;

        // Get current page URL
        $fssURL = urlencode(get_permalink());

        // Get current page title
        $fssTitle = str_replace(' ', '%20', get_the_title());

        // Get Post Thumbnail for pinterest
        //$fssThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        if ( is_page() || is_single() ) {
        	$fssThumbnail = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');
        }
        else {
        	$fssThumbnail[0] = '';
        }

        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/intent/tweet?text='.$fssTitle.'&amp;url='.$fssURL;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$fssURL;
        $googleURL = 'https://plus.google.com/share?url='.$fssURL;
        //$bufferURL = 'https://bufferapp.com/add?url='.$fssURL.'&amp;text='.$fssTitle;
        //$whatsappURL = 'whatsapp://send?text='.$fssTitle . ' ' . $fssURL;
        //$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$fssURL.'&amp;title='.$fssTitle;
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$fssURL.'&amp;media='.$fssThumbnail[0].'&amp;description='.$fssTitle;
        $emailURL = 'mailto:?&subject='.$fssTitle.'&body='.$fssURL;

        // Add sharing button at the end of page/page content
        $content .= '<div class="fss-social">';

        //$content .= '<h5>SHARE ON</h5> <a class="fss-link fss-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
        //$content .= '<a class="fss-link fss-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
        //$content .= '<a class="fss-link fss-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
        //$content .= '<a class="fss-link fss-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
        //$content .= '<a class="fss-link fss-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
        //$content .= '<a class="fss-link fss-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
        //$content .= '<a class="fss-link fss-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';

        $content .= '<h5>SHARE ON</h5><a class="fss-link fss-facebook" href="'.$facebookURL.'" target="_blank"></a>';
        $content .= '<a class="fss-link fss-twitter" href="'. $twitterURL .'" target="_blank"></a>';
        $content .= '<a class="fss-link fss-googleplus" href="'.$googleURL.'" target="_blank"></a>';
        $content .= '<a class="fss-link fss-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank"></a>';
        $content .= '<a class="fss-link fss-email" href="'.$emailURL.'" target="_blank"></a>';
        $content .= '</div>';

        return $content;
    }

    public function fssManageHooks()
    {
      add_shortcode( 'fast-social-sharing', array( $this, 'displayFastSocialSharing') );
    }

    public function fssAdminArea()
    {
      /**
		   * The class responsible for defining all actions that occur in the admin area.
		   */
		  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-fast-social-sharing-admin.php';

      $fssAdmin = new FastSocialSharingAdmin();
      $fssAdmin->run();
    }

    public function fssPublicArea()
    {
      /**
		   * The class responsible for defining all actions that occur in the admin area.
		   */
		  require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-fast-social-sharing-public.php';

      $fssPublic = new FastSocialSharingPublic();
      $fssPublic->run();

    }

    public function run()
    {
      $this->fssAdminArea();
      $this->fssManageHooks();
      $this->fssPublicArea();
    }
}
