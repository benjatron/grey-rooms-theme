<?php
// Markup to be fired after the opening <body> tag

// Noscript option for Google Tag Manager
get_component( 'meta', 'gtm-noscript' );

// Noscript option for Lead Forensics
get_component( 'meta', 'lf-noscript' );

wp_body_open();