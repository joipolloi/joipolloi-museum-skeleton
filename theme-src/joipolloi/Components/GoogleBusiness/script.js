/* eslint-disable no-undef */

/**
 * Four Museum Skeleton - Footer google star rating display
 *
 * @author Declan Allen <declan.allen@joipolloi.com>
 * @package Joi Polloi
 */

class GoogleBusiness extends window.HTMLDivElement {
    constructor(...args) {
        const self = super(...args);
        return self;
    }

    footerGoogleBusinessRating() {
        const googlestar1 = document.getElementById('googlestar1');
        const googlestar2 = document.getElementById('googlestar2');
        const googlestar3 = document.getElementById('googlestar3');
        const googlestar4 = document.getElementById('googlestar4');
        const googlestar5 = document.getElementById('googlestar5');
        const googlehalfstar1 = document.getElementById('googlehalfstar1');
        const googlehalfstar2 = document.getElementById('googlehalfstar2');
        const googlehalfstar3 = document.getElementById('googlehalfstar3');
        const googlehalfstar4 = document.getElementById('googlehalfstar4');
        const googlehalfstar5 = document.getElementById('googlehalfstar5');

        //switch statement using the google star rating set for googlebusiness in the global settings//
        switch (+JoiData.googleBusiness.star_rating) {
            case 0:
                break;
            case 5:
                googlestar1.classList.toggle('active');
                googlehalfstar1.setAttribute('mask', 'url(#half)');
                break;
            case 10:
                googlestar1.classList.toggle('active');
                break;
            case 15:
                googlestar1.classList.add('active');
                googlestar2.classList.add('active');
                googlehalfstar2.setAttribute('mask', 'url(#half)');
                break;
            case 20:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                break;
            case 25:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                googlehalfstar3.setAttribute('mask', 'url(#half)');
                break;
            case 30:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                break;
            case 35:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                googlestar4.classList.toggle('active');
                googlehalfstar4.setAttribute('mask', 'url(#half)');
                break;
            case 40:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                googlestar4.classList.toggle('active');
                break;
            case 45:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                googlestar4.classList.toggle('active');
                googlestar5.classList.toggle('active');
                googlehalfstar5.setAttribute('mask', 'url(#half)');
                break;
            case 50:
                googlestar1.classList.toggle('active');
                googlestar2.classList.toggle('active');
                googlestar3.classList.toggle('active');
                googlestar4.classList.toggle('active');
                googlestar5.classList.toggle('active');
                break;
            default:
                break;
        }
    }

    connectedCallback() {
        this.footerGoogleBusinessRating();
    }
}

window.customElements.define('joi-google-business', GoogleBusiness, {
    extends: 'div',
});
