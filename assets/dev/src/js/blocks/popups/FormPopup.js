import Modal from "../../Modal";
import StandartForm from "../forms/StandartForm";
import {ajaxFormHandlerUrl} from "../../helpers/constants";
import ThanksPopup from "./ThanksPopup";

export default class extends Modal {
  async beforeShow() {
    this.form = new StandartForm(this.elements.popup.find("form"));
  
    this.form.submit = async () => {
      await this.form.ajax({
        url: ajaxFormHandlerUrl,
        yaMetrics: this.form.form.attr("data-yandex-key"),
        gAnalytics: this.form.form.attr("data-google-key"),
        reCaptcha: true
      });
    
      const thanksPopup = new ThanksPopup();
      await thanksPopup.switch({
        prevPopup: this
      });
    }
  }
}