<?php
// Google Tag Manager integration

// Get Google Tag Manager data from passed $COMPONENT
$gtm = $COMPONENT['gtm'];
if( true === $gtm['active'] ):
  $id = $gtm['id'];
?>
  <link rel="preconnect" href="https://www.googletagmanager.com/" crossorigin>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $id ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', '<?= $id ?>');
  </script>
<?php
endif;
