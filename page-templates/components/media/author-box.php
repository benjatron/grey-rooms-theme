<?php
/**
 * Author box component
 */
use FWD_Helper as FWD;

$author_box = $COMPONENT;
$avatar = $author_box['avatar'];
$name = $author_box['name'];
$social = $author_box['social'];
?>
<div class="author-box">
  <img class="author-box__avatar lazyload lazyload--blurUp"
    data-sizes="auto" alt="<?= $avatar['alt'] ?>"
    src="<?= $avatar['sizes']['preload'] ?>"
    data-srcset="<?= FWD::the_srcset( $avatar, 480 ) ?>"
  />
  <h3 class="author-box__name">
    <?= $name ?>
  </h3>
  <div class="author-box__social">
    <?php
    foreach( $social as $network ):
      $link = $network['url'];
      $label = $network['network']['label'];
      $value = $network['network']['value'];
    ?>
    <a class="author-box__link" href="<?= $link ?>" target="_blank" rel="noopener noreferrer" aria-label="<?= $label ?>">
      <svg class="author-box__icon author-box__icon--<?= $value ?>" viewBox="0 0 16 16">
        <?php FWD::the_svg( 'social-' . $network['network']['value'] ); ?>
      </svg>
    </a>
    <?php
    endforeach;
    ?>
  </div>
</div>