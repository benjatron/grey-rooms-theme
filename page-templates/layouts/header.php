<?php
/**
 * Universal header content
 */
use FWD_Helper as FWD;

// WordPress head() function
wp_head();

// Set meta variables to pass to components
$meta = (object) get_field( 'site_meta', 'option' );
$gtm = $meta->gtm;
$adobe_fonts = $meta->adobe_fonts;

// Header meta tags
FWD::the_component( null, 'meta/head' );

// Google Tag Manager
FWD::the_component( $gtm, 'meta/google-tag-manager' );

// Adobe Fonts
FWD::the_component( $adobe_fonts, 'meta/adobe-fonts' );
