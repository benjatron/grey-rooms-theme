<?php
// Markup to be fired after the opening <body> tag
use FWD_Helper as FWD;

$meta = (object) get_field( 'site_meta', 'option' );
$gtm = $meta->gtm;

// Noscript option for Google Tag Manager
FWD::the_component( $gtm, 'meta/gtm-noscript' );

wp_body_open();
