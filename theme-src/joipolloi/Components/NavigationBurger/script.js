class NavigationBurger extends window.HTMLButtonElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.bindFunctions();
    this.bindEvents();
    this.resolveElements();
  }

  resolveElements () {
    this.menu = document.getElementById('megaMenu');
  }

  bindFunctions () {
    this.toggleMenu = this.toggleMenu.bind(this);
  }

  bindEvents () {
    this.addEventListener('click', this.toggleMenu);
  }

  toggleMenu () {
    this.menu.classList.toggle('open');
    this.classList.toggle('button--selected');
  }

}

window.customElements.define('joi-navigation-burger', NavigationBurger, { extends: 'button' });
