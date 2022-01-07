---
to: <%= absPath %>/script.js
---

class <%= component_name %> extends window.HTMLDivElement {
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

window.customElements.define('joi-<%= h.inflection.transform(component_name, ['underscore', 'dasherize']) %>', <%= component_name %>, { extends: 'div' });
