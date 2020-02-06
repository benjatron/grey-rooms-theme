<?php
/**
 * Boilerplate setup class
 */

class FWD_Setup {

  // Location of ACF JSON files
  public $acf_directory;

  // Array of image sizes to register
  public $image_sizes;

  // Theme menus
  public $menus = array();

  // Directory of component markup files
  public $component_directory;

  // Directory for output images
  public $image_directory;

  // Directory of layout markup files
  public $layout_directory;

  // Directory of compiled script files
  public $script_directory;

  // Directory of compiled style files
  public $style_directory;

  // Directory of page template files
  public $template_directory;

  // Array of templates
  public $templates;

  // Version of the theme used for cache-busting purposes
  public $theme_version = "1.0";

  public function __construct() {

    global $THEME_VERSION;
    if( $THEME_VERSION ):
      $this->theme_version = $THEME_VERSION;
    endif;

    $this->acf_directory = get_stylesheet_directory() . '/resources/acf/';
    $this->component_directory = 'page-templates/components/';
    $this->image_directory = get_stylesheet_directory_uri() . '/resources/images/';
    $this->layout_directory =  'page-templates/layouts/';
    $this->script_directory = get_stylesheet_directory_uri() . '/resources/scripts/dist/';
    $this->style_directory = get_stylesheet_directory_uri() . '/resources/styles/dist/';
    $this->template_directory = get_stylesheet_directory_uri() . '/page-templates/';

    $this->set_theme_supports();
    add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ), 100 );
    $this->set_acf_json_locations();
    $this->create_theme_settings_page();

  }

  /**
   * Sets basic supports for theme
   */
  protected function set_theme_supports() {
    add_action( 'after_setup_theme', function() {
      // Add support for 5.0+ editor styles
      add_theme_support('align-wide');
      add_theme_support('wp-block-styles');

      // Enable HTML5 markup support
      add_theme_support('html5');

      // Enable plugins to manage the document title
      add_theme_support('title-tag');

      // Add menu support
      add_theme_support( 'menus' );
    });
  }

  /**
   * Registers a theme settings page for ACF
   */
  protected function create_theme_settings_page() {
    // Only initiates if ACF is active
    // Otherwise, displays an admin notice
    if( function_exists( 'acf_add_options_page' ) ):
      acf_add_options_page(array(
        'page_title'      => 'Theme Settings',
        'menu_title'      => 'Theme Settings',
        'menu_slug'       => 'theme-settings',
        'capability'      => 'edit_posts',
        'icon_url'        => 'dashicons-book-alt',
        'position'        => 40,
        'redirect'        => true,
        'autoload'        => true,
        'update_button'   => __('Update Settings', 'fwd'),
        'updated_message' => __('Settings Updated', 'fwd')
      ));
    else:
      add_action( 'admin_notices', function() {
      ?>
        <div class="notice notice-error">
          <p>
            This theme requires Advanced Custom Fields PRO to function properly. If you have not installed it, you can download it from your ACF <a href="https://www.advancedcustomfields.com/my-account/" target="_blank" rel="noopener noreferrer">account dashboard</a>. If you've installed it but have not activated it yet, you can do so from your <a href="<?php echo get_admin_url() . '/plugins.php'; ?> ">Plugins page</a>.
          </p>
        </div>
      <?php
      });
    endif;
  }

  /**
   * Sets menus for the theme
   */
  public function set_theme_menus( $menus ) {
    $this->menus = $menus;
    add_action( 'after_setup_theme', function() {
      register_nav_menus( $this->menus );
    });
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
    wp_register_script( 'universal', $this->script_directory . 'universal.js', array( 'jquery' ), $this->theme_version, true );
    wp_enqueue_script( 'universal' );
    wp_register_style( 'universal', $this->style_directory . 'universal.css', false, $this->theme_version, 'all' );
    wp_enqueue_style( 'universal' );

    $this->register_page_templates($this->templates);

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
    wp_register_script( $slug, $this->script_directory . $slug . '.js', array( 'universal' ), $this->theme_version, true );
    wp_register_style( $slug, $this->style_directory . $slug . '.css', array('universal'), $this->theme_version );
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
    $this->register_all( $templates );
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