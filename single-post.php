<?php
use FWD_Helper as FWD;

$template = new Template_Single_Post;
$slug = $template->slug;

$navigation = $template->navigation;

$desktop = $template->desktop_image;
$mobile = $template->mobile_image;

$subhead = $template->subhead;

$blog_post = $template->blog_post;
$author = $template->author;
$episode = $template->episode;

$cta = $template->cta;
$footer = $template->footer;

$email_share = 'mailto:?subject=The%20Grey%20Rooms&body=Check%20out%20this%20from%20the%20Grey%20Rooms%3A%0D' . urlencode(get_permalink());
$facebook_share = 'https://www.facebook.com/sharer/sharer.php?u=' . urlencode(get_permalink());
$twitter_share = 'https://twitter.com/intent/tweet?url=' . urlencode(get_permalink());
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    FWD::preload( $slug, 'css' );
    FWD::preload( $slug, 'js' );

    FWD::the_layout( 'header' );

    wp_enqueue_style( $slug );
    ?>
  </head>
  <body <?php body_class( $slug ); ?>>
    <?php
    // Body open meta and functions
    FWD::the_layout( 'body-open' );
    ?>
    <div id="page-wrapper" class="<?php echo $slug; ?>__wrapper">
      <header class="<?= $slug; ?>__header">
        <section class="<?= $slug; ?>__navigation">
          <?php
          FWD::the_component( $navigation, 'universal/navigation' );
          ?>
        </section>
        <section class="<?= $slug ?>__banner">
          <img class="<?= "{$slug}__background {$slug}__background--mobile lazyload lazyload--blurUp" ?>"
            data-sizes="auto" alt="<?= $mobile['alt'] ?>"
            src="<?= $mobile['sizes']['preload'] ?>"
            data-srcset="<?= FWD::the_srcset( $mobile, 1024 ) ?>"
          />
          <img class="<?= "{$slug}__background {$slug}__background--desktop lazyload lazyload--blurUp" ?>"
            data-sizes="auto" alt="<?= $desktop['alt'] ?>"
            src="<?= $desktop['sizes']['preload'] ?>"
            data-srcset="<?= FWD::the_srcset( $desktop ) ?>"
          />
        </section>
      </header>
      <main class="<?= $slug ?>__main">
        <section class="<?= $slug ?>__top-links">
          <a class="<?= $slug ?>__link <?= $slug ?>__link--back" href="<?= get_permalink( get_option( 'page_for_posts' ) ) ?>">
            <div class="<?= $slug ?>__back">
              < Back to News
            </div>
          </a>
          <div class="<?= $slug ?>__top-sharing">
            <a class="<?= $slug ?>__share <?= $slug ?>__share--email" href="<?= $email_share ?>" target="_blank" rel="noopener noreferrer">
              <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--email" viewBox="0 0 16 16">
                <?= FWD::get_svg('social-email') ?>
              </svg>
            </a>
            <a class="<?= $slug ?>__share <?= $slug ?>__share--facebook" href="<?= $facebook_share ?>" target="_blank" rel="noopener noreferrer">
              <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--facebook" viewBox="0 0 16 16">
                <?= FWD::get_svg('social-facebook') ?>
              </svg>
            </a>
            <a class="<?= $slug ?>__share <?= $slug ?>__share--twitter" href="<?= $twitter_share ?>" target="_blank" rel="noopener noreferrer">
              <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--twitter" viewBox="0 0 16 16">
                <?= FWD::get_svg('social-twitter') ?>
              </svg>
            </a>
          </div>
        </section>
        <section class="<?= $slug ?>__post">
          <h1 class="<?= $slug ?>__headline">
            <?= $blog_post['title'] ?>
          </h1>
          <?php
          if( $subhead ):
          ?>
            <h2 class="<?= $slug ?>__subhead">
              <?= $subhead ?>
            </h2>
          <?php
          endif;
          ?>
          <article class="<?= $slug ?>__body">
            <?= the_content(); ?>
          </article>
          <div class="<?= $slug ?>__extras">
            <div class="<?= $slug ?>__author-box">
              <?php
              FWD::the_component( $author, 'media/author-box' );
              ?>
            </div>
            <button class="<?= $slug ?>__button" action="<?= $episode['link'] ?>" aria-label="<?= $episode['title'] ?>">
              Listen to My Episode
            </button>
          </div>
        </section>
        <section class="<?= $slug ?>__bottom">
          <div class="<?= $slug ?>__bottom-sharing">
            <span class="<?= $slug ?>__share-now">
              Share Now
            </span>
            <a class="<?= $slug ?>__share <?= $slug ?>__share--email" href="<?= $email_share ?>" target="_blank" rel="noopener noreferrer">
                <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--email" viewBox="0 0 16 16">
                  <?= FWD::get_svg('social-email') ?>
                </svg>
              </a>
              <a class="<?= $slug ?>__share <?= $slug ?>__share--facebook" href="<?= $facebook_share ?>" target="_blank" rel="noopener noreferrer">
                <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--facebook" viewBox="0 0 16 16">
                  <?= FWD::get_svg('social-facebook') ?>
                </svg>
              </a>
              <a class="<?= $slug ?>__share <?= $slug ?>__share--twitter" href="<?= $twitter_share ?>" target="_blank" rel="noopener noreferrer">
                <svg class="<?= $slug ?>__icon <?= $slug ?>__icon--twitter" viewBox="0 0 16 16">
                  <?= FWD::get_svg('social-twitter') ?>
                </svg>
              </a>
          </div>
        </section>
        <section class="<?= $slug ?>__recent">
          <?php
          FWD::the_component( $blog_post, 'content/recent-posts' );
          ?>
        </section>
        <section class="<?php echo $slug; ?>__cta">
          <?php
          FWD::the_component( $cta, 'universal/cta' );
          ?>
        </section>
      </main>
      <footer class="<?= $slug; ?>__footer">
        <?php
        FWD::the_component( $footer, 'universal/footer' );
        ?>
      </footer>
    </div>
    <?php
    // Footer meta and scripts
    wp_enqueue_script( $slug );
    FWD::the_component( null, 'meta/foot' );
    ?>
  </body>
</html>