import setTimeoutAsync from "./helpers/setTimeoutAsync";
import {reCaptchaSiteKey, yaMetricFormEventId} from "./helpers/constants";

export default class Form {
  form = null;
  inputs = [];
  verifyTime = new Date();
  submitCallbacks = [];
  includeHiddenInputs;
  
  constructor(form, inputs, {includeHiddenInputs = true} = {includeHiddenInputs: true}) {
    this.form = jQuery(form);
    this.includeHiddenInputs = includeHiddenInputs;
    
    if (inputs && inputs.length) {
      inputs.forEach((input) => {
        this.addInput(input);
      })
    }
    
    this.formError = new FormError(this.form.find(".form-errors"));
    this.form.submit(async event => {
      event.preventDefault();
      await this.submit.call(this, event);
      for (const callback of this.submitCallbacks) {
        await callback.call(this, event);
      }
    });
  }
  
  addInput({input, required = false}) {
    this.inputs.push({input, required});
  }
  
  async submit(event) {}
  
  onSubmit(callback) {
    this.submitCallbacks.push(callback);
  }
  
  async verify() {
    if (new Date() - this.verifyTime < 700) return false;
    
    this.verifyTime = new Date();
    if (!this.inputs.length) return true;
    
    //Clear prev error
    await this.formError.clear(true);
    
    const {emptyInputs, falseInputs} = this.inputs.reduce((result, {input, required}) => {
      switch (input.verify()) {
        case null:
          if (!required) return result;
          result.emptyInputs.push(input);
          break;
        case false:
          result.falseInputs.push(input);
          break;
        default:
          if (input.error) input.error(false);
      }
      
      return result;
    }, {emptyInputs: [], falseInputs: []});
    
    await this.error({emptyInputs, falseInputs});
    
    return !emptyInputs.length && !falseInputs.length;
  }
  
  async error({emptyInputs, falseInputs}) {
    const form = this;
    
    if (emptyInputs.length) {
      let emptyError = this.formError.add(emptyInputs.length > 1 ? "Пожалуйста, заполните выделенные поля*" : "Пожалуйста, заполните выделенное поле*");
      
      emptyInputs.forEach(emptyInput => {
        if (!emptyInput.error) return false;
        
        emptyInput.errorItem = emptyError;
        emptyInput.error(true);
        
        emptyInput.clearErrorCallback = function () {
          if (this.errorItem.length) form.formError.remove(this.errorItem);
          this.clearErrorCallback = undefined;
        }
      })
      
    } else if (falseInputs.length) {
      falseInputs.forEach(falseInput => {
        if (!falseInput.error) return false;
        
        falseInput.errorItem = this.formError.add(falseInput.errorText);
        falseInput.error(true);
        
        const form = this;
        falseInput.clearErrorCallback = function () {
          if (this.errorItem.length) form.formError.remove(this.errorItem);
          this.clearErrorCallback = undefined;
        }
      })
    }
  }
  
  serialize () {
    let formData = new FormData();
    
    //Main inputs
    this.inputs
      .reduce((result, {input}) => result.concat(input.value), [])
      .forEach(({name, value}) => formData.append(name, value));
  
    //Hidden inputs
    if (this.includeHiddenInputs) {
      this.form.find("input[type=hidden]").each(function() {
        const input = jQuery(this);
        formData.append(input.attr("name"), input.val());
      });
    }
    
    return formData;
  }
  
  clear() {
    this.inputs.forEach(({input}) => input.clear());
  }
  
  reCaptcha() {
    return new Promise((resolve, reject) => {
      if (!window.hasOwnProperty('reCaptchaScriptLoaded')) {
        $.getScript(`https://www.google.com/recaptcha/api.js?render=${reCaptchaSiteKey}`, function () {
          window.reCaptchaScriptLoaded = true;
          this.initReCaptchaToken(resolve, reject);
        }.bind(this));
      } else {
        this.initReCaptchaToken(resolve, reject);
      }
    })
  }
  
  initReCaptchaToken(resolve, reject) {
    grecaptcha.ready(function () {
      grecaptcha.execute(reCaptchaSiteKey, {action: typeof action === "string" ? action : "homepage"}).then(resolve, reject);
    })
  }
  
  yaMetrics(target) {
    try {
      ym(parseInt(yaMetricFormEventId), "reachGoal", target);
    } catch (err) {
      console.error(err);
    }
  }
  
  gAnalytics (target) {
    try {
      gtag('event', target, {'event_category' : 'form-submit'});
    } catch (err) {
      console.error(err);
    }
  }
  
  disable(mode) {
    this.inputs.forEach(({input}) => input.disable(mode));
  }
  
  async ajax({
    url,
    method = "POST",
    enctype = "multipart/form-data",
    processData = false,
    contentType = false,
    cache = false,
    data,
    reCaptcha,
    yaMetrics,
    gAnalytics
  }) {
    if (await this.verify()) {
      //Data prepare
      if (!data) {
        data = this.serialize();
    
        if (!!reCaptcha) {
          try {
            const token = await this.reCaptcha();
            data.append("g-recaptcha-response", token);
          } catch (err) {
            console.log({
              message: "reCaptcha error",
              body: err
            });
          }
        }
      } else {
        try {
          data = await data.bind(this);
        } catch (err) {
          console.error({
            message: "Data custom function error",
            body: err
          });
        }
      }
      
      //Request
      try {
        const response = jQuery.asyncAjax({
          url,
          method,
          enctype,
          processData,
          contentType,
          cache,
          data
        });
  
        if (!!yaMetrics) this.yaMetrics(yaMetrics);
        if (!!gAnalytics) this.gAnalytics(gAnalytics);
        
        return response;
      } catch (err) {
        //Error handler
        if (err.status === 409) {
          if (err.responseText) {
            this.formError.add(err.responseText);
          } else {
            this.formError.add("Ошибка! Пожалуйста, обновите страницу и попробуйте еще раз");
          }
        } else {
          throw {
            message: "Form submit error",
            body: err
          };
        }
      }
    } else {
      //Verify handler error
      throw {
        message: "Form verify error"
      }
    }
  }
}

class FormError {
  constructor(errorWrapper) {
    this.errorWrapper = jQuery(errorWrapper);
  }
  
  add(message) {
    if (!this.errorWrapper.hasClass("form-errors_active")) {
      this.errorWrapper.addClass("form-errors_active");
    }
    
    let newItem = jQuery("<div>", {
      class: "form-errors__item",
      html: message,
      appendTo: this.errorWrapper
    });
    
    setTimeout(() => {
      newItem.addClass("form-errors__item_visible");
    }, 100);
    
    return newItem;
  }
  
  async remove(item) {
    item.removeClass("form-errors__item_visible");
    await setTimeoutAsync(500);
    item.remove();
    
    if (this.errorWrapper.children().length === 0) {
      this.errorWrapper.removeClass("form-errors_active");
    }
    
    return true;
  }
  
  async clear(newError) {
    const allItems = this.errorWrapper.children();
    
    allItems.removeClass("form-errors__item_visible");
    await setTimeoutAsync(500);
    allItems.remove();
    if (!newError) {
      this.errorWrapper.removeClass("form-errors_active");
    }
    
    return true;
  }
}