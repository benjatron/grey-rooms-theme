<?php
/**
 * Abstract FWD helper methods
 */

abstract class FWD_Helper {

  /**
   * Generic console logger for error messages
   * 
   * @var string $output      The output message
   * @var bool $with_tags     Whether to include <script> tags
   * 
   * @return mixed            The console message
   */
  protected function console_log( $output, $with_tags = true ) {
    $code = 'console.log(' . json_encode( "PHP Error: {$output}", JSON_HEX_TAG ) . ');';
    if( $with_tags ):
      $code = "<script>{$code}</script>";
    endif;

    echo $code;
  }

  /**
   * Includes a component into a page
   *
   * Because get_template_part() does not bring all variables with it, it's not
   * very useful for ACF integration. As such, the include( locate_template() );
   * hack is necessary. To cut down on typing and improve readability, this
   * function imports a layout partial and keeps variables accessible.
   *
   * @var object $object      The object to pass to the component
   * @var string $location    The location of the layout partial (without 
   *                          extension) within the components folder
   *
   * @return mixed            The template file referenced
   */
  public function the_component( $COMPONENT, $location ) {

    // Uses $THEME values
    global $THEME;

    if( locate_template( $THEME->component_directory . $location . '.php', false, false ) ):
      return include( locate_template( $THEME->component_directory . $location . '.php', false, false ) );
    else:
      FWD_Helper::console_log( "FWD_Helper::the_component( '{$location}' ) failed" );
    endif;
  }

  /**
   * Includes a layout file into a page
   *
   * Layouts are a combination of components and common code that can be included
   * as one function instead of repeated get_component() calls or repeated code.
   *
   * @var string $slug        The name of the partial file, without file extension
   *
   * @return mixed            The template file referenced
   */
  public function the_layout( $slug ) {
    // Uses $THEME values
    global $THEME;

    if( locate_template( $THEME->layout_directory . $slug . '.php', false, false ) ):
      return include( locate_template( $THEME->layout_directory . $slug . '.php', false, false ) );
    else:
      FWD_Helper::console_log( "FWD_Helper::the_layout( '{$slug}' ) failed" );
    endif;
  }

  /**
   * Emits a 'preload' link tag for the source provided
   *
   * @var string $handle      The script or style handle to preload
   * @var string $type        The file type to use in the file reference
   *
   * @return string $result   A <link> tag with the script/style to preload
   */
  public function preload( $handle, $type ) {

    // Uses $THEME values
    global $THEME;

    // If the file is CSS, echo this
    if(
      'css' == strtolower($type)
    ):
      $result = "<link rel='preload' href='{$THEME->style_directory}{$handle}.css?ver={$THEME->theme_version}' as='style' />\n";
      echo $result;
    // If the file is JS, echo this
    elseif(
      'js' == strtolower($type)
    ):
      $result = "<link rel='preload' href='{$THEME->script_directory}{$handle}.js?ver={$THEME->theme_version}' as='script' />\n";
      echo $result;
    else:
      FWD_Helper::console_log( "FWD_Helper::preload( '{$handle}', '{$type}' ) failed" );
    endif;
  }

  /**
   * Removes the wrapping paragraph tags from WYSIWYG editor fields
   *
   * By default, the WYSIWYG editor in ACF will output paragraph tags
   * automatically. In cases where there is only one paragraph, this can
   * sometimes cause spacing issues. This function "gets" the field without those
   * tags. Note: Only works with ACF WYSIWYG editor fields.
   *
   * @var string $field_name       The name of the field affected
   * @var string $id               The ID of the post where the field is located
   *                                (defaults to current post)
   * @link https://support.advancedcustomfields.com/forums/topic/removing-paragraph-tags-from-wysiwyg-fields/
   */
  function get_nowrap_field( $field_name, $id='' ) {
    if( $id=='' ):
      $id = get_the_ID();
    endif;
    remove_filter('acf_the_content', 'wpautop');
    if( function_exists('get_field') ):
      $field = get_field( $field_name, $id );
    endif;
    add_filter('acf_the_content', 'wpautop');
    return $field;
  }

