<?php
/**
 * Sets the load and save locations for Advanced Custom Fields field groups
 * 
 * @link https://www.advancedcustomfields.com/resources/local-json/
 */
// Changes the save location for ACF fields
add_filter('acf/settings/save_json', function( $path) {
  $path = constant( 'FWD_ACF_LOCATION' );
  return $path;
});

// Changes the load location for ACF fields
add_filter('acf/settings/load_json', function( $paths ) {
  unset($paths[0]);
  $paths[] = constant( 'FWD_ACF_LOCATION' );
  return $paths;
});
