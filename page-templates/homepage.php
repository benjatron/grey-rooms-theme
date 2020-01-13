<?php
/**
 * Template Name: Homepage
 */
use FWD_Helper as FWD;

$template = new Template_Homepage('homepage');
$slug = $template->slug;

$navigation = $template->navigation;
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
        <?php
        FWD::the_component( $navigation, 'universal/navigation' );
        ?>
      </header>
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