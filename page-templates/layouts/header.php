<?php
/**
 * Universal header content
 */
use FWD_Helper as FWD;

// Set meta variables from passed object
$meta = $COMPONENT->contents;

$gtm = $meta->gtm;
$adobe_fonts = $meta->adobe_fonts;

// WordPress head() function
wp_head();

// Header meta tags
FWD::the_component( null, 'meta/head' );

// Google Tag Manager
FWD::the_component( $gtm, 'meta/google-tag-manager' );

// Adobe Fonts
FWD::the_component( $adobe_fonts, 'meta/adobe-fonts' );
