class NavigationMain extends window.HTMLElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {}

  connectedCallback () {

  }
}

window.customElements.define('joi-navigation-main', NavigationMain, { extends: 'nav' });
