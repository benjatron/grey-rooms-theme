<?php
// Markup to be fired after the opening <body> tag
use FWD_Helper as FWD;

// Noscript option for Google Tag Manager
FWD::the_component( null, 'meta/gtm-noscript' );

wp_body_open();
