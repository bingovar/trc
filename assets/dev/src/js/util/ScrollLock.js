import {isIos} from "../helpers/browser";

export default class {
  static body = document.querySelector('html');
  static scrollPosition = 0;
  
  static on() {
    this.body.classList.add('body-scroll-locked');
    
    if (isIos) {
      this.scrollPosition = window.pageYOffset;
      this.body.style.overflow = 'hidden';
      this.body.style.position = 'fixed';
      this.body.style.top = `-${this.scrollPosition}px`;
      this.body.style.width = '100%';
    } else {
      this.body.style.overflow = 'hidden';
    }
  }
  
  static off() {
    if (isIos) {
      this.body.style.removeProperty('overflow');
      this.body.style.removeProperty('position');
      this.body.style.removeProperty('top');
      this.body.style.removeProperty('width');
      window.scrollTo(0, this.scrollPosition);
    } else {
      this.body.style.removeProperty('overflow');
    }
    
    this.body.classList.remove('body-scroll-locked');
  }
  
}