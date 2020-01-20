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
?>
<div class="<?php echo $block; ?>">
  <?php FWD::the_lazy_image( "{$block}__background", $background ); ?>
  <div class="<?php echo $block; ?>__text">
    <h2 class="<?php echo $block; ?>__heading">
      <?php echo $heading; ?>
    </h2>
    <h3 class="<?php echo $block; ?>__subhead">
      <?php echo $subhead; ?>
    </h3>
  </div>
</div>