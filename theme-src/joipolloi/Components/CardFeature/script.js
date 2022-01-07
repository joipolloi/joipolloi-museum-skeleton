class CardFeature extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {
    this.media = this.querySelector('.media');
  }

  connectedCallback () {
    this.style.setProperty('--top', `${this.media.clientHeight / 2}px`);
  }
}

window.customElements.define('joi-card-feature', CardFeature, { extends: 'div' });
