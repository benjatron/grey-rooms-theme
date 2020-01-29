<?php
/**
 * Connect page main content component
 */
use FWD_Helper as FWD;

$connect = $COMPONENT;

$block = "menu"; // The base block class

$discord = $connect['discord'];
$patreon = $connect['patreon'];
$social = $connect['social'];
$merchandise = $connect['merchandise'];
$paypal = $connect['paypal'];
$advertising = $connect['advertising'];
?>
<div class="<?php echo $block; ?>">

  <div class="<?php echo $block; ?>__masthead">
  </div>

  <div class="<?php echo $block; ?>__left-edge">
  </div>

  <div class="<?php echo $block; ?>__left">

    <?php // Discord ?>
    <div class="<?php echo $block; ?>__discord">
      <h2 class="<?php echo $block; ?>__heading">
        - <?php echo $discord['heading']; ?> -
      </h2>
      <div class="<?php echo $block; ?>__description">
        <?php echo $discord['description']; ?>
      </div>
      <a class="<?php echo $block; ?>__link" href="<?php echo $discord['button_link']; ?>">
        <svg class="<?php echo $block; ?>__icon" viewBox="0 0 16 16">
        </svg>
        <h3 class="<?php echo $block; ?>__label">
          <?php echo $discord['button_label']; ?>
        </h3>
      </a>
    </div>

    <?php // Patreon ?>
    <div class="<?php echo $block; ?>__patreon">
      <h2 class="<?php echo $block; ?>__heading">
        - <?php echo $patreon['heading']; ?> -
      </h2>
      <div class="<?php echo $block; ?>__description">
        <?php echo $patreon['description']; ?>
      </div>
      <a class="<?php echo $block; ?>__link" href="<?php echo $patreon['button_link']; ?>">
        <svg class="<?php echo $block; ?>__icon" viewBox="0 0 16 16">
        </svg>
        <h3 class="<?php echo $block; ?>__label">
          <?php echo $patreon['button_label']; ?>
        </h3>
      </a>
    </div>

    <?php // Social ?>
    <div class="<?php echo $block; ?>__social">
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
            <a class="<?php echo $block; ?>__social-link" href="<?php echo $url; ?>">
              <svg class="<?php echo $block; ?>__social-icon" viewBox="0 0 16 16">
              </svg>
            </a>
            <div class="<?php echo $block; ?>__social-content">
              <h3 class="<?php echo $block; ?>__social-headline">
                <?php echo $headline; ?>
              </h3>
              <div class="<?php echo $block; ?>__social-description">
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
  </div>

  <div class="<?php echo $block; ?>__right">

    <?php // Merchandise ?>
    <div class="<?php echo $block; ?>__merchandise">
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
    <div class="<?php echo $block; ?>__paypal">
      <h2 class="<?php echo $block; ?>__heading">
        <?php echo $paypal['headline']; ?>
      </h2>
      <a class="<?php echo $block; ?>__link" href="<?php echo $paypal['url']; ?>">
        <svg class="<?php echo $block; ?>__icon <?php echo $block; ?>__icon--paypal" viewBox="0 0 16 16">
        </svg>
      </a>
    </div>

    <?php // Advertising ?>
    <div class="<?php echo $block; ?>__advertising">
      <a class="<?php echo $block; ?>__link <?php echo $block; ?>__link--advertising" href="<?php echo $advertising['url']; ?>">
        <?php
        FWD::the_lazy_image( "{$block}__background", $advertising['background'], 640, true );
        ?>
        <h3 class="<?php echo $block; ?>__message">
          <?php echo $advertising['message']; ?>
        </h3>
      </a>
    </div>

  </div>

  <div class="<?php echo $block; ?>__right-edge">
  </div>

  <div class="<?php echo $block; ?>__footer">
  </div>

</div>