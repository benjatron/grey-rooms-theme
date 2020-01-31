<?php
/**
 * Template Name: Episode
 */
use FWD_Helper as FWD;

$template = new Template_Episode('episode');
$slug = $template->slug;

$navigation = $template->navigation;
$header = $template->header;
$body = $template->body;
$footer = $template->footer;
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
    <div id="<?php echo $slug; ?>__wrapper">
      <header class="<?php echo $slug; ?>__header">
        <section class="<?php echo $slug; ?>__navigation">
          <?php
          FWD::the_component( $navigation, 'universal/navigation' );
          ?>
        </section>
        <section class="<?php echo $slug; ?>__background">
          <?php
          FWD::the_component( $header, 'media/episode-header' );
          ?>
        </section>
      </header>
      <main class="<?php echo $slug; ?>__main">
        <section class="<?php echo $slug; ?>__episode-body">
          <?php
          FWD::the_component( $body, 'content/episode-body' );
          ?>
        </section>
      </main>
      <footer class="<?php echo $slug; ?>__footer">
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

<?php
// iframe example
// <iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/12539708/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2056cf/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>