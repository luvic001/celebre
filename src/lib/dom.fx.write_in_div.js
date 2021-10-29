jQuery(function(){

  $.write_in_div = (element_target, content) => {
    let element_handle = $(element_target);
    element_handle.html(content);
  };

});