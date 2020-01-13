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

    $this->build_components();

    $this->footer = new Component_Footer( 'site_footer', 'option' );
    $this->navigation = new Component_Navigation( 'site_general', 'option' );
  }

  /**
   * Generic component builder. Meant to be overwritten
   */
  public function build_components() {}

  /**
   * Returns a page template slug without a prefix directory and ending '.php'
   *
   * @var string $id      (optional) The id of the post being queried
   *
   * @var string $result  The truncated page template slug
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