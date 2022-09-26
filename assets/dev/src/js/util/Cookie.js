export default class {
  
  static set(name, value, days = 0) {
    let expires = "";
    
    if (days) {
      let date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    
    return true;
  }
  
  static get(name) {
    const nameEQ = name + "=";
    const cookieArray = document.cookie.split(';');
    let result = null;
    
    cookieArray.forEach(item => {
      
      while (item.charAt(0) === ' ') item = item.substring(1, item.length);
      
      if (item.indexOf(nameEQ) === 0) {
        result = item.substring(nameEQ.length,item.length);
      }
      
    });
    
    return result;
  }
  
  static getJSON(name) {
    try {
      const cookie = this.get(name);
      
      return cookie ? JSON.parse(cookie) : null;
    } catch (err) {
      console.error(err);
      return false;
    }
  }
  
  static setJSON(name, value, days = 0) {
    try {
      return this.set(name, JSON.stringify(value), days);
    } catch (err) {
      console.error(err);
      return false;
    }
  }
  
  static erase(name) {
    document.cookie = name +'=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';
  }
  
}