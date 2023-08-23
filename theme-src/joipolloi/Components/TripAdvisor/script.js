/* eslint-disable no-undef */
/**
 * Four Museum Skeleton - Footer star rating display
 *
 * @author Declan Allen <declan.allen@joipolloi.com>
 * @package Joi Polloi
 */

class TripAdvisor extends window.HTMLDivElement {
    constructor(...args) {
        const self = super(...args);
        return self;
    }

    footerTripAdvisorRating() {
        const star1 = document.getElementById('star1');
        const star2 = document.getElementById('star2');
        const star3 = document.getElementById('star3');
        const star4 = document.getElementById('star4');
        const star5 = document.getElementById('star5');
        const halfstar1 = document.getElementById('halfstar1');
        const halfstar2 = document.getElementById('halfstar2');
        const halfstar3 = document.getElementById('halfstar3');
        const halfstar4 = document.getElementById('halfstar4');
        const halfstar5 = document.getElementById('halfstar5');

        //switch statement using the star rating set for tripadvisor in the global settings//
        switch (+JoiData.tripAdvisor.star_rating) {
            case 0:
                break;
            case 5:
                star1.classList.toggle('active');
                halfstar1.setAttribute('mask', 'url(#half)');
                break;
            case 10:
                star1.classList.toggle('active');
                break;
            case 15:
                star1.classList.add('active');
                star2.classList.add('active');
                halfstar2.setAttribute('mask', 'url(#half)');
                break;
            case 20:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                break;
            case 25:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                halfstar3.setAttribute('mask', 'url(#half)');
                break;
            case 30:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                break;
            case 35:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                star4.classList.toggle('active');
                halfstar4.setAttribute('mask', 'url(#half)');
                break;
            case 40:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                star4.classList.toggle('active');
                break;
            case 45:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                star4.classList.toggle('active');
                star5.classList.toggle('active');
                halfstar5.setAttribute('mask', 'url(#half)');
                break;
            case 50:
                star1.classList.toggle('active');
                star2.classList.toggle('active');
                star3.classList.toggle('active');
                star4.classList.toggle('active');
                star5.classList.toggle('active');
                break;
            default:
                break;
        }
    }

    connectedCallback() {
        this.footerTripAdvisorRating();
    }
}

window.customElements.define('joi-trip-advisor', TripAdvisor, {
    extends: 'div',
});
