import "jquery.maskedinput/src/jquery.maskedinput";
import "./default-options/maskedInput";
import "ion-rangeslider/js/ion.rangeSlider";

export class TextInput {
  clearErrorCallback;
  changeCallbacks = [];
  focusCallbacks = [];
  
  constructor({element, type, onFocus, onChange}) {
    this.wrapper = jQuery(element);
    this.input = this.wrapper.find(".input__input");
    this.title = this.wrapper.find(".input__title");
    this.type = type;
    if (onChange) this.onChange(onChange);
    if (onFocus) this.onFocus(onFocus);
    
    switch (this.type) {
      case "email":
        this.verify = this.emailVerify;
        this.errorText = "Извините, введен некорректный электронный адрес";
        break;
      case "name":
        this.verify = this.nameVerify;
        this.errorText = "Извините, введено некоректное имя";
        break;
      case "link":
        this.verify = this.linkVerify;
        this.errorText = "Некорректная ссылка";
        break;
      default:
        this.verify = this.textVerify;
        break;
    }
    
    this.input
      .keyup(async event => {
        if (event.keyCode === 13) return true;
        this.error();
        await this.changeHandler();
        if (!!this.clearErrorCallback) this.clearErrorCallback.call(this);
      })
      .focus(this.focusHandler.bind(this));
  }
  
  error(mode) {
    if (mode) {
      this.wrapper.addClass("input-error");
    } else {
      this.wrapper.removeClass("input-error");
    }
  }
  
