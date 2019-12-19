<?php
// Noscript option for Google Tag Manager

// Get Google Tag Manager data from passed $COMPONENT
$gtm = $COMPONENT['gtm'];
if( true === $gtm['active'] ):
  $id = $gtm['id'];
?>
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $id; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
<?php
endif;