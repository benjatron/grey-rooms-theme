<?php
/**
 * Episode roll component
 */
use FWD_Helper as FWD;

$content = $COMPONENT;

$episodes = $content->episodes;
$seasons = $content->seasons;

$block = "episodes"; // The base block class
?>
<div class="<?php echo $block; ?>">

  <div class="<?php echo $block; ?>__seasons">
    <h1 class="<?php echo $block; ?>__headline">
      Choose a door...
    </h1>
    <select id="season-selector" class="<?php echo $block; ?>__season-select">
      <?php
      $index = 0;
      foreach( $seasons as $season ):
      $index ++;
      ?>
        <option class="<?php echo $block ?>__option" value="<?php echo $season; ?>" <?php if($index==1){echo 'selected ';} ?>>
          Season <?php echo $season; ?> <svg class="<?php echo $block; ?>__icon" viewBox="0 0 16 16"><?php FWD::the_svg( 'triangle' ); ?></svg>
        </option>
      <?php
      endforeach;
      ?>
    </select>
  </div>

  <div class="<?php echo $block; ?>__episode-roll">
    <?php
    foreach( $episodes as $episode ):
    ?>
      <div class="<?php echo "{$block}__episode {$block}__episode--is-hidden {$block}__episode--preload"; ?>" data-season="<?php echo $episode['season']; ?>">
        <div class="<?php echo $block; ?>__masthead">
          <span class="<?php echo $block; ?>__season">
            Season <?php echo $episode['season']; ?>
          </span>
          <span class="<?php echo $block; ?>__number">
            Ep <?php echo $episode['episode']; ?>
          </span>
          <?php
          // If a room is identified, display it
          if( $episode['room'] ):
          ?>
            <span class="<?php echo $block; ?>__room">
              Room <?php echo $episode['room']; ?>
            </span>
          <?php
          endif;
          ?>
          <h3 class="<?php echo $block; ?>__title">
            <?php echo $episode['title']; ?>
          </h3>
        </div>
        <a class="<?php echo $block; ?>__button" href="<?php echo $episode['link']; ?>">
          Episode Info
        </a>
        <div class="<?php echo $block; ?>__player">
          <iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/<?php echo $episode['libsyn_id']; ?>/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2056cf/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
        </div>
      </div>
    <?php
    endforeach;
    ?>
  </div>

</div>