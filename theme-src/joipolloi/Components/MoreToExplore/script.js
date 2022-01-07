import shuffle from 'lodash/shuffle';
import take from 'lodash/take';

class MoreToExplore extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.setColours();
    this.resolveElements();
  }

  setColours () {
    const colours = shuffle(['red', 'orange', 'yellow', 'green', 'blue']);
    this.colours = take(colours, 2);
  }

  resolveElements () {
    this.items = this.querySelectorAll('.CardPost');
  }

  connectedCallback () {
    this.items.forEach((item, index) => {
      item.classList.add(this.colours[index]);
    });
  }
}

window.customElements.define('joi-more-to-explore', MoreToExplore, { extends: 'div' });
