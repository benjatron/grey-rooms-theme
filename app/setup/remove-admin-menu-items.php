<?php
/**
 * Removes unnecessary menu items from the admin area. By default, only 
 * Comments and Links are disabled but can be enabled and any other pages that 
 * should be hidden can be commented out.
 * 
 * @link https://codex.wordpress.org/Function_Reference/remove_menu_page
 */

add_action( 'admin_menu', function() {

  /**
   * Menu items are listed in the order that they appear by default in the 
   * admin dashboard
   */

  // Dashboard
  // remove_menu_page( 'index.php' );

  // Posts
  // remove_menu_page( 'edit.php' );

  // Media
  // remove_menu_page( 'upload.php' );

  /**
   * Links
   * 
   * Not standard in new installs since WordPress 3.5 but WP Engine keeps this 
   * page visible so it's included
   * 
   * @see https://codex.wordpress.org/Links_Manager
   */
  remove_menu_page( 'link-manager.php' );

  // Pages
  // remove_menu_page( 'edit.php?post_type=page' );

  // Comments
  remove_menu_page( 'edit-comments.php' );

  // Appearance
  // remove_menu_page( 'themes.php' );

  // Plugins
  // remove_menu_page( 'plugins.php' );

  // Users
  // remove_menu_page( 'users.php' );

  // Tools
  // remove_menu_page( 'tools.php' );

  // Settings
  // remove_menu_page( 'options-general.php' );
});
