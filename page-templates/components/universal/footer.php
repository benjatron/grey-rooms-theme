<?php
/**
 * Universal footer component
 */
use FWD_Helper as FWD;

$footer = $COMPONENT;

$block = "footer"; // The base block class

$contents = $footer->contents;

$bg_mobile = $contents['background_mobile'];
$bg_wide = $contents['background_wide'];
$contact = $footer->contact_page;
$overlay = $contents['contact_overlay'];
$quick_links = $footer->menu;
$social = $footer->social_networks;
?>
<div class="<?php echo $block; ?>">
  <?php FWD::the_lazy_image( "{$block}__background {$block}__background--mobile"
  , $bg_mobile, 800); ?>
  <?php FWD::the_lazy_image( "{$block}__background {$block}__background--wide", $bg_wide ); ?>
  <div class="<?php echo $block; ?>__contents">
    <div class="<?php echo $block; ?>__menu">
      <h3 class="<?php echo $block; ?>__menu-headline">
        Quick Links
      </h3>
      <?php new FWD_Nav($quick_links); ?>
    </div>
    <div class="<?php echo $block; ?>__contact">
      <div class="<?php echo $block; ?>__keys">
        <?php FWD::the_lazy_image( 'footer__key-image', $overlay, 800 ); ?>
        <a class="<?php echo $block; ?>__contact-link" href="<?php the_permalink($contact->ID); ?>">
          Contact<br/>Us
        </a>
      </div>
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
    </div>
    <div class="<?php echo $block; ?>__credits">
      <div class="<?php echo $block; ?>__copyright">
        <?php
        echo $contents['copyright'] . ' &copy; ' . date('Y');
        ?>
      </div>
      <div class="<?php echo $block; ?>__design">
        <?php
        echo $contents['design'];
        ?>
      </div>
    </div>
  </div>
</div>
