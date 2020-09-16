<?php
/**
 * Connect page main content component
 */
use FWD_Helper as FWD;

$connect = $COMPONENT;

$block = "connect-body"; // The base block class

$discord = $connect['discord'];
$patreon = $connect['patreon'];
$social = $connect['social'];
$merchandise = $connect['merchandise'];
$paypal = $connect['paypal'];
?>
<div class="<?php echo $block; ?>">

  <div class="<?= $block; ?>__masthead <?= $block; ?>__masthead--mobile">
    <svg class="<?= $block; ?>__top-border" viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-border' ); ?>
    </svg>
    <svg class="<?= $block; ?>__menu-logo" viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-logo' ); ?>
    </svg>
  </div>
  <div class="<?= $block; ?>__masthead <?= $block; ?>__masthead--desktop">
    <div class="<?= $block; ?>__masthead-top">
      <svg class="<?= $block; ?>__corner <?= $block; ?>__corner--top-left" 
      viewBox="0 0 16 16">
        <?php FWD::the_svg( 'connect-corner' ); ?>
      </svg>
      <svg class="<?= $block; ?>__spacer-horizontal" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width="100%" height=".15rem" y="3.5"></rect>
        <rect class="cls-1" width="100%" height=".15rem" y="12.75"></rect>
      </svg>
      <svg class="<?= $block; ?>__cross <?= $block; ?>__cross--horizontal <?= $block; ?>__cross--top" viewBox="0 0 16 16">
        <?php FWD::the_svg( 'connect-cross' ); ?>
      </svg>
      <svg class="<?= $block; ?>__spacer-horizontal" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width="100%" height=".15rem" y="3.5"></rect>
        <rect class="cls-1" width="100%" height=".15rem" y="12.75"></rect>
      </svg>
      <svg class="<?= $block; ?>__corner <?= $block; ?>__corner--top-right" viewBox="0 0 16 16">
        <?php FWD::the_svg( 'connect-corner' ); ?>
      </svg>
    </div>
    <div class="<?= $block; ?>__masthead-lower">
      <svg class="<?= $block; ?>__spacer-vertical <?= $block; ?>__spacer-vertical--left" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width=".15rem" height="100%" x="3.5"></rect>
        <rect class="cls-1" width=".15rem" height="100%" x="12.75"></rect>
      </svg>
      <svg class="<?= $block; ?>__desktop-logo" viewBox="0 0 16 6">
        <?php FWD::the_svg( 'connect-logo' ); ?>
      </svg>
      <svg class="<?= $block; ?>__spacer-vertical <?= $block; ?>__spacer-vertical--right" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width=".15rem" height="100%" x="3.5"></rect>
        <rect class="cls-1" width=".15rem" height="100%" x="12.75"></rect>
      </svg>
    </div>
  </div>

  <div class="<?= $block; ?>__content">
    <div class="<?php echo $block; ?>__left-edge">
      <svg class="<?= $block; ?>__spacer-vertical <?= $block; ?>__spacer-vertical--left" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width=".15rem" height="100%" x="3.5"></rect>
        <rect class="cls-1" width=".15rem" height="100%" x="12.75"></rect>
      </svg>
    </div>
  
    <div class="<?php echo $block; ?>__left">
  
      <?php // Discord ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--discord">
        <h2 class="<?php echo $block; ?>__heading">
          - <?php echo $discord['heading']; ?> -
        </h2>
        <div class="<?php echo $block; ?>__description">
          <?php echo $discord['description']; ?>
        </div>
        <a class="<?php echo $block; ?>__link" href="<?php echo $discord['button_link']; ?>">
          <svg class="<?php echo $block; ?>__icon" viewBox="0 0 16 16">
            <?php FWD::the_svg( 'social-discord' ); ?>
          </svg>
          <h3 class="<?php echo $block; ?>__label">
            <?php echo $discord['button_label']; ?>
          </h3>
        </a>
      </div>
  
      <?php // Patreon ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--patreon">
        <h2 class="<?php echo $block; ?>__heading">
          - <?php echo $patreon['heading']; ?> -
        </h2>
        <div class="<?php echo $block; ?>__description">
          <?php echo $patreon['description']; ?>
        </div>
        <a class="<?php echo $block; ?>__link" href="<?php echo $patreon['button_link']; ?>">
          <svg class="<?php echo $block; ?>__icon" viewBox="0 0 16 16">
            <?php FWD::the_svg( 'social-patreon' ); ?>
          </svg>
          <h3 class="<?php echo $block; ?>__label">
            <?php echo $patreon['button_label']; ?>
          </h3>
        </a>
      </div>
  
      <?php // Social ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--social">
        <h2 class="<?php echo $block; ?>__heading">
          - <?php echo $social['heading']; ?> -
        </h2>
        <div class="<?php echo $block; ?>__social-networks">
          <?php
          foreach( $social['networks'] as $network ):
            $name = $network['network'];
            $headline = $network['headline'];
            $description = $network['description'];
            $url = $network['url'];
          ?>
            <div class="<?php echo $block; ?>__network <?php echo $block; ?>__network--<?php echo $name; ?>">
              <a class="<?php echo $block; ?>__link <?php echo $block; ?>__link--social" href="<?php echo $url; ?>">
                <svg class="<?php echo $block; ?>__icon <?php echo $block; ?>__icon--social" viewBox="0 0 16 16">
                  <?php FWD::the_svg( 'social-' . $name ); ?>
                </svg>
              </a>
              <div class="<?php echo $block; ?>__social-content">
                <h3 class="<?php echo $block; ?>__heading <?php echo $block; ?>__heading--social">
                  <?php echo $headline; ?>
                </h3>
                <div class="<?php echo $block; ?>__description <?php echo $block; ?>__description--social">
                  <?php echo $description; ?>
                </div>
              </div>
            </div>
          <?php
          endforeach;
          ?>
        </div>
      </div>
  
    </div>
  
    <div class="<?php echo $block; ?>__middle">
      <svg class="<?= $block; ?>__key-1" viewBox="0 0 16 16">
        <?php FWD::the_svg( 'connect-key01' ); ?>
      </svg>
      <svg class="<?= $block; ?>__middle-spacer" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width=".15rem" height="100%" x="7.925"></rect>
      </svg>
      <svg class="<?= $block; ?>__key-2" viewBox="0 0 16 16">
        <?php FWD::the_svg( 'connect-key02' ); ?>
      </svg>
    </div>
  
    <div class="<?php echo $block; ?>__right">
  
      <?php // Merchandise ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--merchandise">
        <h2 class="<?php echo $block; ?>__heading">
          <?php echo $merchandise['headline']; ?>
        </h2>
        <h3 class="<?php echo $block; ?>__subhead">
          <?php echo $merchandise['subhead']; ?>
        </h3>
        <div class="<?php echo $block; ?>__products">
          <?php
          foreach( $merchandise['products'] as $product ):
            $image = $product['image'];
            $url = $product['url'];
          ?>
            <a class="<?php echo $block; ?>__product-link" href="<?php echo $url; ?>" target="_blank" rel="noopener noreferrer">
              <?php
              FWD::the_lazy_image( "{$block}__product-image", $image, 640, true );
              ?>
            </a>
          <?php
          endforeach;
          ?>
        </div>
      </div>
  
      <?php // PayPal ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--paypal">
        <h2 class="<?php echo $block; ?>__heading">
          <?php echo $paypal['headline']; ?>
        </h2>
        <a class="<?php echo $block; ?>__link <?php echo $block; ?>__link--paypal" href="<?php echo $paypal['url']; ?>">
          <svg class="<?php echo $block; ?>__icon <?php echo $block; ?>__icon--paypal" viewBox="0 0 16 4">
            <?php FWD::the_svg( 'connect-paypal' ); ?>
          </svg>
        </a>
      </div>
  
      <?php // Advertising ?>
      <div class="<?php echo $block; ?>__section <?php echo $block; ?>__section--advertising">
        <a class="<?php echo $block; ?>__link <?php echo $block; ?>__link--advertising" href="mailto:advertising@thegreyrooms.com">
          <svg class="<?= $block; ?>__icon <?= $block; ?>__icon--advertising" viewBox="0 0 16 16">
            <?php FWD::the_svg( 'connect-advertise' ); ?>
          </svg>
        </a>
      </div>
  
    </div>
  
    <div class="<?php echo $block; ?>__right-edge">
      <svg class="<?= $block; ?>__spacer-vertical <?= $block; ?>__spacer-vertical--left" preserveAspectRatio="none" viewBox="0 0 16 16">
        <rect class="cls-1" width=".15rem" height="100%" x="3.5"></rect>
        <rect class="cls-1" width=".15rem" height="100%" x="12.75"></rect>
      </svg>
    </div>
  </div>

  <div class="<?php echo $block; ?>__footer <?= $block; ?>__footer--mobile">
    <svg class="<?= $block; ?>__bottom-border" viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-border' ); ?>
    </svg>
  </div>
  <div class="<?php echo $block; ?>__footer <?= $block; ?>__footer--desktop">
    <svg class="<?= $block; ?>__corner <?= $block; ?>__corner--bottom-left" 
    viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-corner' ); ?>
    </svg>
    <svg class="<?= $block; ?>__spacer <?= $block; ?>__spacer-horizontal <?= $block; ?>__spacer-horizontal--bottom" preserveAspectRatio="none" viewBox="0 0 16 16">
      <rect class="cls-1" width="100%" height=".15rem" y="3.5"></rect>
      <rect class="cls-1" width="100%" height=".15rem" y="12.75"></rect>
    </svg>
    <svg class="<?= $block; ?>__cross <?= $block; ?>__cross--horizontal <?= $block; ?>__cross--bottom" viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-cross' ); ?>
    </svg>
    <svg class="<?= $block; ?>__spacer <?= $block; ?>__spacer-horizontal <?= $block; ?>__spacer-horizontal--bottom" preserveAspectRatio="none" viewBox="0 0 16 16">
      <rect class="cls-1" width="100%" height=".15rem" y="3.5"></rect>
      <rect class="cls-1" width="100%" height=".15rem" y="12.75"></rect>
    </svg>
    <svg class="<?= $block; ?>__corner <?= $block; ?>__corner--bottom-right" viewBox="0 0 16 16">
      <?php FWD::the_svg( 'connect-corner' ); ?>
    </svg>
  </div>

</div>