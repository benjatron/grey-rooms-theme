<?php
/**
 * Base page class
 */

class FWD_Template {

  // The ID for the page
  public $id;

  // The slug of the page template used
  public $slug;

  public function __construct() {

    $this->id = get_the_ID();
    $this->slug = $this->get_template_slug();

    $this->meta = new FWD_Component( 'site_meta', 'option' );

    $this->build_template();

  }

  public function build_template() {
    // Meant to be created per template
  }

  /**
 * Returns a page template slug without a prefix directory and ending '.php'
 *
 * @var string $id      (optional) The id of the post being queried
 *
 * @return string       The truncated page template slug
 */
  public function get_template_slug() {
    $slug = get_page_template_slug( $this->page_id );

    // Remove substrings from $slug
    $strings = array(
      'page-templates/',
      '.php'
    );
    $result = str_replace( $strings, '', $slug );

    // If the result is empty, set to "default"
    if( empty( $result ) ):
      $result = 'default';
    endif;

    return $result;
  }
}