<?php
/**
 * Episode template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Episode extends FWD_Template {

  public function build_components() {

    $this->header = (object) array(
      'background' => new Component_Header( 'site_episode', 'option' ),
      'artwork' => get_field( "{$this->slug}_artwork"),
    );

    $this->body = (object) array(

      'background' => get_field( 'site_general', 'option' )['background_image'],
      'title' => get_field( "{$this->slug}_title" ),
      'room' => get_field( "{$this->slug}_room" ),
      'season' => get_field( "{$this->slug}_season" ),
      'episode' => get_field( "{$this->slug}_episode" ),
      'libsyn' => get_field( "{$this->slug}_libsyn" ),
      'credits' => get_field( "{$this->slug}_credits" ),
      'introduction' => get_field( "{$this->slug}_introduction" ),
      'content' => get_field( "{$this->slug}_content" ),

    );

  }

}
