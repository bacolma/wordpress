<?php
/**
 * @package BuddyBoss Theme Child
 * The parent theme functions are located at /buddyboss-theme/inc/theme/functions.php
 * Add your own functions at the bottom of this file.
 */


/****************************** THEME SETUP ******************************/

/**
 * Sets up theme for translation
 *
 * @since BuddyBoss Theme Child 1.0.0
 */
function buddyboss_theme_child_languages()
{
  /**
   * Makes child theme available for translation.
   * Translations can be added into the /languages/ directory.
   */

  // Translate text from the PARENT theme.
  load_theme_textdomain( 'buddyboss-theme', get_stylesheet_directory() . '/languages' );

  // Translate text from the CHILD theme only.
  // Change 'buddyboss-theme' instances in all child theme files to 'buddyboss-theme-child'.
  // load_theme_textdomain( 'buddyboss-theme-child', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'buddyboss_theme_child_languages' );

/**
 * Enqueues scripts and styles for child theme front-end.
 *
 * @since Boss Child Theme  1.0.0
 */
function buddyboss_theme_child_scripts_styles()
{
  /**
   * Scripts and Styles loaded by the parent theme can be unloaded if needed
   * using wp_deregister_script or wp_deregister_style.
   *
   * See the WordPress Codex for more information about those functions:
   * http://codex.wordpress.org/Function_Reference/wp_deregister_script
   * http://codex.wordpress.org/Function_Reference/wp_deregister_style
   **/

  // Styles
  wp_enqueue_style( 'buddyboss-child-css2', get_stylesheet_directory_uri().'/assets/public/dist/css/style.css', '', '1.0.0' );

  // Javascript
  // wp_enqueue_script( 'buddyboss-child-js', get_stylesheet_directory_uri().'/assets/js/custom.js', '', '1.0.0' );

  // Remove password
  $dataUser = wp_get_current_user();
  if (isset($dataUser->data->user_pass)) {
    unset($dataUser->data->user_pass);
    unset($dataUser->data->user_activation_key);
    unset($dataUser->data->user_registered);
  }

  wp_localize_script( 'jquery', 'jsVars', [
    'ajax_url'    => admin_url( 'admin-ajax.php' ),
    'api_rest_url'=> get_rest_url(),
    'wp_timezone' => wp_timezone(),
    'wp_user'     => $dataUser,
    'wp_nonce'    => wp_create_nonce( 'wp_rest' ),
    'wp_lang'     => get_locale()
  ]);
}
add_action( 'wp_enqueue_scripts', 'buddyboss_theme_child_scripts_styles', 9999 );

// Enable default comments for all post
function default_comments_on( $data ) {
    if( $data['post_type'] == \RampJournal\Core\ArtGalleryCustomPost::$cpName ) {
        $data['comment_status'] = 'open';
    }

    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_on' );
