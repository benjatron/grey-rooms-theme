<?php
/**
 * Base page class
 */

class FWD_Page {

  // The ID for the page
  public $page_id;

  // The slug of the page template used
  public $template_slug;

  public function __construct() {

    $this->page_id = get_the_ID();
    $this->template_slug = $this->get_page_slug();
  }

  /**
 * Returns a page template slug without a prefix directory and ending '.php'
 *
 * @var string $id      (optional) The id of the post being queried
 *
 * @var string $result  The truncated page template slug
 */
  public function get_page_slug() {
    $slug = get_page_template_slug( $this->page_id );

    // Remove substrings from $slug
    $strings = array(
      'page-templates/',
      '.php'
    );
    $result = str_replace( $strings, '', $slug );

    // If the result is empty, set to "default"
    if( empty( $result) ):
      $result = 'default';
    endif;

    return $result;
  }
}