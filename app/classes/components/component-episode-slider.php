<?php
/**
 * Podcast episode slider class
 */

class Component_Episode_Slider extends FWD_Component {

  // Episodes
  public $episodes;

  // Social links
  public $social_networks;

  public function build_component() {

    unset($this->contents);

    $this->episodes = $this->set_episodes();

    $this->social_networks = $this->set_social_networks();

  }

  private function set_episodes() {

    // Our returned array
    $episodes = array();

    // Find episode IDs
    $args = array(

      'post_type' => 'page',
      'post_status' => 'publish',
      'meta_key' => '_wp_page_template',
      'meta_value' => 'page-templates/episode.php',
      'orderby' => 'post_date',
      'order' => 'DESC',
      'posts_per_page' => 3,
      'fields' => 'ids'

    );
    $episode_ids = ( new WP_Query( $args ) )->posts;

    // Set episode information
    foreach( $episode_ids as $id ):
      $episodes[] = array(
        'post_id' => $id,
        'title' => get_field( 'episode_title', $id ),
        'link' => get_permalink( $id ),
        'season' => get_field( 'episode_season', $id ),
        'episode' => get_field( 'episode_number', $id ),
        'room' => get_field( 'episode_room', $id ),
        'libsyn_id' => get_field( 'episode_libsyn', $id )
      );
    endforeach;

    return $episodes;

  }

  // Sets the social network data
  private function set_social_networks() {

    $general = get_field( 'site_general', 'option' );

    return $general['social'];

  }

}