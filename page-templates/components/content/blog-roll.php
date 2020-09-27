<?php
/**
 * Blog roll component
 */
use FWD_Helper as FWD;

$archive = $COMPONENT;

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$args = array( 
  'post_type' => array( 'post' ),
  'post_status' => array( 'publish' ),
  'posts_per_page' => '9',
  'fields' => 'ids',
  'paged' => $paged
);
$query = new WP_Query( $args );
$posts = $query->posts;

$pagination_args = array(
   'base' => str_replace( 9999, '%#%', esc_url( get_pagenum_link( 9999 ) ) ),
   'end_size' => 3,
   'format' => '?paged=%#%',
   'current' => max( 1, get_query_var( 'paged' ) ),
   'total' => $query->max_num_pages,
   'type' => 'array'
);
$paginatedLinks = paginate_links( $pagination_args );
$previousLink = get_previous_posts_page_link();
$nextLink = get_next_posts_page_link();
?>
  <div class="blog-roll">
    <h2 class="blog-roll__heading">
      <span class="blog-roll__decoration">&mdash;</span>
      <?= $archive['heading'] ?>
      <span class="blog-roll__decoration">&mdash;</span>
    </h2>
    <div class="blog-roll__collection">
      <?php
      foreach( $posts as $preview ):
        $url = get_permalink( $preview );
        $title = get_the_title( $preview );
        $excerpt = get_the_excerpt( $preview );
        $image = get_field( 'mobile_image', $preview );
      ?>
        <a class="blog-roll__link" href="<?= $url ?>">
          <div class="blog-roll__item">
            <img class="blog-roll__image lazyload lazyload--blurUp"
              data-sizes="auto" alt="<?= $image['alt'] ?>"
              src="<?= $image['sizes']['preload'] ?>"
              data-srcset="<?= FWD::the_srcset( $image, 640 ) ?>"
            />
            <h3 class="blog-roll__title">
              <?= $title ?>
            </h3>
            <p class="blog-roll__excerpt">
              <?= $excerpt ?>
            </p>
          </div>
        </a>
      <?php
      endforeach;
      ?>
    </div>
    <?php
    if( $paginatedLinks ):
    ?>
      <div class="blog-roll__pagination">
        <div class="blog-roll__previous">
          <a class="blog-roll__page-link blog-roll__page-link--previous" href="<?= $previousLink ?>">
            Back
          </a>
        </div>
        <div class="blog-roll__pages">
          <?php
          for( $i<0; $i<count($paginatedLinks); $i++):
            echo $paginatedLinks[$i];
          endfor;
          ?>
        </div>
        <div class="blog-roll__next">
          <a class="blog-roll__page-link blog-roll__page-link--previous" href="<?= $nextLink ?>">
            Next
          </a>
        </div>
      </div>
    <?php
    endif;
    ?>
  </div>
<?php
wp_reset_postdata();
