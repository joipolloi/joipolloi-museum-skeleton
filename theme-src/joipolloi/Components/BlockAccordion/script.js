class BlockAccordion extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {
    this.accordions = this.querySelectorAll('.accordion');
  }

  connectedCallback () {
    this.accordions.forEach(accordion => {
      accordion.addEventListener('click', () => {
        accordion.classList.toggle('active');
        const panel = accordion.nextElementSibling;
        if (panel.style.maxHeight) {
          panel.style.maxHeight = null;
        } else {
          panel.style.maxHeight = panel.scrollHeight + 'px';
        }
      });
    });
  }
}

window.customElements.define('joi-block-accordion', BlockAccordion, { extends: 'div' });
