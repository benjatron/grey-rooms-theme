<?php
/**
 * Abstract FWD helper methods
 */

abstract class FWD_Helper {

  /**
   * Includes a component into a page
   *
   * Because get_template_part() does not bring all variables with it, it's not
   * very useful for ACF integration. As such, the include( locate_template() );
   * hack is necessary. To cut down on typing and improve readability, this
   * function imports a layout partial and keeps variables accessible.
   *
   * @var string $folder      The folder(s) the layout partial resides in
   * @var string $slug        The name of the partial file, without extension
   *
   * @return mixed            The template file referenced
   */
  public function the_component( $folder, $slug ) {

    // Uses $THEME values
    global $THEME;
    return include( $THEME->component_directory . $folder . '/' . $slug . '.php' );
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
    return include( $THEME->layout_directory . $slug . '.php' );
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
      'css' == strtolower($type) ||
      'style' == strtolower($type)
    ):
      $result = "<link rel='preload' href='" . $THEME->style_directory . $handle . ".css' as='style' />\n";
    // If the file is JS, echo this
    elseif(
      'js' == strtolower($type) ||
      'script' == strtolower($type)
    ):
      $result = "<link rel='preload' href='" . $THEME->script_directory . $handle . ".js' as='script' />\n";
    endif;

    echo $result;
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
   * Sets component variables to specific ACF field names
   * 
   * @var string  $var      The name of the variable to set
   * @var string  $field    The ACF field value to reference
   * @var string  $id       The post ID for ACF to reference
   * 
   * @return bool
   */
  public function set_component_field( $component = '', $var = '', $field = '', $id = '' ) {
    global ${$component};

    if( function_exists( 'get_field') ):
      if( get_field( $field, $id) ):
        ${$component}->$var = get_field( $field, $id ) ;
        return true;
      else:
        return false;
      endif;
    endif;
  }

    /**
   * Sets component variables to input strings
   * 
   * @var string  $var      The name of the variable to set
   * @var string  $value    The string value assign
   * @var string  $id       The post ID for ACF to reference
   */
  public function set_component_var( $component = '', $var = '', $value = '' ) {
    global ${$component};
    ${$component}->$var = $value;
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

}