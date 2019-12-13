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
   * hack is necessary. To cut down on typing and improve readibility, this
   * function imports a layout partial and keeps variables accessible.
   *
   * @var string $folder      The folder(s) the layout partial resides in
   * @var string $slug        The name of the partial file, without extension
   *
   * @return string           The template filename if one is located
   */
  public function get_component( $folder, $slug ) {

    // Uses $THEME values
    global $THEME;

    return include( locate_template( $THEME->component_directory . $folder . '/' . $slug . '.php', false, false ) );
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
   * Sets query variables to specific ACF field names
   * 
   * @var string  $var      The name of the variable to set
   * @var string  $field    The ACF field value to reference
   * @var string  $id       The post ID for ACF to reference
   * 
   * @return bool
   */
  public function query_var( $var = '', $field = '', $id = '' ) {
    if( function_exists( 'get_field') ):
      if( get_field( $field, $id) ):
        set_query_var( $var, get_field( $field, $id ) );
        return true;
      else:
        return false;
      endif;
    endif;
  }

}