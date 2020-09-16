<?php
/**
 * Component for the intro content of the about template
 */
use FWD_Helper as FWD;

$intro = $COMPONENT;

$block = "about-intro"; // The base block class

$background = $intro['background'];
$headline = $intro['headline'];
$introduction = $intro['introduction'];

?>
<div class="<?php echo $block; ?>">
  <?php
  FWD::the_lazy_image( "{$block}__background", $background );
  ?>
  <h1 class="<?php echo $block; ?>__headline">
    <?php echo $headline; ?>
  </h1>
  <div class="<?php echo $block; ?>__introduction">
    <?php echo $introduction; ?>
  </div>
</div>