<?php
/**
 * Universal header content
 */
use FWD_Helper as FWD;

// WordPress head() function
wp_head();

// Get site meta options
$site = get_field( 'site', 'option' )['meta'];

// Header meta tags
FWD::the_component( null, 'meta/head' ); // No object necessary to be passed

// Google Tag Manager
FWD::the_component( $site, 'meta/google-tag-manager' );

// Adobe Fonts
FWD::the_component( $site, 'meta/adobe-fonts' );
