<?php
// Noscript option for Lead Forensics
if( get_field('lead_forensics', 'option') ):
  $lf_id = get_field('lead_forensics', 'option');
?>
  <noscript><img alt="" src="https://secure.leadforensics.com/<?php echo $lf_id; ?>.png" style="display:none;" /></noscript>
<?php
endif;