<?php
/**
 * FWD Boilerplate
 * 
 * @package FWD\Boilerplate
 * @author  FWD
 * @license GPL-2.0-or-later
 * @link    https://www.designfwd.com/
 */


// Loads vendor files from Composer
require( get_stylesheet_directory( ) .  '/vendor/autoload.php' );


// Autoload functions
spl_autoload_register( 'fwd_autoload_register' );
spl_autoload_register( 'component_autoload_register' );
spl_autoload_register( 'template_autoload_register' );


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
   * Base class files are named according to WordPress naming conventions
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
 * Allows Component classes to be loaded automatically
 */
function component_autoload_register( $class ) {

  // Ignore classes without the "Component" prefix
  if( strpos( $class, 'Component' ) !== 0 ):
    return null;
  endif;

  // Take the class name and replace the underscores with hyphens
  $file = strtolower( str_replace( '_', '-', $class ) );

  $filename = get_template_directory() . '/app/classes/components/' . $file . '.php';

  if( file_exists( $filename ) ):
    require $filename;
  endif;

  return $filename;
}


/**
 * Allows Template classes to be loaded automatically
 */
function template_autoload_register( $class ) {

  // Ignore classes without the "Template" prefix
  if( strpos( $class, 'Template' ) !== 0 ):
    return null;
  endif;

  // Take the class name and replace the underscores with hyphens
  $file = strtolower( str_replace( '_', '-', $class ) );

  $filename = get_template_directory() . '/app/classes/templates/' . $file . '.php';

  if( file_exists( $filename ) ):
    require $filename;
  endif;

  return $filename;
}
