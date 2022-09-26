import MultiPagePopup from "./MultiPagePopup";
import {NumberInput, RangeInputWithNumber, CheckboxInput, MultiCheckboxInput, PhoneInput, HiddenInput} from "../../Inputs";
import Form from "../../Form";
import setTimeoutAsync from "../../helpers/setTimeoutAsync";
import {ajaxFormHandlerUrl} from "../../helpers/constants";
import ThanksPopup from "./ThanksPopup";

export default class extends MultiPagePopup {
  inputs = [];
  
  constructor() {
    super({
      link: "/popup/technics-select/"
    });
  }
  
  async beforeShow() {
    this.elements.pageNum = this.elements.popup.find(".technics-select-popup__questions-number, .technics-select-popup__page-num");
    this.elements.progressBar = this.elements.popup.find(".progress-bar__line");
    this.elements.buttons = {
      prev: this.elements.popup.find(".technics-select-popup__button_prev"),
      next: this.elements.popup.find(".technics-select-popup__button_next"),
      clickInformation: this.elements.popup.find(".technics-select-popup__click-information")
    };
    this.elements.form = this.elements.popup.find("form");
    this.elements.informationBlocks = {
      main: this.elements.popup.find(".technics-select-popup__information-block_main"),
      result: this.elements.popup.find(".technics-select-popup__information-block_result")
    }
    this.elements.questionsResults = {
      0: this.elements.popup.find("#question-result-1"),
      1: this.elements.popup.find("#question-result-2"),
      2: this.elements.popup.find("#question-result-3")
    }
  
    await super.beforeShow();
    
    this.initButtons();
    this.initSliderPage(0);
    this.initSliderPage(1);
    this.initCheckboxPage(2);
    this.initSubmitPage();
  }
  
  initButtons() {
    this.elements.buttons.next.click(async event => {
      event.preventDefault();
      
      if (this.currentPage !== 3) {
        await this.nextPage();
      } else {
        this.inputs[this.pagesCount - 1].value = "Нужен";
        this.elements.form.submit();
      }
    });
    
    this.elements.buttons.prev.click(async event => {
      event.preventDefault();
      
      if (this.currentPage !== 3) {
        await this.prevPage();
      } else {
        this.inputs[this.pagesCount - 1].value = "Не нужен";
        this.elements.form.submit();
      }
    });
  }
  
  async updateButtons(pageNum) {
    if (pageNum === 3) {
      this.elements.buttons.prev.removeClass("button_regular");
      this.elements.buttons.prev.addClass("technics-select-popup__button_submit");
      this.elements.buttons.prev.html("Мне не нужен подарок");
      this.elements.buttons.next.addClass("technics-select-popup__button_submit");
      this.elements.buttons.next.html("Мне нужен подарок");
      this.elements.buttons.next.attr("disabled", false);
      
      return true;
    }
    
    this.elements.buttons.next.attr("disabled", this.inputs[pageNum] ? !this.inputs[pageNum].verify() : true);
    
    if (pageNum === 0) {
      this.elements.buttons.prev.addClass("technics-select-popup__button_hide");
      await setTimeoutAsync(300);
      this.elements.buttons.prev.css("display", "none");
      this.elements.buttons.clickInformation.css("display", "inherit");
      await setTimeoutAsync(100);
      this.elements.buttons.clickInformation.removeClass("technics-select-popup__click-information_hide");
      await setTimeoutAsync(300);
      
      return true;
    }
  
    this.elements.buttons.clickInformation.addClass("technics-select-popup__click-information_hide");
    await setTimeoutAsync(300);
    this.elements.buttons.clickInformation.css("display", "none");
    this.elements.buttons.prev.css("display", "inherit");
    await setTimeoutAsync(100);
    this.elements.buttons.prev.removeClass("technics-select-popup__button_hide");
    await setTimeoutAsync(300);
    
    return true;
  }
  
  initSliderPage(pageNum) {
    const page = this.pages[pageNum];
    const nextButton = this.elements.buttons.next;
  
    //Input handler
    const numberInput = new NumberInput({
      element: page.find(".input")
    });
    const rangeBarInput = new RangeInputWithNumber({
      element: page.find(".js-range-slider"),
      settings: {
        min: 0,
        max: pageNum === 0 ? 1000 : 110,
        grid: true,
        from: 0,
        grid_num: 10
      },
      allow: 1,
      numberInput
    });
    
    numberInput.onChange(checkNextButton);
    rangeBarInput.onChange(checkNextButton);
    function checkNextButton() {
      nextButton.attr("disabled", !this.verify());
    }
  
    this.inputs[pageNum] = numberInput;
  }
  
  initCheckboxPage(pageNum) {
    const page = this.pages[pageNum];
    const nextButton = this.elements.buttons.next;
  
    const checkboxes = page.find(".checkbox").arr()
      .map(element => new CheckboxInput({element}))
      .reduce((result, checkbox) => result.concat([checkbox]), []);
  
    const checkboxesInput = new MultiCheckboxInput({
      inputs: checkboxes
    });
    
    checkboxesInput.onChange(function() {
      nextButton.attr("disabled", !this.verify());
    });
  
    this.inputs[pageNum] = checkboxesInput;
  }
  
  initSubmitPage() {
    const page = this.pages[this.pagesCount - 1];
    
    //Add hidden inputs
    const hiddenInputs = page.find("input[type=hidden]").arr().map(inputElement => {
      return new HiddenInput({
        element: inputElement
      });
    });
    this.inputs = this.inputs.concat(hiddenInputs);
    
    //Form init
    const phoneInput = new PhoneInput({
      element: page.find(".input")
    });
    
    this.form = new Form(this.elements.form, [{
        input: phoneInput,
        required: true
    }], {
      includeHiddenInputs: false
    });
    
    this.inputs.forEach(input => this.form.addInput({
      input,
      required: false
    }));
    
    this.form.onSubmit(async () => {
      await this.form.ajax({
        url: ajaxFormHandlerUrl,
        yaMetrics: "podbor_tehniki",
        reCaptcha: true
      });
  
      const thanksPopup = new ThanksPopup();
      await thanksPopup.switch({
        prevPopup: this
      });
    });
  }
  
  async updateInformationBlock(pageNum) {
    if (pageNum === 3) {
      //Fill questions results
      this.inputs.slice(0, 3).forEach((input, index) => {
        let [{value}] = input.value;
        if (index === 2) value = value.split(",").map(item => item.trim()).join("<br>");
        
        this.elements.questionsResults[index].html(value);
      });
      
      this.elements.informationBlocks.result.css("display", "inherit");
      this.elements.informationBlocks.main.css("display", "none");
    } else {
      this.elements.informationBlocks.result.css("display", "none");
      this.elements.informationBlocks.main.css("display", "inherit");
    }
  }
  
  async pageSwitch(pageNum) {
    this.elements.pageNum.text(pageNum + 1);
    
    const percentStep = 100 / (this.pagesCount);
    this.elements.progressBar.css("width", `${percentStep * pageNum}%`);
  
    await this.updateButtons(pageNum);
    await this.updateInformationBlock(pageNum);
  }
}