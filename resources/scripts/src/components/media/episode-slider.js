// Episode slider scripts
import Swiper from 'swiper';

let swiper = new Swiper( '.episode-slider__slider', {
  grabCursor: true,
  loop: true,
  slideToClickedSlide: true,
  speed: 400,
  spaceBetween: 100,
  uniqueNavElements: true,
  pagination: {
    clickable: true,
    el: '.episode-slider__pagination',
    hideOnClick: false,
    type: 'bullets',
  },
});