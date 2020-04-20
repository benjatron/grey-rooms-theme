<?php
/**
 * Homepage template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Homepage extends FWD_Template {

  // Top content
  public $top_content;

  // Body content
  public $body_content;

  public function build_components() {

    $this->top_content = array(

      'background' => get_field( "{$this->slug}_background" ),
      'mobileBackground' => get_field( "{$this->slug}_mobileBackground" ),
      'disclaimer' => FWD_Helper::get_nowrap_field( "{$this->slug}_disclaimer" ),
      'slider' => new Component_Episode_Slider(),
      'slogan' => get_field( "{$this->slug}_slogan"),

    );

    $this->body_content = array(

      'background' => get_field( "site_general", 'option' )['background_image'],
      'heading' => get_field( "{$this->slug}_heading" ),
      'subhead' => get_field( "{$this->slug}_subhead" ),
      'bottom' => get_field( "{$this->slug}_bottom" ),

    );
  }

}