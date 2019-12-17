<?php
/**
 * Universal header content
 */
use FWD_Helper as FWD;

// WordPress head() function
wp_head();

// Header meta tags
FWD::the_component( null, 'meta/head' );

// Google Tag Manager
FWD::the_component( null, 'meta/google-tag-manager' );

// Adobe Fonts
FWD::the_component( null, 'meta/adobe-fonts' );