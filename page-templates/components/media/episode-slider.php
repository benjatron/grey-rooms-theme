<?php
/**
 * Episode slider component
 */
use FWD_Helper as FWD;

$slider = $COMPONENT;

$block = "episode-slider"; // The base block class

$episodes = $slider->episodes;
$social = $slider->social_networks;
?>
<div class="<?php echo $block; ?>">
  <h2 class="<?php echo $block; ?>__headline">
    ...Which will you choose?
  </h2>
  <div class="<?php echo $block; ?>__social">
    <?php foreach( $social as $social ): ?>
      <a class="<?php echo $block; ?>__social-link" href="<?php echo $social['url']; ?>" rel="noopener noreferrer" target="_blank">
        <svg class="<?php echo $block; ?>__social-icon" viewBox="0 0 16 16">
          <title><?php echo $social['network']['label']; ?></title>
          <?php FWD::the_svg( 'social-' . $social['network']['value'] ); ?>
        </svg>
      </a>
    <?php
    endforeach;
    ?>
  </div>
  <div class="<?php echo $block; ?>__slider">
    <div class="<?php echo $block; ?>__slides">
      <?php
      foreach( $episodes as $slide ):
      ?>
        <div class="<?php echo $block; ?>__slide">
          <div class="<?php echo $block; ?>__masthead">
            <span class="<?php echo $block; ?>__season">
              Season <?php echo $slide['season']; ?>
            </span>
            <span class="<?php echo $block; ?>__episode">
              Ep <?php echo $slide['episode']; ?>
            </span>
            <?php
            // If a room is identified, display it
            if( $slide['room'] ):
            ?>
              <span class="<?php echo $block; ?>__room">
                Room <?php echo $slide; ?>
              </span>
            <?php
            endif;
            ?>
            <h3 class="<?php echo $block; ?>__title">
              <?php echo $slide['title']; ?>
            </h3>
          </div>
          <a class="<?php echo $block; ?>?__button" href="<?php echo $slide['link']; ?>">
            Episode Info
          </a>
        </div>
        <div class="<?php echo $block; ?>__player">
          <iframe style="border: none" src="//html5-player.libsyn.com/embed/episode/id/<?php echo $slide['libsyn_id']; ?>/height/90/theme/custom/thumbnail/yes/direction/backward/render-playlist/no/custom-color/2056cf/" height="90" width="100%" scrolling="no"  allowfullscreen webkitallowfullscreen mozallowfullscreen oallowfullscreen msallowfullscreen></iframe>
        </div>
      <?php
      endforeach;
      ?>
    </div>
  </div>
</div>