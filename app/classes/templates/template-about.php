<?php
/**
 * About template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_About extends FWD_Template {

  // Intro content
  public $intro_content;

  // The team
  public $team;

  public function build_components() {

    $this->intro_content = array(

      'headline' => get_field( "{$this->slug}_headline" ),
      'introduction' => get_field( "{$this->slug}_introduction" ),
      'background' => get_field( "{$this->slug}_background" )

    );

    $this->team = array(

      'background' => get_field( "site_general", 'option' )['background_image'],
      'people' => get_field( "{$this->slug}_team" )

     );

  }

}