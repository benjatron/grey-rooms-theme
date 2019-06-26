<?php
/**
 * Loads vendor files from Composer
 */
require( get_stylesheet_directory( ) .  '/vendor/autoload.php' );

/**
 * Helper functions
 */
require 'helpers/fwd-nav-menu.php';
require 'helpers/fwd-preload.php';
require 'helpers/fwd-query-var.php';
require 'helpers/fwd-register.php';
require 'helpers/get-component.php';
require 'helpers/get-layout.php';
require 'helpers/nowrap-field.php';
require 'helpers/picsum-url.php';
require 'helpers/placeholder-url.php';
require 'helpers/svg.php';
require 'helpers/the-nested-links.php';

/**
 * Theme setup and supports
 */
require 'setup/acf-save-location.php';
require 'setup/admin-menu-remover.php';
require 'setup/asset-loader.php';
require 'setup/disable-emojis.php';
require 'setup/image-sizes.php';
require 'setup/show-active-template.php';
require 'setup/theme-settings-page.php';
require 'setup/theme-supports.php';

/**
 * Theme menus
 */
require 'menus/navigation-menus.php';
