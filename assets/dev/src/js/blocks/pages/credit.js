import Sections from "../../util/Sections";
import GetParamsString from "../../util/GetParamsString";

export default class {
  constructor() {
    const navLinks = jQuery("#menu-menju-2").find("li a").arr();
    const navAnchorLinks = navLinks.filter(link => {
      let parsedLink = link.attr("href").replace(/(#(\w|-|_)+)|(\?.+$)/, "");
      parsedLink = parsedLink[parsedLink.length - 1] !== "/" ? parsedLink + "/" : parsedLink;
  
      return parsedLink === window.location.pathname;
    });
    
    const sections = new Sections({
      links: navAnchorLinks
    });
    
    const titles = {
      "credit": "Рассрочка",
      "service": "Сервис",
      "delivery": "Доставка",
      "indexSection": document.title
    }
    
    sections.onSectionSelect(({name, link: currentLink}) => {
      if (titles[name]) document.title = titles[name];
      
      navAnchorLinks.forEach(link => {
        if (link.is(currentLink)) {
          link.parent().addClass("current-menu-item");
        } else {
          link.parent().removeClass("current-menu-item");
        }
      });
    })
  }
}