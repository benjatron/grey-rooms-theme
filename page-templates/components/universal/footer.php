<?php
/**
 * Universal footer component
 */
use FWD_Helper as FWD;

$footer = $COMPONENT;

$contents = $footer->contents;

$bg_mobile = $contents['background_mobile'];
$bg_wide = $contents['background_wide'];
$contact = $footer->contact_page;
$overlay = $contents['contact_overlay'];
$quick_links = $footer->menu;
$social = $footer->social_networks;
?>
<div class="footer">
  <?php FWD::the_lazy_image( 'footer__background footer__background--mobile', $bg_mobile, 800); ?>
  <?php FWD::the_lazy_image( 'footer__background footer__background--wide', $bg_wide ); ?>
  <div class="footer__contents">
    <div class="footer__menu">
      <h3 class="footer__menu-headline">
        Quick Links
      </h3>
      <?php
      new FWD_Nav($quick_links);
      ?>
    </div>
    <div class="footer__contact">
      <div class="footer__keys">
        <?php
        FWD::the_lazy_image( 'footer__overlay', $overlay, 800 );
        ?>
        <a class="footer__contact-link" href="<?php the_permalink($contact->ID); ?>">
          Contact Us
        </a>
      </div>
      <div class="footer__social">
        <?php
        foreach( $social as $social ):
        ?>
          <a class="footer__social-link" href="<?php echo $social['url']; ?>" rel="noopener noreferrer" target="_blank">
            <svg class="footer__social-icon" viewBox="0 0 16 16">
              <title><?php echo $social['network']['label']; ?></title>
              <?php
              FWD::the_svg( 'social-' . $social['network']['value'] );
              ?>
            </svg>
          </a>
        <?php
        endforeach;
        ?>
      </div>
    </div>
    <div class="footer__credits">
      <div class="footer__copyright">
        <?php
        echo $contents['copyright'] . ' &copy; ' . date('Y');
        ?>
      </div>
      <div class="footer__design">
        <?php
        echo $contents['design'];
        ?>
      </div>
    </div>
  </div>
</div>
