<?php
/** 
 * Template Name: 404 Error
 */
use FWD_Helper as FWD;

$template = new Template_404;
$slug = $template->slug;
$meta = $template->meta;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    FWD::preload( $slug, 'css' );
    FWD::preload( $slug, 'js' );

    FWD::the_layout( $meta, 'header' );

    wp_enqueue_style( $slug );
    ?>
  </head>
  <body <?php body_class( $slug ); ?>>
    <?php
    // Body open meta and functions
    FWD::the_layout( $meta, 'body-open' );
    ?>
    <div id="page-wrapper" class="<?php echo $slug; ?>__wrapper">
      Uh-oh... that page does not exist
    </div>
    <?php
    // Footer meta and scripts
    wp_enqueue_script( $slug );
    FWD::the_component( null, 'meta/foot' );
    ?>
  </body>
</html>