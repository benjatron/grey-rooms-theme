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
  FWD::the_lazy_image( 'navigation__logo', $logo, 640 );
  
  new FWD_Nav( $menu );
  ?>
</div>