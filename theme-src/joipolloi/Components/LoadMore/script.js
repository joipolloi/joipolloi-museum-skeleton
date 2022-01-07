class LoadMore extends window.HTMLDivElement {
  constructor (...args) {
    const self = super(...args);
    self.init();
    return self;
  }

  init () {
    this.pageNumber = 1;
    this.resolveElements();
    this.bindFunctions();
    this.bindEvents();
  }

  bindFunctions () {
    this.buttonClick = this.buttonClick.bind(this);
  }

  bindEvents () {
    this.button.addEventListener('click', this.buttonClick);
  }

  resolveElements () {
    this.button = this.querySelector('button');
    this.action = this.button.dataset.action;
    this.postType = this.button.dataset.postType;
    this.maxPages = parseInt(this.button.dataset.maxPages, 10);
    this.container = document.querySelector(this.button.dataset.container);
    this.buttonTxt = this.button.innerText;
  }

  buttonClick () {
    this.button.disabled = true;
    this.button.innerText = 'Loading...';
    this.loadMore();

  }

  resetButton() {
    this.button.disabled = false;
    this.button.innerText = this.buttonTxt;
  }

  async loadMore () {
    this.pageNumber++;
    const formData = new FormData();
    formData.append('action', this.action);
    formData.append('postType', this.postType);
    formData.append('pageNumber', this.pageNumber);

    try {

      const response = await fetch(window.JoiData.ajaxUrl, {
        method: 'POST',
        body: formData,
      });
      if (!response.ok) {
        throw new Error('Fetch Failed');
      }
      const html = await response.text();
      if (html) {
        this.container.innerHTML += html;
        this.resetButton();
      } else {
        this.button.remove();
      }
      if (this.maxPages === this.pageNumber) {
        this.button.remove();
      }
    } catch (error) {
      console.log('error', error);
      this.pageNumber--;
      this.resetButton();
    }
  }
}

window.customElements.define('joi-load-more', LoadMore, { extends: 'div' });