  /**
   * Echoes fields from get_nowrap_field()
   *
   * By default, the WYSIWYG editor in ACF will output paragraph tags
   * automatically. In cases where there is only one paragraph, this can
   * sometimes cause spacing issues. This function "gets" the field without those
   * tags. Note: Only works with ACF WYSIWYG editor fields.
   *
   * @var string $field_name       The name of the field affected
   * @var string $id               The ID of the post where the field is located
   *                                (defaults to current post)
   * @link https://support.advancedcustomfields.com/forums/topic/removing-paragraph-tags-from-wysiwyg-fields/
   */
  function the_nowrap_field( $field_name, $id='' ) {
    echo FWD_Helper::get_nowrap_field( $field_name, $id='' );
  }

  /**
   * Sets query variables to specific ACF field names
   * 
   * @var string  $var      The name of the variable to set
   * @var string  $field    The ACF field value to reference
   * @var string  $id       The post ID for ACF to reference
   * 
   * @return bool
   */
  public function set_var_field( $var = '', $field = '', $id = '' ) {
    if( function_exists( 'get_field') ):
      if( get_field( $field, $id) ):
        set_query_var( $var, get_field( $field, $id ) );
        return true;
      else:
        return false;
      endif;
    endif;
  }

  /**
   * Fetches the URL of a picsum placeholder image
   *
   * Utilizes the Picsum API to create a URL for image tags and other elements
   * that displays a randomized placeholder image from the Picsum archive.
   *
   * @link https://picsum.photos/
   *
   * @var string $width       The width (in px), of the image to be displayed
   * @var string $height      The height (in px), of the image to be displayed
   *                          (optional)
   * @var string $modifier    The modifier, if any, to apply to the Picsum image
   *                          (optional)
   *
   * @return string           The URL of a Picsum image
   */
  function get_picsum_url( $width, $height='', $modifier='' ) {
    // If a height is defined, append a '/' to it for the final URL
    if( $height != '' ):
      $height = '/' . $height;
    endif;

    // Modifier can be either "grayscale" or "blur"
    if( $modifier == 'grayscale' ):
      return ( '//picsum.photos/g/' . $width . $height );
    elseif ( $modifier == 'blur' ):
      return ( '//picsum.photos/' . $width . $height . '/?blur' );
    else:
      return ( '//picsum.photos/' . $width . $height );
    endif;
  }

  /**
   * Echoes the URL from get_picsum_img_url()
   *
   * Utilizes the Picsum API to create a URL for image tags and other elements
   * that displays a randomized placeholder image from the Picsum archive.
   *
   * @link https://picsum.photos/
   *
   * @var string $width       The width (in px), of the image to be displayed
   * @var string $height      The height (in px), of the image to be displayed
   *                          (optional)
   * @var string $modifier    The modifier, if any, to apply to the Picsum image
   *                          (optional)
   *
   * @return string           The URL of a Picsum image
   */
  function the_picsum_url( $width, $height='', $modifier='' ) {
    echo FWD_Helper::get_picsum_url( $width, $height='', $modifier='' );
  }

  /**
   * Fetches the URL of a placeholder.com image
   *
   * Utilizes the Placeholder.com web API to create a URL for image tags and
   * other elements that displays a sized placeholder image with the option for
   * custom placeholder text.
   *
   * @link https://placeholder.com/
   *
   * @var string $width             The width, in pixels, of the image to be
   *                                displayed
   * @var string $height            The height, in pixels, of the image to be
   *                                displayed (optional)
   * @var string $text_to_display   The text to display within the image bounds
   *                                (optional)
   *
   * @return string                 The URL of a placeholder image
   */
  function get_placeholder_url( $width, $height='', $text_to_display='' ) {
    // If no height is defined, set it equal to the width
    if( $height == '' ):
      $height = $width;
    endif;

    if( $text_to_display != ''):
      $text_to_display = str_replace( ' ', '+', $text_to_display);
      return ( '//via.placeholder.com/' . $width . 'x' . $height . '?' . $text_to_display );
    else:
      return ( '//via.placeholder.com/' . $width . 'x' . $height );
    endif;
  }

