<?php
/**
 * Component for the body content of the episode template
 */
use FWD_Helper as FWD;

$body = $COMPONENT;

$block = "episode-body"; // The base block class

$background = $body->background;
$title = $body->title;
$room = $body->room;
$season = $body->season;
$episode = $body->episode;
$libsyn = $body->libsyn;
$credits = $body->credits;
$introduction = $body->introduction;
$content = $body->content;
?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__player-wrapper">
    <div class="<?php echo $block; ?>__masthead">
      <span class="<?php echo $block; ?>__season">
        Season <?php echo $season; ?>
      </span>
      <span class="<?php echo $block; ?>__episode">
        Ep <?php echo $episode; ?>
      </span>
      <?php
      // If a room is identified, display it
      if( $room ):
      ?>
        <span class="<?php echo $block; ?>__room">
          Room <?php echo $slide['room']; ?>
        </span>
      <?php
      endif;
      ?>
      <h3 class="<?php echo $block; ?>__title">
        <?php echo $title; ?>
      </h3>
      <a class="<?php echo $block; ?>__link" href="<?php the_permalink( get_page_by_title( 'Episodes' )->ID ); ?>">
        < All Episodes
      </a>
    </div>
    <div class="<?php echo $block; ?>__player">
      <iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/<?php echo $libsyn; ?>/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2056cf/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
    </div>
  </div>

  <div class="<?php echo $block; ?>__body">
    <div class="<?php echo $block; ?>__credits">
      <?php echo $credits; ?>
    </div>
    <div class="<?php echo $block; ?>__introduction">
      <?php echo $introduction; ?>
    </div>
    <div class="<?php echo $block; ?>__text">
      <?php
      FWD::the_lazy_image( "{$block}__background", $background, 4096, true );
      ?>
      <div class="<?php echo $block; ?>__content">
        <?php echo $content; ?>
      </div>
    </div>
  </div>

</div>