<?php
use FWD_Helper as FWD;
use FWD_Component as Component;

// ! Do not delete or modify this block
$template = new FWD_Page;

get_header();

$template->menu_args = array(
  'menu_location' => 'primary_nav',
  'menu_class' => 'nav',
  'menu_id' => 'primary_nav',
  'toggles' => false,
  'toggle_icon' => '&plus;',
  'top_links' => true
);
FWD_Nav::the_menu( $template->menu_args );

FWD::preload('universal', 'css');

// Nav component vars
$nav = new Component;
$nav->variable = 'testing... 1, 2, 3';

// Footer component vars
$footer = new Component;
$footer->whatever = 'something';
?>
<?php
FWD::the_component( 'test', 'test2' );
FWD::the_component( 'navigation', 'footer' );
?>
<?php
get_footer();


// Article component
if( get_field( 'newsVideos_article_article_body' ) ):
?>
  <section class="content-videos__body">
    <?php
    fwd_query_var( 'headline', 'newsVideos_article_article_headline' );
    fwd_query_var( 'body', 'newsVideos_article_article_body' );
    get_component( 'general', 'article' );
    ?>
  </section>
<?php
endif;

if( isset($component) ):
?>
  <section class="content-videos__body">
    <?php FWD::component( 'general', 'article' ); ?>
  </section>
<?php
endif;