  /**
   * Echoes the URL from get_placeholder_img_url()
   *
   * Utilizes the Placeholder.com web API to create a URL for image tags and
   * other elements that displays a sized placeholder image with the option for
   * custom placeholder text.
   *
   * @link https://placeholder.com/
   *
   * @var string $width             The width, in pixels, of the image to be
   *                                displayed
   * @var string $height            The height, in pixels, of the image to be
   *                                displayed (optional)
   * @var string $text_to_display   The text to display within the image bounds
   *                                (optional)
   *
   * @return string                 The URL of a placeholder image
   */
  function the_placeholder_url( $width, $height='', $text_to_display='' ) {
    echo FWD_Helper::get_placeholder_url( $width, $height='', $text_to_display='' );
  }

  /**
   * Gets SVG file contents
   *
   * Inlining SVG elements isn't fun, so this does it for you. It brings in the
   * entirety of the SVG file and should be placed between svg tags for more full
   * control.
   *
   * @var string $file      The SVG filename to pull in, relative to the parent
   *                        SVG dist folder
   *
   * @return string         The SVG file contents
   */
  function get_svg( $file ) {
    global $THEME;

    return file_get_contents( $THEME->image_directory . 'dist/svg/' . $file . '.svg');
  }

  /**
   * Echoes SVG file contents from get_svg()
   *
   * Inlining SVG elements isn't fun, so this does it for you. It brings in the
   * entirety of the SVG file and should be placed between svg tags for more full
   * control.
   *
   * @var string $file      The SVG filename to pull in, relative to the parent
   *                        SVG dist folder
   *
   * @return string         The SVG file contents
   */
  function the_svg( $file ) {
    echo FWD_Helper::get_svg( $file );
  }

  /**
   * Creates a human-readable unordered list for sitemap purposes
   *
   * @var string $parentClass   The CSS class of the parent element
   * @var string $links         The array of links to use for the sitemap
   *
   * @return mixed              A nested list of links
   */

  function the_nested_links( $parentClass, $links ) {
    ?>
    <ul class="<?php echo $parentClass; ?>__list">
      <?php
      foreach( $links as $link ):
        $item = $link['link'];
        $title = $item->post_title;
        $url = get_permalink( $item->ID );
        ?>
        <li class="<?php echo $parentClass; ?>__item">
          <a class="<?php echo $parentClass; ?>__link" href="<?php echo $url; ?>">
            <?php echo $title; ?>
          </a>
          <?php
          if( $link['check'] ):
            the_nested_links( $parentClass, $link['children'] );
          endif;
          ?>
        </li>
        <?php
      endforeach;
      ?>
    </ul>
    <?php
  }

  /**
   * Using classes and data attributes from Lazysizes, echoes the <img> tag of 
   * a responsive image
   * 
   * @var string $classes     The CSS classes to pass to the image
   * @var array $image        The array of WordPress image data
   * @var int $max_width      The widest the image should appear
   * @var bool $blur          Whether or not the image should "blur up"
   * 
   * @return string
   */
  function the_lazy_image( $classes, $image, $max_width = 9999, $blur = true ) {

    global $THEME;
    $sizes = $THEME->image_sizes;

    // If the image should "blur up", add that class
    if( $blur ):
      echo "<img class=\"{$classes} lazyload lazyload--blurUp\" ";
    else:
      echo "<img class=\"{$classes} lazyload\" ";
    endif;

    // Add the image alt, if it exists
    if( $image['alt'] ):
      echo "alt=\"{$image['alt']}\" ";
    endif;

    // Add data-sizes and preload sizes
    echo "data-sizes=\"auto\" data-src=\"{$image['sizes']['preload']}\" data-srcset=\"";

    // Echoes the data-srcset values
    echo "{$image['sizes']['preload']} 64w, ";
    $w = 65; // Sets initial width needed in for loop
    for( $i=0; $i<count($sizes); $i++ ):
      // Only output values if $max_width hasn't been exceeded
      if( $sizes[$i] <= $max_width ):
        echo $image['sizes'][$sizes[$i].'w'] . ' ' . $w . 'w, ';
        $w = ( $sizes[$i] + 1 );
      endif;
    endfor;

    // Close the image tag
    echo "\"/>";
  }

}