export default class {
  static parse(url = window.location.href) {
    url = decodeURIComponent(url);
    let params = url.match(/\?.+$/);
    if (!params) return {};
    
    let parsedParams = params[0].substr(1).split("&").map(param => param.split("="));
    
    return Object.fromEntries(parsedParams);
  }
  
  static stringify(params) {
    return Object.entries(params).reduce((result, [name, value]) => `${result.length ? "&" : ""}${encodeURIComponent(name)}=${encodeURIComponent(value)}`, "")
  }
  
  static update({url, params}) {
    const currentParams = this.parse(url);
    
    Object.entries(params).forEach(([name, value]) => {
      currentParams[name] = value;
    });
    
    return this.stringify(currentParams);
  }
}