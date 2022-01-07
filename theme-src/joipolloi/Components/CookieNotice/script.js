import Cookies from 'js-cookie';
import { cookieName } from '../../assets/scripts/cookieNotice';

class CookieNotice extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.setOptions();
    this.resolveElements();
    this.bindFunctions();
    this.bindEvents();
  }

  setOptions () {
    this.cookieName = cookieName;
  }

  resolveElements () {
    this.continueButton = this.querySelector('[data-continue]');
    this.declineButton = this.querySelector('[data-decline]');
  }

  bindFunctions () {
    this.declineCookies = this.declineCookies.bind(this);
    this.acceptCookies = this.acceptCookies.bind(this);
  }

  bindEvents () {
    this.continueButton.addEventListener('click', this.acceptCookies);
    this.declineButton.addEventListener('click', this.declineCookies);
  }

  acceptCookies(e) {
    e.preventDefault();
    this.hideCookieNotice(true);
    window.gtag('consent', 'update', {
      'analytics_storage': 'granted'
    });
  }

  declineCookies(e) {
    e.preventDefault();
    this.hideCookieNotice(false);
  }

  connectedCallback () {
    this.showCookieNotice();
  }

  hideCookieNotice(accept) {
    Cookies.set(this.cookieName, accept, { expires: 90 });
    this.classList.remove('visible');
  }

  showCookieNotice(){
    if (!Cookies.get(this.cookieName)) {
      this.classList.add('visible');
    }
  }

}

window.customElements.define('joi-cookie-notice', CookieNotice, { extends: 'div' });
