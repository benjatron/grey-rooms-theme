<?php
/**
 * Seasons template class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Template_Seasons extends FWD_Template {

  public function build_components() {

    $this->background = get_field( "{$this->slug}_background" );

    $this->episodes = new Component_Episodes();

  }

}
