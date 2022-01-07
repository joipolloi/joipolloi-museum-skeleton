class MegaMenu extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    return self;
  }

  connectedCallback () {
    this.style.display = 'block';
  }
}

window.customElements.define('joi-mega-menu', MegaMenu, { extends: 'div' });
