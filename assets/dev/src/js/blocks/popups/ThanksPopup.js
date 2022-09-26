import Modal from "../../Modal";

export default class extends Modal {
  constructor() {
    super({
      link: "/popup/thanks"
    });
  }
  
  async beforeShow() {
    await super.beforeShow();
    
    this.elements.popup.find(".fancy-class").click(function(event) {
      event.preventDefault();
      const videoLink = jQuery(this);
      
      jQuery.fancybox.open([
        {
          src: videoLink.attr("href")
        }
      ]);
    });
  }
}