<?php
/**
 * Component for the body content of the homepage
 */
use FWD_Helper as FWD;

$body = $COMPONENT;

$block = "homepage-body"; // The base block class

$background = $body['background'];
$heading = $body['heading'];
$subhead = $body['subhead'];
$bottom = $body['bottom'];
?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__text">
    <h2 class="<?php echo $block; ?>__heading">
      <?php echo $heading; ?>
    </h2>
    <h3 class="<?php echo $block; ?>__subhead">
      <?php echo $subhead; ?>
    </h3>
    <h3 class="<?= $block; ?>__bottom">
      <?= $bottom; ?>
    </h3>
  </div>
  <?php FWD::the_lazy_image( "{$block}__background", $background ); ?>
</div>