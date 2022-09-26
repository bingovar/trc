import GetParamsString from "./GetParamsString";

export default class {
  items = [];
  sectionSelectHandlers = [];
  initHandlers = [];
  windowElement = null;
  activeSection = null;
  
  constructor({links}) {
    this.items = links
      .filter(link => {
        let parsedLink = link.attr("href").replace(/(#(\w|-|_)+)|(\?.+$)/, "");
        parsedLink = parsedLink[parsedLink.length] !== "/" ? parsedLink + "/" : parsedLink;
      
        return parsedLink === window.location.pathname;
      })
      .map(link => {
        const linkParams = GetParamsString.parse(link.attr("href"));
      
        return {
          name: linkParams.section ? linkParams.section : "indexSection",
          link,
          section: linkParams.section ? jQuery(`#${linkParams.section}`) : false
        };
      })
      .filter(({section}) => section === false || !!section.length);
    
    this.windowElement = jQuery(window);
    
    this.initHandler();
  }
  
  async initHandler() {
    await this.init();
    for (const callback of this.initHandlers) {
      await callback();
    }
  }
  
  async init() {
    this.setAnchorsClickHandlers();
    this.initSection();
    this.updateSectionsPosition();
    this.checkCurrentSection();
    
    this.windowElement.scroll(this.scrollHandler.bind(this));
    this.windowElement.resize(this.windowResizeHandler.bind(this));
  }
  
  onInit(callback) {this.initHandlers.push(callback)}
  
  initSection() {
    const pageParams = GetParamsString.parse();
    const section = jQuery(pageParams.section ? `#${pageParams.section}` : "");
    if (!pageParams.section || !section.length) return false;
    
    this.toSection(section);
  }
  
  async scrollHandler() {
    await this.checkCurrentSection();
  }
  
  async checkCurrentSection() {
    const scrollTopBorder = this.windowElement.scrollTop();
    const offset = this.windowElement.height() / 4;
  
    const promises = this.items.map(async ({name, section, sectionOffsetTop, link}) => {
      if ((scrollTopBorder > sectionOffsetTop[0] - offset) && (scrollTopBorder < sectionOffsetTop[1] - offset) && name !== this.activeSection) {
        this.activeSection = name;
        await this.sectionSelectHandler({name, section, link});
      }
    });
  
    await Promise.all(promises);
  }
  
  windowResizeHandler() {
    this.updateSectionsPosition();
  }
  
  updateSectionsPosition() {
    this.items = this.items.map(({name, link, section}) => {
      if (section === false) return {name, link, section};
      const offsetTop = section.offset().top;
      
      return {
        name,
        link,
        section,
        sectionOffsetTop: [offsetTop, offsetTop + section.height()]
      }
    });
    
    const indexSection = this.items.find(({name}) => name === "indexSection");
    if (!indexSection) return true;
    indexSection.sectionOffsetTop = [0, this.items.reduce((result, item) => item.sectionOffsetTop && (result === null || item.sectionOffsetTop[0] < result) ? item.sectionOffsetTop[0] - 1 : result, null)];
  }
  
  setAnchorsClickHandlers() {
    const toSection = this.toSection.bind(this);
    
    this.items.forEach(({link, section}) => {
      link.click(function(event) {
        event.preventDefault();
        toSection(section);
      });
    });
  }
  
  toSection(section) {
    $('html, body').animate({
      scrollTop: section ? section.offset().top - 100 : 0
    }, 1000);
    
    return true;
  }
  
  async sectionSelectHandler({name, section, link}) {
    await this.sectionSelect({name, section, link});
    for (const callback of this.sectionSelectHandlers) {
      await callback({name, section, link});
    }
  }
  
  async sectionSelect({name, section, link}) {}
  
  onSectionSelect(callback) {this.sectionSelectHandlers.push(callback)}
}