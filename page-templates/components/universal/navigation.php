<?php
/**
 * Universal navigation component
 */
use FWD_Helper as FWD;

$navigation = $COMPONENT;

$logo = $navigation->contents;
$menu = $navigation->menu;
?>
<div class="navigation">
  <?php
  // Logo
  ?>
  <a class="navigation__link" href="<?php echo home_url('/'); ?>" aria-label="Go to homepage">
    <?php
    FWD::the_lazy_image( 'navigation__logo', $logo, 640 );
    ?>
  </a>

  <?php
  // Navigation Menu
  ?>
  <nav class="navigation__links navigation__links--wide">
    <?php
    wp_nav_menu( array(
      'theme_location' => 'primary_nav',
      'menu_class' => 'navigation__nav'
    ));
    ?>
  </nav>

  <?php
  // Drawer Menu
  ?>
  <div class="navigation__drawer">
    <a class="navigation__link navigation__link--drawer" href="#drawer-nav" aria-label="Toggle the navigation drawer">
      <svg class="navigation__icon" viewBox="0 0 16 16">
        <?php FWD_Helper::the_svg('bars'); ?>
      </svg>
    </a>
    <nav id="drawer-nav" class="navigation__links navigation__links--drawer navigation__links--preload">
      <?php
      wp_nav_menu( array(
        'theme_location' => 'primary_nav',
        'menu_class' => 'navigation__nav navigation__nav--drawer navigation__nav--preload'
      ));
      ?>
    </nav>
  </div>
</div>