<?php
/**
 * Post archive template class.
 */
class Template_Post_Archive extends FWD_Template {

  // Heading Area
  public $banner;

  // Intro Content
  public $intro;

  // Post Archive Content
  public $archive;

  public function build_components() {

    $this->banner = array(
      'image' => get_field( "{$this->slug}_banner-image" )
    );

    $this->intro = array(
      'heading' => get_field( "{$this->slug}_heading"),
      'content' => get_field( "{$this->slug}_intro-content"),
      'signature' => get_field( "{$this->slug}_signature")
    );

    $this->archive = array(
      'heading' => get_field( "{$this->slug}_archive-heading")
    );

  }

}