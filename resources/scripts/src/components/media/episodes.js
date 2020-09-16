// Episodes chooser scripts

document.addEventListener("DOMContentLoaded", function() {

  let block = 'episodes';

  const episodes = jQuery( '.' + block + '__episode' );

  // Preload handling
  jQuery(episodes).each( function() {
    jQuery(this).removeClass( block + '__episode--preload' );
  });
  
  // Handles season setting
  function setSeason() {
    let season = jQuery( '.' + block + '__option:selected' ).val();

    // Show initial episodes
    jQuery(episodes).each( function() {
      jQuery(this).addClass( block + '__episode--is-hidden' );
      if( jQuery(this).data( "season" ) == season ) {
        jQuery(this).removeClass( block + '__episode--is-hidden' );
      }
    });
  }
  setSeason();

  // Handles season changing
  jQuery( '.' + block + '__season-select' ).change( function() {
    setSeason();
  });
});
