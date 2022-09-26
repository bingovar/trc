import Form from "../../Form";
import {PhoneInput, TextInput, RadioInput, FileInput} from "../../Inputs";
import {ajaxFormHandlerUrl} from "../../helpers/constants";
import ThanksPopup from "../popups/ThanksPopup";
import Modal from "../../Modal";

export default class extends Form {
  constructor(props) {
    super(props);
    
    this.form.find(".input").arr().forEach(inputElement => {
      if (inputElement.children("input").attr("type") === "tel") {
        const input = new PhoneInput({
          element: inputElement
        });
    
        this.addInput({
          input,
          required: true
        });
      } else {
        const input = new TextInput({
          element: inputElement,
          type: inputElement.children("input").attr("name")
        });
    
        this.addInput({
          input,
          required: false
        });
      }
    });
    
    const radioInputsObject = this.form.find(".radio").arr().reduce((result, element) => {
        const name = element.find(".radio__input").attr("name");
        if (!result[name]) result[name] = [];
        result[name].push(element);
        
        return result;
      }, {});
    Object.values(radioInputsObject)
      .map(elements => new RadioInput({elements}))
      .forEach(radioInput => this.addInput({
        input: radioInput,
        required: false
      }));
    
    this.form.find(".file-input").arr().forEach(fileInputElement => {
      const fileInput = new FileInput({
        element: fileInputElement
      });
      
      this.addInput({
        input: fileInput,
        required: false
      });
    });
    
    this.form.find("*[data-policy-link]").click(async event => {
      event.preventDefault();
      const policyPopup = new Modal({
        link: "/popup/policy/"
      });
      await policyPopup.open();
    })
  }
  
  async submit(event) {
    await this.ajax({
      url: ajaxFormHandlerUrl,
      yaMetrics: this.form.attr("data-yandex-key"),
     gAnalytics: this.form.attr("data-google-key"),
      reCaptcha: true
    });
  
    this.clear();
    const thanksPopup = new ThanksPopup();
    await thanksPopup.open();
  }
  
}