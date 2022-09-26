jQuery.asyncAjax = (param) => {
  return new Promise((resolve, reject) => {
    param.success = resolve;
    param.error = reject;
    jQuery.ajax(param);
  })
}

jQuery.fn.arr = function() {
  return jQuery(this).toArray().map(item => jQuery(item));
}