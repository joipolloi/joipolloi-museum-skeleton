import Swiper, { Navigation, A11y } from 'swiper';
import 'swiper/css';
Swiper.use([Navigation, A11y]);

class BlockImageCarousel extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {
    this.slider = this.querySelector('[data-slider]');
    this.buttonNext = this.querySelector('[data-slider-button="next"]');
    this.buttonPrev = this.querySelector('[data-slider-button="prev"]');
  }

  connectedCallback () {
    this.initSlider();
  }

  initSlider() {
    const config = {
      navigation: {
        nextEl: this.buttonNext,
        prevEl: this.buttonPrev
      },
    };
    this.swiper = new Swiper(this.slider, config);
  }
}

window.customElements.define('joi-block-image-carousel', BlockImageCarousel, { extends: 'div' });
