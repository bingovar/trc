import Modal from "../../Modal";
import StandartForm from "../forms/StandartForm";
import {ajaxFormHandlerUrl, catalogPdfUrl} from "../../helpers/constants";
import ThanksPopup from "./ThanksPopup";
import { saveAs } from "file-saver";

export default class extends Modal {
  async beforeShow() {
    this.form = new StandartForm(this.elements.popup.find("form"));

    this.form.submit = async () => {
      await this.form.ajax({
        url: ajaxFormHandlerUrl,
        yaMetrics: this.form.form.attr("data-yandex-key"),
        reCaptcha: true
      });

      saveAs(catalogPdfUrl, "Kerland_Price_List_2022.08.31.pdf");

      const thanksPopup = new ThanksPopup();
      await thanksPopup.switch({
        prevPopup: this
      });
    }
  }
}