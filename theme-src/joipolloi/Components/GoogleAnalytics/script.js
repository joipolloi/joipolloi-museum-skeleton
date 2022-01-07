import Cookies from 'js-cookie';
import { cookieName } from '../../assets/scripts/cookieNotice';

class GoogleAnalytics extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.setOptions();
    this.resolveElements();
  }

  setOptions () {
    this.cookieName = cookieName;
  }

  resolveElements () {

  }

  connectedCallback () {
    const allowCookies = Cookies.get(this.cookieName);
    if (allowCookies && allowCookies === 'true') {
      this.optIn();
    }
  }

  optIn () {
    window.gtag('consent', 'update', {
      'analytics_storage': 'granted'
    });
  }
}

window.customElements.define('joi-google-analytics', GoogleAnalytics, { extends: 'div' });
