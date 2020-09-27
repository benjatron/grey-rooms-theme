// Call to action component scripts
import Elevator from 'elevator.js';

window.onload = function() {
  const elevator = new Elevator({
    duration: 32000,
    element: document.querySelector( '.cta__top-text' ),
    mainAudio: '../../../../wp-content/themes/grey-rooms-theme/resources/audio/src/elevator.mp3',
    endAudio: '../../../../wp-content/themes/grey-rooms-theme/resources/audio/src/ding.mp3',
    targetElement: document.querySelector( '.navigation' )
  });
}
