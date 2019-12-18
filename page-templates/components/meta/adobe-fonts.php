<?php
// Adobe Fonts integration
$fonts = get_field( 'site_meta_adobeFonts', 'option' );
if( true === $fonts['check'] ):
  $id = $fonts['id'];
?>
  <link rel="preconnect" href="https://use.typekit.net/" crossorigin>
  <script>
    (function(d) {
      var config = {
        kitId: '<?php echo $id; ?>',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
  </script>
<?php
endif;