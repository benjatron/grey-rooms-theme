<?php
/**
 * Recent posts
 */
use FWD_Helper as FWD;

$exclude = $COMPONENT['id'];
$query = new WP_Query( array(
  // 'post__not_in' => array( $exclude ),
  'post_status' => 'publish',
  'posts_per_page' => 3
));

$link = get_permalink( get_option( 'page_for_posts' ) );
if( $query->have_posts() ):
?>
<div class="recent-posts">
  <h2 class="recent-posts__headline">
    Wanna Read More? Check These Out
  </h2>
  <a class="recent-posts__back" href="<?= $link ?>">
    < Back to News
  </a>
  <div class="recent-posts__collection">
    <?php
    while( $query->have_posts() ): $query->the_post();
      $image = get_field( 'mobile_image' );
      $title = get_the_title();
      $excerpt = get_the_excerpt();
      $link = get_permalink();
    ?>
      <a class="recent-posts__link" href="<?= $link ?>">
        <div class="recent-posts__item">
          <img class="recent-posts__image lazyload lazyload--blurUp"
            data-sizes="auto" alt="<?= $image['alt'] ?>"
            data-srcset="<?= FWD::the_srcset( $image, 640 ) ?>"
          />
          <h3 class="recent-posts__title">
            <?= $title ?>
          </h3>
          <div class="recent-posts__excerpt">
            <?= $excerpt ?>
          </div>
        </div>
      </a>
    <?php
    endwhile;
    wp_reset_postdata();
    ?>
  </div>
</div>
<?php
endif;