<?php
/**
 * Boilerplate setup class
 */

class FWD_Setup {

  // Theme version
  public $theme_version = "2.0b";

  // Location of ACF JSON files
  public $acf_directory;

  // Array of image sizes to register
  public $image_sizes;

  // Directory of compiled script files
  public $script_directory;

  // Directory of compiles style files
  public $style_directory;

  public function __construct() {

    $this->set_theme_supports();
    $this->set_directory_values();
    $this->enqueue_assets();
    $this->set_acf_json_locations();

  }

  protected function set_theme_supports() {
    add_action( 'after_setup_theme', function() {
      // Add support for 5.0+ editor styles
      add_theme_support('align-wide');
      add_theme_support('wp-block-styles');

      // Enable HTML5 markup support
      add_theme_support('html5');

      // Enable plugins to manage the document title
      add_theme_support('title-tag');
    });
  }

  /**
   * Sets directory values for the theme
   */
  protected function set_directory_values() {
    $this->acf_directory = get_stylesheet_directory() . '/resources/acf';
    $this->script_directory = get_stylesheet_directory() . '/resources/scripts/dist/';
    $this->style_directory = get_stylesheet_directory() . '/resources/styles/dist/';
  }

  /**
   * Adjust WordPress loading and hierarchy of universal assets
   */
  public function enqueue_assets() {
    // Removes Gutenberg block styles from the queue
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
  
    // Pushes jQuery to the footer group on the front-end
    if( !is_admin() ):
      wp_scripts()->add_data( 'jquery', 'group', 1 );
      wp_scripts()->add_data( 'jquery-core', 'group', 1 );
      wp_scripts()->add_data( 'jquery-migrate', 'group', 1 );
    endif;

    // If universal scripts and styles are set, load them
    if( file_exists( $this->script_directory ) ):
      wp_register_script( 'universal', $this->script_directory . 'universal.js', array( 'jquery' ), null, true );
      wp_enqueue_script( 'universal' );
    endif;
    if( file_exists( $this->style_directory ) ):
      wp_register_style( 'universal', $this->style_directory . 'universal.css', false, null );
      wp_enqueue_style( 'universal' );
    endif;

    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 100 );

    // If Gravity Forms is installed, load it in the footer
    add_filter( 'gform_init_scripts_footer', '__return_true' );

    // Activates Gravity Forms confirmation anchor
    add_filter( 'gform_confirmation_anchor', '__return_true' );
  }

  /**
   * Sets save/load locations for ACF JSON
   */
  protected function set_acf_json_locations() {
    // Only execute if Advanced Custom Fields' functions exist
    if( function_exists( 'acf_add_options_page') ):
      add_filter('acf/settings/save_json', 
        function( $path ) {
          $path = $this->acf_directory;
          return $path;
        }
      );
      add_filter('acf/settings/load_json', 
        function( $paths ) {
          unset( $paths[0] );
          $paths[] = $this->acf_directory;
          return $paths;
        }
      );
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
    if( file_exists( $this->script_directory . $slug . '.js' ) ):
      wp_register_script( $slug, $this->script_directory . $slug . '.js', array( 'universal' ), null, true );
    endif;
    if( file_exists( $this->style_directory . $slug . '.css' ) ):
      wp_register_style( $slug, $style_directory . $slug . '.css', false, null );
    endif;
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
    // Do not execute if using an empty array
    if( !empty( $slugs ) ):
      foreach( $slugs as $slug ):
        $this->register( $slug );
      endforeach;
    endif;
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


  /**
   * Disables WordPress emojis from loading
   * @see https://kinsta.com/knowledgebase/disable-emojis-wordpress/
   */
  public function disable_emojis() {
    add_action( 'init', function() {
      remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
      remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
      remove_action( 'wp_print_styles', 'print_emoji_styles' );
      remove_action( 'admin_print_styles', 'print_emoji_styles' );
      remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
      remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
      remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

      // Filter function used to remove the tinyMCE emoji plugin
      add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
      function disable_emojis_tinymce( $plugins ) {
        if ( is_array( $plugins ) ):
          return array_diff( $plugins, array( 'wpemoji' ) );
        else:
          return array();
        endif;
      }

      // Remove emoji CDN hostname from DNS prefetching hints.
      add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
      function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
        if ( 'dns-prefetch' == $relation_type ):
          /** This filter is documented in wp-includes/formatting.php */
          $emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );
          $urls = array_diff( $urls, array( $emoji_svg_url ) );
        endif;
        return $urls;
      }

    });
  }

  /**
   * Adds a column in the admin dashboard to show the active page template
   * @link https://www.isitwp.com/custom-column-with-currently-active-page-template/
   */
  public function show_active_template() {
    add_filter( 'manage_pages_columns', function($defaults) {
      $defaults['page-layout'] = __('Page Template');
      return $defaults;
    });

    add_action( 'manage_pages_custom_column', function( $column_name, $id ) {
      if( 'page-layout' === $column_name ):
        $set_template = get_post_meta( get_the_ID(), '_wp_page_template', true );
        if( 'default' == $set_template ):
          echo 'Default';
        endif;

        $templates = get_page_templates();
        ksort( $templates );

        foreach ( array_keys( $templates ) as $template ) :
          if ( $set_template == $templates[$template] ):
            echo $template;
          endif;
        endforeach;
      endif;
    }, 5, 2);
  }

  /**
   * Removes unnecessary items from the admin menu
   */
  public function remove_admin_menus() {
    add_action( 'admin_menu', function() {
      // remove_menu_page( 'index.php' );                  //Dashboard
      // remove_menu_page( 'jetpack' );                    //Jetpack*
      // remove_menu_page( 'edit.php' );                   //Posts
      // remove_menu_page( 'upload.php' );                 //Media
      // remove_menu_page( 'edit.php?post_type=page' );    //Pages
      remove_menu_page( 'edit-comments.php' );             //Comments
      // remove_menu_page( 'themes.php' );                 //Appearance
      // remove_menu_page( 'plugins.php' );                //Plugins
      // remove_menu_page( 'users.php' );                  //Users
      // remove_menu_page( 'tools.php' );                  //Tools
      // remove_menu_page( 'options-general.php' );        //Settings
      remove_menu_page( 'link-manager.php' );              //Links
    });
  }


  /**
   * Cleans up the_excerpt()
   */
  public function set_the_excerpt() {
    add_filter( 'excerpt_more', function() {
      // '... Continued'
      return ' &#8230; <a href="' . get_permalink() . '">' . __('Continued', 'fwd') . '</a>';
    });
  }


  /**
   * Sets thumbnail support and image sizes for the theme
   * @var array $image_sizes      the array of pixel widths
   */
  public function set_image_sizes( $sizes ) {
    // Update the FWD_Setup object
    $this->image_sizes = $sizes;

    add_action( 'after_setup_theme', function() {
      add_theme_support( 'post-thumbnails' );
      add_image_size( 'preload', 64, 9999 );
      foreach( $this->image_sizes as $size ):
        add_image_size( "{$size}w", $size, 9999 );
      endforeach;
    });
  }

}