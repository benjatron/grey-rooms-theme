<?php
// Markup to be fired after the opening <body> tag
use FWD_Helper as FWD;

// Set meta variables from passed object
$meta = $COMPONENT->contents;
$gtm = $meta->gtm;

// Noscript option for Google Tag Manager
FWD::the_component( $gtm, 'meta/gtm-noscript' );

wp_body_open();
