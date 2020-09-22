<?php
use FWD_Helper as FWD;

$template = new Template_Post_Archive( 'post-archive' );
$slug = $template->slug;

$navigation = $template->navigation;
$banner = $template->banner;
$intro = $template->intro;
$archive = $template->archive;
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
    <div id="<?= $slug ?>__wrapper">
      <header class="<?= $slug; ?>__header">
        <section class="<?= $slug; ?>__navigation">
          <?php
          FWD::the_component( $navigation, 'universal/navigation' );
          ?>
        </section>
      </header>
      <main class="<?= $slug ?>__main">
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