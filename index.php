<?php
use FWD_Helper as FWD;
use FWD_Component as Component;

$index = new FWD_Page;

get_header();

$args = array(
  'menu_location' => 'primary_nav',
  'menu_class' => '',
  'menu_id' => 'primary_nav',
  'toggles' => false,
  'toggle_icon' => '&plus;',
  'top_links' => true
);
FWD_Nav::the_menu( $args );

FWD::preload('universal', 'css');
FWD::get_component( 'test', 'test2' );

var_dump( $index );

get_footer();