// Scripts for the post single template
'use strict'

/**
 * Imports SCSS for Webpack parsing and sets strict mode
 */
import '../../../styles/src/pages/post-single.scss';

/*
 * Component imports
 */
import '../components/media/author-box';
import '../components/content/blog-roll';

/*
 * Page-specific scripting
 */
window.addEventListener( 'DOMContentLoaded', (event) => {
  let articleHeight = document.querySelector('.post-single__post').offsetHeight;
  document.querySelector('.post-single__post').setAttribute( 'height', articleHeight + 'px' );
});
