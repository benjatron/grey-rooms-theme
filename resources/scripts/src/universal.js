'use strict';

/**
 * Imports SCSS for Webpack parsing and sets strict mode
 */
import '../../styles/src/universal.scss';

/**
 * Vendor libraries and plugin settings
 */
// Dialog polyfill
import './vendor/dialog-polyfill';
// Lazysizes
import './vendor/lazysizes';
// Smoothscroll Polyfill
import './vendor/smoothscroll-polyfill';

/**
 * Universal Scripting
 */
// Defer loading of iframe content
let vidDefer = document.getElementsByTagName('iframe');

for (var i=0; i<vidDefer.length; i++) {
  if(vidDefer[i].getAttribute('data-src')) {
    vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
  }
}

/**
 * Universal components
 */
