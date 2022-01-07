import Swiper, { Navigation, EffectFade, A11y } from 'swiper';
import 'swiper/css';
import 'swiper/css/effect-fade';
Swiper.use([Navigation, EffectFade, A11y]);

class BlockFeatureCarousel extends window.HTMLDivElement {
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
      effect: 'fade',
      fadeEffect: {
        crossFade: true,
        transformEl: '.container'
      },
      navigation: {
        nextEl: this.buttonNext,
        prevEl: this.buttonPrev
      },
    };
    this.swiper = new Swiper(this.slider, config);
  }
}

window.customElements.define('joi-block-feature-carousel', BlockFeatureCarousel, { extends: 'div' });
