<?php
/**
 * Homepage template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Homepage extends FWD_Template {

  // Background image
  public $background;

  // Disclaimer
  public $disclaimer;

  // Podcast slogan
  public $slogan;

  // Slider content
  public $slider;

  // Top content
  public $top_content;

  public function build_components() {

    $this->top_content = array(

      'background' => get_field( "{$this->slug}_background" ),
      'disclaimer' => FWD_Helper::get_nowrap_field( "{$this->slug}_disclaimer" ),
      'slider' => new Component_Episode_Slider(),
      'slogan' => get_field( "{$this->slug}_slogan"),

    );
  }

}