<?php
// Typekit integration
if( get_field('site_typekit', 'option') ):
  $typekit = get_field('site_typekit', 'option');
?>
  <link rel="preconnect" href="https://use.typekit.net/" crossorigin>
  <script>
    (function(d) {
      var config = {
        kitId: '<?php echo $typekit; ?>',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
  </script>
<?php
endif;