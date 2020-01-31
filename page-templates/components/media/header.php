<?php
/**
 * Episode header component.
 */
use FWD_Helper as FWD;

$background = $COMPONENT->contents;

$block = 'header';
?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__backgrounds">
    <?php
    FWD::the_lazy_image( "{$block}__background {$block}__background--mobile", $background['background_mobile'], 1024, true );

    FWD::the_lazy_image( "{$block}__background {$block}__background--desktop", $background['background_wide'], 4096, true );
    ?>
  </div>
</div>
