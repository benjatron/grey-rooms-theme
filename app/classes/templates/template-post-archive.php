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
    $this->slug = 'post-archive';
    $id = get_option( 'page_for_posts' );
    $this->banner = array(
      'desktop' => get_field( "{$this->slug}_banner-desktop", $id ),
      'mobile' => get_field( "{$this->slug}_banner-mobile", $id ),
    );

    $this->intro = array(
      'heading' => get_field( "{$this->slug}_heading", $id ),
      'content' => get_field( "{$this->slug}_intro-content", $id ),
      'signature' => get_field( "{$this->slug}_signature", $id )
    );

    $this->archive = array(
      'heading' => get_field( "{$this->slug}_archive-heading", $id )
    );

  }

}