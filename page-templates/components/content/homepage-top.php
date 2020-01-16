<?php
/**
 * Component at the top of the homepage
 */
use FWD_Helper as FWD;

$top = $COMPONENT;

$block = "homepage-top"; // The base block class

$background = $top['background'];
$disclaimer = $top['disclaimer'];
$slider = $top['slider'];
$slogan = $top['slogan'];
?>
<div class="<?php echo $block; ?>">
  <?php FWD::the_lazy_image( "{$block}__background", $background ); ?>
  <div class="<?php echo $block; ?>__disclaimer">
    <?php echo $disclaimer; ?>
  </div>
  <div class="<?php echo $block; ?>__slider">
    <?php FWD::the_component( $slider, 'media/episode-slider' ); ?>
  </div>
  <div class="<?php echo $block; ?>__slogan">
    <?php echo $slogan; ?>
  </div>
</div>