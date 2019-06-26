<?php
// Theme assets to load
function fwd_asset_loader()
{

  // Since we're not using Gutenberg blocks, dequeue them
  wp_dequeue_style( 'wp-block-library' );
  wp_dequeue_style( 'wp-block-library-theme' );

  // Push jQuery to footer
  wp_scripts()->add_data( 'jquery', 'group', 1 );
  wp_scripts()->add_data( 'jquery-core', 'group', 1 );
  wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

  // Universal scripts and styles
  wp_register_style('universal', get_stylesheet_directory_uri() . '/resources/styles/dist/universal.css', false, null );
  wp_enqueue_style( 'universal' );

  wp_register_script('universal', get_stylesheet_directory_uri() . '/resources/scripts/dist/universal.js', array('jquery'), null, true );
  wp_enqueue_script( 'universal' );

  $templates = array(

  );
  fwd_register_all( $templates );
}
add_action('wp_enqueue_scripts', 'fwd_asset_loader', 100);

// Load Gravity Forms in footer
add_filter( 'gform_init_scripts_footer', '__return_true' );
