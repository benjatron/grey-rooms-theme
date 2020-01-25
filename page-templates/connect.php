<?php
/**
 * Template Name: Connect
 */
use FWD_Helper as FWD;

$template = new Template_Connect('connect');
$slug = $template->slug;

$navigation = $template->navigation;
$header = $template->header;
$headline = $template->headline;
$connect = $template->connect;
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
          FWD::the_component( $header, 'media/header-background' );
          ?>
        </section>
      </header>
      <main class="<?php echo $slug; ?>__main">
        <?php var_dump($template); ?>
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