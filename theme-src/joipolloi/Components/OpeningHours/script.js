class OpeningHours extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {}

  connectedCallback () {}
}

window.customElements.define('joi-opening-hours', OpeningHours, { extends: 'div' });
