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
require_once 'setup/remove-admin-menu-items.php';

$setup = new FWD_Setup;

// Registers page templates for the theme
$templates = array(

);
$setup->register_page_templates( $templates );

var_dump( $setup );
