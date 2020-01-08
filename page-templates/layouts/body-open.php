<?php
// Markup to be fired after the opening <body> tag
use FWD_Helper as FWD;

$meta = get_field('site_meta', 'option');

// Noscript option for Google Tag Manager
FWD::the_component( $meta, 'meta/gtm-noscript' );

wp_body_open();
