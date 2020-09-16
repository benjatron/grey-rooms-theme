/**
 * Navigation component
 */
import '../../vendor/mmenu';

// Mmenu settings
document.addEventListener(
  "DOMContentLoaded", () => {
    // Handle preloading of drawer menus
    jQuery('.navigation__links--drawer').hide().removeClass('navigation__links--preload').show();
    jQuery('.navigation__nav').hide().removeClass('navigation__nav--preload').show();

    new Mmenu( '#drawer-nav', {
      // options
      "extensions": [
        "position-front",
        "position-right"
      ],
      wrappers: [
        "wordpress"
      ]
    }, {
      // configuration
      offCanvas: {
        page: {
          selector: "#page-wrapper"
        }
      }
    });
  }
);