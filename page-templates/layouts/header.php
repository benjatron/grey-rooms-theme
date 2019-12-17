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

// Typekit
FWD::the_component( null, 'meta/typekit' );