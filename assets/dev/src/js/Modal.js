import ScrollLock from "./util/ScrollLock";
import setTimeoutAsync from "./helpers/setTimeoutAsync";

export default class Modal {
  elements = {};
  modifications = [];
  link;
  template;
  beforeShowFunctions = [];
  afterShowFunctions = [];
  beforeCloseFunctions = [];
  
  constructor({beforeShow, afterShow, beforeClose, link, modifications = []}) {
    if (beforeShow) this.onBeforeShow(beforeShow);
    if (afterShow) this.onAfterShow(afterShow);
    if (beforeClose) this.onBeforeClose(beforeClose);
    this.link = link;
    this.modifications = modifications;
  }
  
  async get() {
    //Inline or ajax
    if (this.link instanceof jQuery) {
      this.template = jQuery(this.link.html());
    } else {
      let data = await jQuery.asyncAjax({
        method: "GET",
        url: this.link
      });
      this.template = jQuery(data);
    }
    return true;
  }
  
  render() {
    const closeButton = jQuery("<button>", {
      class: `modal__close-button${this.modifications.reduce((result, modification) => `${result} modal__close-button_${modification}`, "")}`
    })
    const modalWindow = jQuery("<div>", {
      class: `modal__window${this.modifications.reduce((result, modification) => `${result} modal__window_${modification}`, "")}`,
      append: [
        this.template,
        closeButton
      ]
    });
    const inner = jQuery("<div>", {
      class: `modal__inner${this.modifications.reduce((result, modification) => `${result} modal__inner_${modification}`, "")}`,
      append: modalWindow
    })
    const wrapper = jQuery("<div>", {
      class: `modal${this.modifications.reduce((result, modification) => `${result} modal_${modification}`, "")}`,
      append: inner,
    });
    
    this.elements = {
      wrapper,
      closeButton,
      inner,
      window: modalWindow,
      popup: modalWindow.children().first()
    }
  }
  
  async open({needLoader, loaded} = {}) {
    if (!this.template) {
      if (!!needLoader) needLoader.call(this);
      await this.get();
      if (!!loaded) loaded.call(this);
    }
    
    this.render();
    
    //Remove old popup
    let oldPopup = jQuery(document.body).find(".modal");
    if (oldPopup.length) oldPopup.remove();
    
    jQuery(document.body).append(this.elements.wrapper);
    ScrollLock.on();
    await setTimeoutAsync(300);
    
    //Close button handler
    this.elements.closeButton.click(() => {
      this.close();
      return false;
    });
    
    //Close on background handler
    this.elements.window.click(event => event.stopPropagation());
    this.elements.wrapper.click(this.close.bind(this));
  
    await this.beforeShow();
    for (const callback of this.beforeShowFunctions) {
      await callback.call(this);
    }
    this.elements.wrapper.addClass("modal-active");
    await this.animationStart();
    
    await this.afterShow();
    for (const callback of this.afterShowFunctions) {
      await callback.call(this);
    }
    
    return true;
  }
  
  async switch ({prevPopup, needLoader, afterLoad} = {}) {
    //Preload functions
    if (!this.template) {
      if (!!needLoader) needLoader.call(this);
      await this.get();
      if (!!afterLoad) afterLoad.call(this);
    }
    
    //Bind containers from prev popup
    this.elements = prevPopup.elements;
    //End animation for prev popup
    await prevPopup.animationEnd();
    
    //Import beforeClose functions from prev popup
    prevPopup.beforeCloseFunctions.push(prevPopup.beforeClose);
    this.beforeCloseFunctions = this.beforeShowFunctions.concat(prevPopup.beforeCloseFunctions);
    prevPopup = null;
    
    //Replace popup
    this.elements.window.children().first().replaceWith(this.template);
    this.elements.popup = this.elements.window.children().first();
    
    //Close button event rebind
    this.elements.closeButton.off();
    this.elements.closeButton.click(() => {
      this.close();
      return false;
    });
    
    //Run standart init and callbacks
    await this.beforeShow();
    for (const callback of this.beforeShowFunctions) {
      await callback.call(this);
    }
    await this.animationStart();
    await this.afterShow();
    for (const callback of this.afterShowFunctions) {
      await callback.call(this);
    }
    
    return true;
  }
  
  onBeforeShow(callback) {
    this.beforeShowFunctions.push(callback);
  }
  
  async beforeShow() {
    return false;
  }
  
  onAfterShow(callback) {
    this.afterShowFunctions.push(callback);
  }
  
  async afterShow() {
    return false;
  }
  
  onBeforeClose(callback) {
    this.beforeCloseFunctions.push(callback);
  }
  
  async beforeClose() {
    return false;
  }
  
  async close() {
    await this.beforeClose();
    for (const callback of this.beforeCloseFunctions) {
      await callback.call(this);
    }
    await this.animationEnd();
    this.elements.wrapper.removeClass("modal-active");
    await setTimeoutAsync(200);
    ScrollLock.off();
    await setTimeoutAsync(400);
    this.elements.wrapper.remove();
  }
  
  animationStart() {
    return new Promise(resolve => {
      setTimeout(() => {
        this.elements.popup.find(".popup-animate-scale").addClass("popup-animate-scale_start");
      }, 0);
      setTimeout(() => {
        this.elements.popup.find(".popup-animate-horizontal-slide").addClass("popup-animate-horizontal-slide_start");
      }, 400);
      setTimeout(() => {
        this.elements.closeButton.addClass("active");
      }, 850);
      setTimeout(() => {
        resolve();
      }, 950);
    })
  }
  
  animationEnd() {
    return new Promise(resolve => {
      setTimeout(() => {
        this.elements.popup.find(".popup-animate-scale").addClass("popup-animate-scale_end");
      }, 0);
      setTimeout(() => {
        this.elements.popup.find(".popup-animate-horizontal-slide").addClass("popup-animate-horizontal-slide_end");
      }, 400);
      setTimeout(() => {
        resolve();
      }, 600);
    })
  }
}