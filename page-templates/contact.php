<?php
/**
 * Template Name: Contact
 */
use FWD_Helper as FWD;

$template = new Template_Contact('contact');
$slug = $template->slug;

$navigation = $template->navigation;
$header = $template->header;
$content = $template->content;
$form = $template->form;
$cta = $template->cta;
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

    wp_enqueue_style( $slug, $THEME->style_directory . $slug . '.css', array('universal'), $THEME->theme_version );
    ?>
  </head>
  <body <?php body_class( $slug ); ?>>
    <?php
    // Body open meta and functions
    FWD::the_layout( 'body-open' );
    ?>
    <div id="page-wrapper" class="<?php echo $slug; ?>__wrapper">
      <header class="<?php echo $slug; ?>__header">
        <section class="<?php echo $slug; ?>__navigation">
          <?php
          FWD::the_component( $navigation, 'universal/navigation' );
          ?>
        </section>
        <section class="<?php echo $slug; ?>__background">
          <?php
          FWD::the_component( $header, 'media/header' );
          ?>
        </section>
      </header>
      <main class="<?php echo $slug; ?>__main">
        <section class="<?php echo $slug; ?>__form">
          <?php
          FWD::the_component( $form, 'content/contact-form' );
          ?>
        </section>
        <section class="<?php echo $slug; ?>__content">
          <?php
          FWD::the_component( $content, 'content/contact' );
          ?>
        </section>
        <section class="<?php echo $slug; ?>__cta">
          <?php
          FWD::the_component( $cta, 'universal/cta' );
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
    wp_enqueue_script( $slug, $THEME->script_directory . $slug . '.js', array('universal'), $THEME->theme_version );
    FWD::the_component( null, 'meta/foot' );
    ?>
  </body>
</html>