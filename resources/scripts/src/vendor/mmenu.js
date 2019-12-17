// Mmenu custom build

// Core
import Mmenu from 'mmenu-js/dist/core/oncanvas/mmenu.oncanvas';

// Core add-ons
import offcanvas from 'mmenu-js/dist/core/offcanvas/mmenu.offcanvas';
import screenReader from 'mmenu-js/dist/core/screenreader/mmenu.screenreader';
import scrollBugFix from 'mmenu-js/dist/core/scrollbugfix/mmenu.scrollbugfix';

// Add-ons
// * None

// Wrappers
import wordpress from 'mmenu-js/dist/wrappers/wordpress/mmenu.wordpress';

Mmenu.addons = {
  // Core add-ons
  offcanvas,
  screenReader,
  scrollBugFix
};

// Wrappers
Mmenu.wrappers = {
  wordpress
};

window.Mmenu = Mmenu;
