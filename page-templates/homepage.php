<?php
/**
 * Template Name: Homepage
 * Description: Layout for the homepage / front page of the website
 *
 * This layout consists of:
 *    Header
 *    Main body
 *    Footer
 *
 * The header contains:
 *
 * The main body consists of:
 *
 * The footer contains:
 */
?>
<!doctype html>
<html <?php language_attributes(); ?> >
  <head>
    <?php
    // Header meta, scripts, and styles
    fwd_preload( 'homepage', 'css' );
    fwd_preload( 'homepage', 'js' );

    get_layout( 'header' );

    wp_enqueue_style( 'homepage' );
    ?>
  </head>

  <body <?php body_class( 'homepage' ); ?>>
    <?php
    // Body open meta and functions
    get_layout( 'body-open' );
    ?>
    <header class="homepage__header">
    </header>

    <main class="homepage__main">
    </main>

    <footer class="homepage__footer">
    </footer>
    <?php
    wp_enqueue_script( 'homepage' );
    get_component( 'meta', 'foot' );
    ?>
  </body>
</html>