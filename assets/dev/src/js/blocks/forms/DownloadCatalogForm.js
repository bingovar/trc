import StandartForm from "./StandartForm";
import {ajaxFormHandlerUrl} from "../../helpers/constants";
import ThanksPopup from "../popups/ThanksPopup";
import {catalogPdfUrl} from "../../helpers/constants";
import { saveAs } from "file-saver";

export default class DownloadCatalogForm extends StandartForm {
  async submit() {
    await this.ajax({
      url: ajaxFormHandlerUrl,
      yaMetrics: this.form.attr("data-yandex-key"),
      reCaptcha: true
    });

    saveAs(catalogPdfUrl, "Kerland_Price_List_2022.08.31.pdf");

    this.clear();
    const thanksPopup = new ThanksPopup();
    await thanksPopup.open();
  }
}