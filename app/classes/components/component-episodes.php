<?php
/**
 * Episodes picker component class
 */

class Component_Episodes extends FWD_Component {

  public function build_component() {

    unset($this->contents);

    $this->episodes = $this->set_episodes();
    $this->seasons = $this->set_seasons($this->episodes);

  }

  public function set_episodes() {

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
      'posts_per_page' => -1, // No limit
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

  public function set_seasons( $episodes ) {

    // Our returned array
    $seasons = array();

    foreach( $episodes as $episode ):
      if( in_array( $episode['season'], $seasons ) ):
        continue;
      else:
        $seasons[] = $episode['season'];
      endif;
    endforeach;

    return $seasons;

  }

}