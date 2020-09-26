<?php
use FWD_Helper as FWD;

$template = new Template_Post_Archive( 'post-archive' );
$slug = $template->slug;

$navigation = $template->navigation;
$banner = $template->banner;
$intro = $template->intro;
$archive = $template->archive;
$cta = $template->cta;
$footer = $template->footer;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    FWD::preload( 'archive-post', 'css' );
    FWD::preload( 'archive-post', 'js' );

    FWD::the_layout( 'header' );

    wp_enqueue_style( 'archive-post' );
    ?>
  </head>
  <body <?php body_class( $slug ); ?>>
    <?php
    // Body open meta and functions
    FWD::the_layout( 'body-open' );
    ?>
    <div id="page-wrapper" class="<?= $slug ?>__wrapper">
      <header class="<?= $slug; ?>__header">
        <section class="<?= $slug; ?>__navigation">
          <?php
          FWD::the_component( $navigation, 'universal/navigation' );
          ?>
        </section>
        <section class="<?= $slug ?>__banner">
          <img class="<?= "{$slug}__background {$slug}__background--mobile lazyload lazyload--blurUp" ?>"
            data-sizes="auto" alt="<?= $banner['mobile']['alt'] ?>"
            src="<?= $banner['mobile']['sizes']['preload'] ?>"
            data-srcset="<?= FWD::the_srcset( $banner['mobile'], 1024 ) ?>"
          />
          <img class="<?= "{$slug}__background {$slug}__background--desktop lazyload lazyload--blurUp" ?>"
            data-sizes="auto" alt="<?= $banner['desktop']['alt'] ?>"
            src="<?= $banner['desktop']['sizes']['preload'] ?>"
            data-srcset="<?= FWD::the_srcset( $banner['desktop'] ) ?>"
          />
        </section>
      </header>
      <main class="<?= $slug ?>__main">
        <section class="<?= $slug ?>__intro">
          <h1 class="<?= $slug ?>__headline">
            <?= $intro['heading'] ?>
          </h1>
          <?= $intro['content'] ?>
          <img class="<?= $slug ?>__signature lazyload lazyload--blurUp"
            alt="<?= $intro['signature']['alt'] ?>" data-sizes="auto"
            src="<?= $intro['signature']['sizes']['preload'] ?>"
            data-srcset="<?= FWD::the_srcset( $intro['signature'],  ) ?>"
          />
        </section>
        <section class="<?= $slug ?>__blog-roll">
          <?php
          FWD::the_component( $archive, 'content/blog-roll' );
          ?>
        </section>
        <section class="<?= $slug; ?>__cta">
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
    wp_enqueue_script( 'archive-post' );
    FWD::the_component( null, 'meta/foot' );
    ?>
  </body>
</html>