class BlockCardPostGrid extends window.HTMLDivElement {
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

window.customElements.define('joi-block-card-post-grid', BlockCardPostGrid, { extends: 'div' });
