<?php
/**
 * Post archive template class.
 */
class Template_Single_Post extends FWD_Template {

  public $desktop_image;
  public $mobile_image;

  public $blog_post;

  public $author;

  public $episode;


  public function build_components() {
    $this->slug = 'post-single';
    $blog_post = get_post( $this->id );
    $author_id = $blog_post->post_author;
    $episode = get_field( 'episode' );

    $this->desktop_image = get_field('desktop_image');
    $this->mobile_image = get_field('mobile_image');

    $this->blog_post = array(
      'id' => $blog_post->ID,
      'title' => $blog_post->post_title,
      'content' => $blog_post->post_content,
      'link' => get_permalink( $blog_post->ID ),
    );

    $this->author = array(
      'avatar' => get_field( 'author_avatar', "user_{$author_id}"),
      'name' => get_the_author_meta( 'display_name', $author_id ),
      'social' => get_field( 'social_networks', "user_{$author_id}"),
    );

    $this->episode = array(
      'id' => $episode->ID,
      'title' => $episode->post_title,
      'link' => get_permalink( $episode->ID )
    );
  }

}