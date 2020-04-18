<?php
/**
 * Connect template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Connect extends FWD_Template {

  public function build_components() {

    $this->header = new Component_Header( "{$this->slug}_header" );
    $this->headline = get_field( "{$this->slug}_headline" );

    $this->connect = array(

      "discord" => get_field( "{$this->slug}_discord" ),
      "patreon" => get_field( "{$this->slug}_patreon" ),
      "social" => get_field( "{$this->slug}_social" ),
      "merchandise" => get_field( "{$this->slug}_merchandise" ),
      "paypal" => get_field( "{$this->slug}_paypal" )

    );

  }
}
