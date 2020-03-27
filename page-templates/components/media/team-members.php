<?php
/**
 * Component for the team grid
 */
use FWD_Helper as FWD;

$team = $COMPONENT;

$block = "team-members"; // The base block class

$background = $team['background'];
$people = $team['people'];
?>
<div class="<?php echo $block; ?>">
  <?php
  FWD::the_lazy_image( "{$block}__background", $background );
  ?>
  <div class="<?php echo $block; ?>__content">
    <?php
    foreach( $people as $section ):
      $title = $section['title'];
      $members = $section['people'];
    ?>
      <div class="<?= $block ?>__section">
        <h2 class="<?= $block ?>__title">
          <span class="<?= $block ?>__flourish"></span>
          <?= $title; ?>
          <span class="<?= $block ?>__flourish"></span>
        </h2>
        <div class="<?= $block ?>__people">
          <?php
          foreach( $members as $member ):
            $name = $member['name'];
            $subtitle = $member['subtitle'];
            $portrait = $member['portrait'];
          ?>
            <div class="<?= $block ?>__person">
              <?php
              FWD::the_lazy_image( "{$block}__portrait", $portrait, 800, true );
              ?>
              <h3 class="<?php echo $block; ?>__name">
                <?php echo $name; ?>
              </h3>
              <h4 class="<?php echo $block; ?>__subtitle">
                <?php echo $subtitle; ?>
              </h4>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
    <?php
    endforeach;
    ?>
  </div>
</div>