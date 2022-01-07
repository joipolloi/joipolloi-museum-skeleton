class CategoryFilter extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
  }

  resolveElements () {
    this.buttons = this.querySelectorAll('li');
    this.inputs = this.querySelectorAll('input');
    this.buttons.forEach(button => {
      button.addEventListener('click', () => this.termSelected(button, button.querySelector('input')));
    });
  }

  termSelected (button, input) {
    input.checked = !input.checked;
    if(input.checked) {
      button.classList.add('button--selected');
    } else {
      button.classList.remove('button--selected');
    }
  }

  connectedCallback () {}
}

window.customElements.define('joi-category-filter', CategoryFilter, { extends: 'div' });
