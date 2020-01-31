<?php
/**
 * Contact template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Contact extends FWD_Template {

  public function build_components() {

    $this->header = new Component_Header( "{$this->slug}_header" );
    $this->content = get_field( "{$this->slug}_content" );
    $this->form = get_field( "{$this->slug}_form" );

  }

}
