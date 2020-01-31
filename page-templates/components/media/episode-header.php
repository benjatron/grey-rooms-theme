<?php
/**
 * Episode header component.
 */
use FWD_Helper as FWD;

$header = $COMPONENT;

$block = 'episode-header';

$background = $header->background->contents;
$artwork = $header->artwork;
?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__backgrounds">
    <?php
    FWD::the_lazy_image( "{$block}__background {$block}__background--mobile", $background['background_mobile'], 1024, true );

    FWD::the_lazy_image( "{$block}__background {$block}__background--desktop", $background['background_wide'], 4096, true );
    ?>
  </div>
  <?php
  FWD::the_lazy_image( "{$block}__artwork", $artwork, 2560, true );
  ?>
</div>
