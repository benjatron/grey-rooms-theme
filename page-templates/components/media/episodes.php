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
      foreach( $seasons as $season ):
      ?>
        <option value="season-<?php echo $season; ?>">
          Season <?php echo $season; ?>
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
      <div class="<?php echo $block; ?>__episode" data-season="<?php echo $episode['season']; ?>">
        <div class="<?php echo $block; ?>__masthead">
          <span class="<?php echo $block; ?>__season">
            Season <?php echo $episode['season']; ?>
          </span>
          <span class="<?php echo $block; ?>__episode">
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
        <a class="<?php echo $block; ?>?__button" href="<?php echo $episode['link']; ?>">
          Episode Info
        </a>
      </div>
      <div class="<?php echo $block; ?>__player">
        <iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/<?php echo $episode['libsyn_id']; ?>/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2056cf/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
      </div>
    <?php
    endforeach;
    ?>
  </div>

</div>