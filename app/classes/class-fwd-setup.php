<?php
/**
 * Boilerplate setup class
 */

class FWD_Setup {

  // Location of ACF JSON files
  public $acf_dir;

  // Directory of compiled script files
  public $script_dir;

  // Directory of compiles style files
  public $style_dir;

  public function __construct() {

    $this->set_directory_values();
    $this->enqueue_assets();

  }

  /**
   * Sets directory values for the theme
   */
  public function set_directory_values() {
    $this->acf_dir = get_stylesheet_directory() . '/resources/acf';
    $this->script_dir = get_stylesheet_directory() . '/resources/scripts/dist/';
    $this->style_dir = get_stylesheet_directory() . '/resources/styles/dist/';

    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 100 );

    // If Gravity Forms is installed, load it in the footer
    add_filter( 'gform_init_scripts_footer', '__return_true' );
  }

  /**
   * Adjust WordPress loading and hierarchy of universal assets
   */
  protected function enqueue_assets() {
    // Removes Gutenberg block styles from the queue
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
  
    // Pushes jQuery to the footer group
    wp_scripts()->add_data( 'jquery', 'group', 1 );
    wp_scripts()->add_data( 'jquery-core', 'group', 1 );
    wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );

    // If universal scripts and styles are set, load them
    if( file_exists( $this->script_dir ) ):
      wp_register_script( 'universal', $this->script_dir . 'universal.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'universal' );
    endif;
    if( file_exists( $this->style_dir ) ):
      wp_register_style( 'universal', $this->style_dir . 'universal.css', false, null );
      wp_enqueue_style( 'universal' );
    endif;
  }

  /**
  * Script/style registration shorthand
  *
  * This function acts as shorthand to register scripts and styles for
  * individual page templates, primarily to simplify reading.
  *
  * @var string $slug      The name of the file to register
  */
  public function register( $slug ) {
    if( file_exists( $this->script_dir . $slug . '.js' ) ):
      wp_register_script( $slug, $this->script_dir . $slug . '.js', array( 'universal' ), null, true );
    endif;
    wp_register_style( $slug, $style_dir . $slug . '.css', false, null );
  }

  /**
  * Script/style registration shorthand for arrays
  *
  * This function uses fwd_register() to cycle through an array of slugs and
  * register their associated scripts and styles
  *
  * @var array $slugs      An array of file names to register
  */
  function register_all( $slugs = array() ) {
    foreach( $slugs as $slug ):
      $this->register( $slug );
    endforeach;
  }

  /**
   * Registers page templates for the theme
   */
  public function register_page_templates( $templates = array() ) {
    // Registers the array of templates at enqueue time
    add_action( 'wp_enqueue_scripts', function() {
      $this->register_all( $templates );
    });
  }

}