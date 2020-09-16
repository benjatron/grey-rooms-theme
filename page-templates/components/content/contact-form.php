<?php
/**
 * Component for the form content of the contact template
 */
use FWD_Helper as FWD;

$form = $COMPONENT;

$block = "contact-form"; // The base block class

$introduction = $form['introduction'];
$headline = $form['headline'];
$form_id = $form['id'];

?>
<div class="<?php echo $block; ?>">
  <div class="<?php echo $block; ?>__form-block">
    <div class="<?php echo $block; ?>__introduction">
      <?php echo $introduction; ?>
    </div>
    <h1 class="<?php echo $block; ?>__headline">
      <?php echo $headline; ?>
    </h1>
    <div class="<?php echo $block; ?>__form">
      <?php
      echo forminator_form( $form_id );
      ?>
    </div>
  </div>
</div>