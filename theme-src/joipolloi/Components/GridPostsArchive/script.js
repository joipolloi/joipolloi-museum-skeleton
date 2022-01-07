class GridPostsArchive extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.resolveElements();
    this.bindFunctions();
    this.bindEvents();
  }

  resolveElements () {
    this.buttons = this.querySelectorAll('.toggle button');
    this.grid = this.querySelector('.grid');
  }

  bindFunctions () {
    this.toggleView = this.toggleView.bind(this);
  }

  bindEvents () {
    this.buttons.forEach(button => button.addEventListener('click', this.toggleView));
  }

  toggleView () {
    this.buttons.forEach(button => button.classList.toggle('pill--solid'));
    this.grid.classList.toggle('list-view');
  }

}

window.customElements.define('joi-grid-posts-archive', GridPostsArchive, { extends: 'div' });
