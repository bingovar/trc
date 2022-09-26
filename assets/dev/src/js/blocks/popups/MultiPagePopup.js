import Modal from "../../Modal";

export default class extends Modal {
  pages;
  pageSwitchCallbacks = [];
  currentPage = 0;
  
  constructor({beforeShow, afterShow, onPageSwitch, beforeClose, link, modifications = []}) {
    super({beforeShow, afterShow, beforeClose, link, modifications});
    if (onPageSwitch) this.onPageSwitch(onPageSwitch);
  }
  
  async beforeShow() {
    this.pages = this.elements.popup.find(".popup__page").arr();
    await this.setPage(0);
  }
  
  async pageSwitchController(num) {
    await this.pageSwitch(num);
    for (const callback of this.pageSwitchCallbacks) {
      await callback.call(this, num);
    }
  }
  
  onPageSwitch(callback) {
    this.pageSwitchCallbacks.push(callback);
  }
  
  async pageSwitch() {}
  
  async setPage(num) {
    if (num < 0 || num > this.pagesCount - 1) return false;
    
    this.currentPage = num;
    this.pages.forEach((page, index) => index === num ? page.addClass("popup-page-active") : page.removeClass("popup-page-active"));
    await this.pageSwitchController(num);
  }
  
  get pagesCount() {
    return this.pages.length;
  }
  
  async nextPage() {
    await this.setPage(this.currentPage + 1);
  }
  
  async prevPage() {
    await this.setPage(this.currentPage - 1);
  }
}