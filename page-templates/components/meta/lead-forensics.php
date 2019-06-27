<?php
// Google Tag Manager integration
if( get_field('lead_forensics', 'option') ):
  $lf_id = get_field('lead_forensics', 'option');
?>
  <link rel="preconnect" href="https://secure.leadforensics.com/" crossorigin>
  <script type="text/javascript" src="https://secure.leadforensics.com/js/<?php echo $lf_id; ?>.js" async="true"></script>
<?php
endif;