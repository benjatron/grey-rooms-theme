<?php
use FWD_Helper as FWD;

$template = new Template_Index;
$slug = $template->slug;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
  <head>
    <?php
    // Header meta, scripts, and styles
    FWD::the_layout( 'header' );
    ?>
  </head>
  <body <?php body_class(); ?>>
    <?php
    // Body open meta and functions
    FWD::the_layout( 'body-open' );
    ?>
    <div id="<?php echo $slug; ?>__wrapper">
    </div>
    <?php
    // Footer meta and scripts
    FWD::the_component( null, 'meta/foot' );
    ?>
  </body>
</html>