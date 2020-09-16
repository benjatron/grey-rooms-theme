<?php
/**
 * Universal header content
 */
use FWD_Helper as FWD;

// WordPress head() function
wp_head();

$meta = get_field('site_meta', 'option');

// Header meta tags
FWD::the_component( null, 'meta/head' );

// Google Tag Manager
FWD::the_component( $meta, 'meta/google-tag-manager' );

// Adobe Fonts
FWD::the_component( $meta, 'meta/adobe-fonts' );

// Google Fonts
FWD::the_component( null, 'meta/google-fonts');
