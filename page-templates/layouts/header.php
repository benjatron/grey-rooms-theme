<?php
/**
 * Universal header content
 */

// WordPress head() function
wp_head();

// Header metatags
get_component( 'meta', 'head' );

// Google Tag Manager
get_component( 'meta', 'google-tag-manager' );

// Lead Forensics
get_component( 'meta', 'lead-forensics' );

// Typekit
get_component( 'meta', 'typekit' );
