<?php
/**
 * Component for the team grid
 */
use FWD_Helper as FWD;

$team = $COMPONENT;

$block = "team"; // The base block class

$background = $team['background'];
$people = $team['people'];
?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__people">
    <?php
    foreach( $people as $member ):
      $name = $member['name'];
      $title = $member['title'];
      $portrait = $member['portrait'];
    ?>
      <div class="<?php echo $block; ?>__member">
        <?php
        FWD::the_lazy_image( "{$block}__portrait", $portrait, 800, true );
        ?>
        <h3 class="<?php echo $block; ?>__name">
          <?php echo $name; ?>
        </h3>
        <h4 class="<?php echo $block; ?>__title">
          <?php echo $title; ?>
        </h4>
      </div>
    <?php
    endforeach;
    ?>
  </div>
  <?php
  FWD::the_lazy_image( "{$block}__background", $background );
  ?>
</div>