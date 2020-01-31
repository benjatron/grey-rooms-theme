<?php
/**
 * Component for the main content of the contact template
 */
use FWD_Helper as FWD;

$contact = $COMPONENT;

$block = "contact-content"; // The base block class

$headline = $contact['headline'];
$body = $contact['body'];

?>
<div class="<?php echo $block; ?>">
  <h2 class="<?php echo $block; ?>__headline">
    <?php echo $headline; ?>
  </h2>
  <div class="<?php echo $block; ?>__body">
    <?php echo $body; ?>
  </div>
</div>