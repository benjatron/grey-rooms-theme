<?php
/**
 * Call-to-action component
 */

use FWD_Helper as FWD;

$cta = $COMPONENT;

$block = "cta"; // The base block class

$contents = $cta->contents;

$headline = $contents['headline'];
$buttons = $contents['buttons'];
?>
<div class="<?php echo $block; ?>">
  <h2 class="<?php echo $block; ?>__headline">
    <?php echo $headline; ?>
  </h2>
  <div class="<?php echo $block; ?>__buttons">
    <?php
    foreach( $buttons as $button ):
      $label = $button['label'];
      $link = get_permalink( $button['page']->ID );
    ?>
      <a class="<?php echo $block; ?>__link" href="<?php echo $link; ?>">
        <?php echo $label; ?>
      </a>
    <?php
    endforeach;
    ?>
  </div>
</div>
