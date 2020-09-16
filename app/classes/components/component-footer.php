<?php
/**
 * Footer component class. The passed $acf_prefix assigns fields that are used 
 * for reference
 */
class Component_Footer extends FWD_Component {

  // Quick link menu arguments
  public $menu;

  // Contact page
  public $contact_page;

  // Social networks
  public $social_networks;

  public function build_component() {

    $general = get_field( 'site_general', 'option' );

    $this->contact_page = $general['contact_page'];
    $this->social_networks = $general['social'];

    $this->menu = array(
      'menu_location' => 'quick_links',
      'menu_class' => 'footer',
      'menu_id' => 'footer-quicklinks',
      'toggles' => false,
      'toggle_icon' => '&plus;',
      'top_links' => true
    );
  }

}