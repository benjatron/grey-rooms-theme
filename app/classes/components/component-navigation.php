<?php
/**
 * Navigation component class. The passed $acf_prefix assigns fields that are 
 * used for reference
 */
class Component_Navigation extends FWD_Component {

  // Navigation menu arguments
  public $menu;

  public function build_component() {

    // Limits the passed data to just the logo content
    $this->contents = $this->contents['logo'];

    $this->menu = array(
      'menu_location' => 'primary_nav',
      'menu_class' => 'navigation',
      'menu_id' => 'header-navigation',
      'toggles' => false,
      'toggle_icon' => '&plus;',
      'top_links' => true
    );
  }

}