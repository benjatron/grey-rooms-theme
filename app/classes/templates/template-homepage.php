<?php
/**
 * Homepage template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Homepage extends FWD_Template {

  // Template variables

  public function __construct( $acf_prefix ) {

    $this->id = get_the_ID();
    $this->slug = $this->get_template_slug();
    
    // Instantiate components here

  }

}