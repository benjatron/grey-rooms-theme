<?php
/**
 * FWD Boilerplate
 * 
 * @package FWD\Boilerplate
 * @author  FWD
 * @license GPL-2.0-or-later
 * @link    https://www.designfwd.com/
 */

spl_autoload_register( 'fwd_autoload_register' );


/**
 * Loads vendor files from Composer
 */
require( get_stylesheet_directory( ) .  '/vendor/autoload.php' );


/**
 * Allows FWD classes to be loaded automatically
 */
function fwd_autoload_register( $class ) {

  // Ignore classes without the "FWD" prefix
  if( strpos( $class, 'FWD' ) !== 0 ):
    return null;
  endif;

  // Take the class name and replace the underscores with hyphens
  $file = strtolower( str_replace( '_', '-', $class ) );

  /**
   * Class files are named according to WordPress naming conventions
   * 
   * @see https://make.wordpress.org/core/handbook/best-practices/coding-standards/php/#naming-conventions
   */
  $filename = get_template_directory() . '/app/classes/class-' . $file . '.php';

  if( file_exists( $filename ) ):
    require $filename;
  endif;

  return $filename;
}


/**
 * Theme setup function files
 */
$setup = new FWD_Setup;

// Remove unnecessary admin menus (by default, this includes comments and links)
$setup->remove_admin_menus();

// Show active page template in the admin
$setup->show_active_template();

// Disable WordPress' emojis
$setup->disable_emojis();

// Clean up the_excerpt()
$setup->set_the_excerpt();

// Registers page templates for the theme
$templates = array();
$setup->register_page_templates( $templates );

// Sets image sizes for the theme, in pixel widths
$image_sizes = array(
  128,
  240,
  320,
  375,
  480,
  540,
  640,
  720,
  768,
  800,
  960,
  1024,
  1280,
  1366,
  1440,
  1600,
  1920,
  2560,
  3840
);
$setup->set_image_sizes( $image_sizes );


var_dump( $setup );


// Page Class - set_excerpt_acf method