<?php
/**
 * Base component class
 */

class FWD_Component {

  // The ACF field for the component
  public $acf_field;

  // The ID of the post using the component for ACF purposes
  public $acf_id;

  // Contents from the ACF passed to the component
  public $contents;

  public function __construct( $acf_field, $id ) {

    $this->acf_field = $acf_field;
    if( isset( $id ) ):
      $this->acf_id = $id;
    else:
      $this->acf_id = get_the_ID();
    endif;

    $this->contents = get_field( $this->acf_field, $this->acf_id );

    $this->build_component();
  }

  // Builds the component. Intended to be overwritten through extension
  public function build_component() {}

}