  emailVerify() {
    if (!this.input.val()) {
      return null;
    } else if (!this.input.val().match(/^[A-Za-z0-9!#$%&'*+/=?^_'{|}~]([A-Za-z]|[!#$%&'*+/=?^_'{|}~]|\w|\-|\.)+@([A-Za-z]|[!#$%&'*+/=?^_'{|}~]|\w|\-|\.)+\.[A-Za-z]+$/)) {
      return false;
    } else {
      return true;
    }
  }
  
  nameVerify() {
    if (!this.input.val()) {
      return null;
    } else if (!this.input.val().match(/[А-Яа-яA-Za-z]{2}/)) {
      return false;
    } else {
      return true;
    }
  }
  
  linkVerify() {
    if (!this.input.val()) {
      return null;
    } else if (!this.input.val().match(/^(http|https):\/\/.+\..+/)) {
      return false;
    } else {
      return true;
    }
  }
  
  textVerify() {
    if (!this.input.val()) {
      return null;
    } else {
      return true;
    }
  }
  
  get value() {
    return [
      {
        name: this.input.attr("name"),
        value: this.input.val()
      }
    ]
  }
  
  set value(newValue) {
    this.input.val(newValue);
  }
  
  clear() {
    this.input.val("");
    return true;
  }
  
  disable(mode) {
    if (mode) {
      this.input.attr("disabled", true);
      this.wrapper.addClass("input-disabled");
    } else {
      this.input.attr("disabled", true);
      this.wrapper.removeClass("input-disabled")
    }
  }
  
  async changeHandler() {
    await this.change(this.value);
    for (const callback of this.changeCallbacks) {
      await callback.call(this, this.value)
    }
  }
  
  async change() {}
  
  onChange(callback) {this.changeCallbacks.push(callback)}
  
  async focusHandler() {
    await this.focus();
    for (const callback of this.focusCallbacks) {
      await callback.call(this);
    }
  }
  
  async focus() {}
  
  onFocus(callback) {this.focusCallbacks.push(callback)}
}

export class NumberInput extends TextInput {
  constructor({element, onFocus, onKey}) {
    super({element, onFocus, onKey});
    this.verify = this.numVerify;
    
    this.input.off("keyup");
    this.input.on("keypress paste", async event => {
      if (event.type === "paste") {
        event.preventDefault();
        const paste = event.originalEvent.clipboardData.getData("text/plain");
        const pasteNumber = paste.match(/[0-9]+(\.[0-9]+)?/m);
        if (pasteNumber) window.document.execCommand('insertText', false, pasteNumber[0]);
      } else {
        const key = String.fromCharCode(event.keyCode);
        if (!/[0-9]|\./.test(key)) {
          event.preventDefault();
        } else {
          await this.changeHandler();
        }
      }
    });
    
    this.input.on("input", this.changeHandler.bind(this));
    this.input.on("change", async () => {
      const inputNumberValue = this.input.val().match(/[0-9]+(\.[0-9]+)?/m);
      const number = inputNumberValue ? inputNumberValue[0] : "";
      if (number !== this.input.val()) this.input.val(number);
      await this.changeHandler();
    });
  }
  
  numVerify() {
    if (!this.input.val()) {
      return null;
    } else {
      const inputNumberValue = this.input.val().match(/[0-9]+(\.[0-9]+)?/m);
      const number = inputNumberValue ? inputNumberValue[0] : "";
      return number === this.input.val();
    }
  }
}

export class PhoneInput extends TextInput {
  constructor({element, onFocus, onKey}) {
    super({
      type: "phone",
      element,
      onFocus,
      onKey
    });
    
    //Set verify type
    this.verify = this.phoneVerify;
    this.errorText = "Введите корректный номер телефона";
    
    this.setMask();
    
    this.input.click(this.setCursorPosition.bind(this));
  }
  
  setCursorPosition() {
    const currentPosition = this.input.get(0).selectionStart;
    const currentText = this.input.val().match(/^\+(\d|\s|\-)+/);
    const endTextPosition = currentText ? currentText[0].length : 0;
    
    if (endTextPosition < currentPosition) this.input.get(0).setSelectionRange(endTextPosition, endTextPosition);
  }
  
  setMask() {
    const mask = "+375 ## ###-##-##";
    const placeholder = "+375 __ ___-__-__";
  
    this.input.mask(mask, {
      autoclear: false
    });
    this.input.attr("placeholder", placeholder);
  }
  
  phoneVerify() {
    let phone = this.input.val().replace(/-|\s|_/ig, "");
    
    if (!phone) {
      return null;
    } else if (~this.input.val().indexOf("_")) {
      return false;
    }
  
    if (phone.length >= 6 && !phone.match(/^\+375(29|44|33|25|16|17|15|21|22|23)/)) {
      return false;
    } else if (phone.match(/^\+375(\d{2})(1{7}|2{7}|3{7}|4{7}|5{7}|6{7}|7{7}|8{7}|9{7}|0{7})/)) {
      return false;
    } else {
      return true;
    }
  }
}

export class RangeBarInput {
  onChangeCallbacks = [];
  settings = {};
  clearErrorCallback = null;
  
  constructor({element, settings, onChange, allow}) {
    this.input = jQuery(element);
    this.allow = allow ? String(allow).toString().split("-").map(item => parseInt(item)) : null;
    this.settings = settings;
    if (onChange) this.onChange(onChange);
    
    settings.onStart = settings.onChange = this.changeHandler.bind(this);
    this.input.ionRangeSlider(this.settings);
    this.rangeSlider = this.input.data("ionRangeSlider");
  }
  
  async changeHandler() {
    await this.change(this.value);
    for (const callback of this.onChangeCallbacks) {
      await callback.call(this, this.value);
    }
    if (!!this.clearErrorCallback) this.clearErrorCallback.call(this);
  }
  
  onChange(callback) {this.onChangeCallbacks.push(callback)}
  
  async change() {}
  
  set value(newValue) {
    newValue = typeof newValue === "number" ? [newValue] : newValue.split("-").map(value => parseInt(value));
    
    this.rangeSlider.update({
      from: newValue[0],
      to: newValue[1]
    });
  }
  
  get value() {
    return [
      {
        name: this.input.attr("name"),
        value: this.input.val().split(";").join("-")
      }
    ];
  }
  
  verify() {
    if (!this.allow) return true;
    
    const [from, to] = this.value[0].value.split("-").map(item => parseInt(item));
    let [allowFrom, allowTo] = this.allow;
    if (!allowTo) allowTo = this.settings.max;
    
    if (this.settings.type && this.settings.type === "double") {
      return from >= allowFrom && to <= allowTo;
    } else {
      return from >= allowFrom && from <= allowTo
    }
  }
}

export class RangeInputWithNumber extends RangeBarInput {
  constructor({element, settings, onChange, numberInput, allow}) {
    super({element, settings, onChange, numberInput, allow});
    this.numberInput = numberInput;
  
    this.numberInput.onChange(([{value}]) => {
      this.value = value;
    });
  }
  
  async change([{value}]) {
    await super.change();
    
    this.numberInput.value = parseInt(value) ? value : "";
  }
}

export class CheckboxInput {
  changeCallbacks = [];
  elements = {};
  clearErrorCallback = null;
  
  constructor({element, onChange}) {
    this.elements.wrapper = jQuery(element);
    this.elements.input = this.elements.wrapper.children(".checkbox__input");
    this.elements.title = this.elements.wrapper.children(".checkbox__title");
    
    if (onChange) this.onChange(onChange);
    
    this.elements.input.on("change", this.changeHandler.bind(this));
  }
  
  async changeHandler() {
    await this.change(this.value);
    for (const callback of this.changeCallbacks) {
      await callback.call(this, this.value);
    }
    if (!!this.clearErrorCallback) this.clearErrorCallback.call(this);
  }
  
  async change() {}
  
  onChange(callback) {this.changeCallbacks.push(callback)}
  
  get value() {
    return [{
      name: this.elements.input.attr("name"),
      value: this.elements.input.is(":checked") ? this.elements.input.val() : ""
    }]
  }
  
  set value(value) {
    this.elements.input.attr("checked", !!value);
  }
  
  error(mode) {
    if (mode) {
      this.elements.wrapper.addClass("checkbox-error");
    } else {
      this.elements.wrapper.removeClass("checkbox-error");
    }
  }
  
  verify() {
    return this.elements.input.is(":checked") ? true : null;
  }
  
  disable(mode) {
    this.elements.input.attr("disabled", !!mode);
    if (mode) {
      this.elements.wrapper.addClass("checkbox-disable");
    } else {
      this.elements.wrapper.removeClass("checkbox-disable");
    }
  }
}

export class MultiCheckboxInput {
  changeCallbacks = [];
  inputs = [];
  clearErrorCallback = null;
  
  constructor({inputs, onChange}) {
    if (onChange) this.onChange(onChange);
    this.inputs = inputs;
    this.inputs.forEach(input => input.onChange(this.changeHandler.bind(this)));
  }
  
  get value() {
    const value = this.inputs.reduce((result, input) => {
      const [{value}] = input.value;
      return result + (value ? `${result ? ", " : ""}${value}` : "");
    }, "");
    const [{name}] = this.inputs[0].value;
    
    return [{
      name,
      value
    }];
  }
  
  verify() {
    return this.inputs.some(input => input.verify()) ? true : null;
  }
  
  error(mode) {
    this.inputs.forEach(input => input.error(mode));
  }
  
  disable(mode) {
    this.inputs.forEach(input => input.disable(mode));
  }
  
  async changeHandler() {
    await this.change(this.value);
    for (const callback of this.changeCallbacks) {
      await callback.call(this, this.value);
    }
    if (!!this.clearErrorCallback) this.clearErrorCallback.call(this);
  }
  
  async change() {}
  
  onChange(callback) {this.changeCallbacks.push(callback)}
}

export class HiddenInput {
  constructor({element}) {
    this.input = jQuery(element);
  }
  
  get value() {
    return [{
      name: this.input.attr("name"),
      value: this.input.val()
    }];
  }
  
  set value(newValue) {
    this.input.val(newValue)
  }
  
  verify() {
    return this.input.val().length ? this.input.val() : null;
  }
}

export class RadioInput {
  onChangeCallbacks = [];
  clearErrorCallback = null;
  
  constructor({elements, onChange}) {
    if (onChange) this.onChange(onChange);
    this.elements = elements.map(element => {
      return {
        wrapper: element,
        input: element.children(".radio__input"),
        title: element.children(".radio__title")
      }
    });
    
    this.elements.forEach(element => element.input.on("change", this.changeHandler.bind(this)));
  }
  
  async changeHandler() {
    await this.change();
    for (const callback of this.onChangeCallbacks) {
      await callback.call(this);
    }
    if (!!this.clearErrorCallback) this.clearErrorCallback.call(this);
  }
  
  async change() {}
  
  onChange(callback) {this.onChangeCallbacks.push(callback)}
  
  get value() {
    const checkedInput = this.elements.find(element => element.input.is(":checked"));
    
    return [{
      name: this.elements[0].input.attr("name"),
      value: checkedInput ? checkedInput.input.val() : ""
    }];
  }
  
  verify() {
    return this.elements.some(element => element.input.is(":checked")) ? true : null;
  }
  
  disable(mode) {
    this.elements.forEach(element => {
      if (mode) {
        element.wrapper.addClass("radio-disabled");
      } else {
        element.wrapper.removeClass("radio-disabled");
      }
      
      element.input.attr("disable", !!mode);
    });
  }
  
  error(mode) {
    this.elements.forEach(element => {
      if (mode) {
        element.wrapper.addClass("radio-error");
      } else {
        element.wrapper.removeClass("radio-error");
      }
    })
  }
}

export class FileInput {
  onChangeCallbacks = [];
  elements = {};
  
  constructor({element, onChange}) {
    this.elements.wrapper = jQuery(element);
    this.elements.names = this.elements.wrapper.find(".file-input__names-block");
    this.elements.input = this.elements.wrapper.find(".file-input__input");
    this.elements.title = this.elements.wrapper.find(".file-input__title");
    
    if (onChange) this.onChange(onChange);
    this.elements.input.on("change", this.changeHandler.bind(this));
  }
  
  async changeHandler() {
    await this.change();
    for (const callback of this.onChangeCallbacks) {
      await callback.call(this);
    }
  }
  
  async change() {
    const filesNames = [...this.elements.input[0].files].reduce((result, file) => result + `${result ? ", " : ""}${file.name}`,"");
    this.elements.names.html(filesNames);
  }
  
  onChange(callback) {this.onChangeCallbacks.push(callback)}
  
  get value() {
    const files = [...this.elements.input[0].files];
    const inputName = this.elements.input.attr("name");
    
    return files.map(file => {
      return {
        name: inputName,
        value: file
      }
    });
  }
  
  disable(mode) {
    this.elements.input.attr("disabled", !!mode);
    if (mode) {
      this.elements.input.addClass("file-input-disable");
    } else {
      this.elements.input.removeClass("file-input-disable");
    }
  }
  
  verify() {
    return true;
  }
}