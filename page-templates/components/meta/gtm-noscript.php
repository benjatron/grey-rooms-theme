<?php
// Noscript option for Google Tag Manager
$gtm = get_field( 'site_gtm', 'option' );
if( true === $gtm['check'] ):
  $id = $gtm['id'];
?>
  <noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo $id; ?>"
    height="0" width="0" style="display:none;visibility:hidden"></iframe>
  </noscript>
<?php
endif;