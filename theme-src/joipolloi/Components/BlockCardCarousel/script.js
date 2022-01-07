import Swiper, { Navigation, A11y } from 'swiper';
import 'swiper/css';
Swiper.use([Navigation, A11y]);

class BlockCardCarousel extends window.HTMLDivElement {
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
    this.nav = this.querySelector('[data-slider-nav]');
    this.image = this.querySelector('.Image');
    this.header = this.querySelector('.header');
    this.buttonNext = this.querySelector('[data-slider-button="next"]');
    this.buttonPrev = this.querySelector('[data-slider-button="prev"]');
  }

  connectedCallback () {
    this.initSlider();
    this.navPosition();
  }

  navPosition() {
    const imageHeight = this.image.clientHeight;
    const navHeight = this.nav.clientHeight;
    const headerHeight = this.header.clientHeight;
    const top = ((imageHeight / 2) + headerHeight + 30) - (navHeight / 2);
    this.nav.style.top = `${top}px`;
  }

  initSlider() {
    const config = {
      slidesPerView: 1.05,
      spaceBetween: 15,
      breakpoints: {
        769: {
          spaceBetween: 30,
          slidesPerView: 2.4,
          slidesOffsetAfter: 80,
        },
      },
      navigation: {
        nextEl: this.buttonNext,
        prevEl: this.buttonPrev
      },
    };
    this.swiper = new Swiper(this.slider, config);
  }
}

window.customElements.define('joi-block-card-carousel', BlockCardCarousel, { extends: 'div' });
