jQuery(function($){

$.openModule = ( moduleName, variable, target, showPopup = true, caller = false, curHTML = false) => {

  $.ajax({
    type: 'POST',
    url: `${site_url}/ajax`,
    data: {
      module: moduleName,
      content: variable
    },
    beforeSend: () => {
      if (showPopup == true) {
        $.writeInPopup('', siteLoader);
        $.openPopup();
      }
    },
    complete: e => {
      
      if (caller)
        caller.html(curHTML);

      if (showPopup !== true) {
        target.html(e.responseJSON.content)
      }
      else {

        if (isset(e.responseJSON.content)){
          $.writeInPopup('', e.responseJSON.content);
        }
        else {
          $.closePopup();
        }

      }
    },
  });

}

$(document).on('click', '[open-module]', function(event){

  event.preventDefault();

  let moduleName = $(this).attr('href');
  let variable = $(this).attr('open-module');
  let showPopup = $(this).attr('show-popup');
  let target = $(this).attr('module-target');

  if ($(this).attr('loading-here')) {

    curHTML = $(this).html();
    $(this).html(siteLoader);
    
    target = target ? $(target) : $(this)
    
    $.openModule(moduleName, variable, target, showPopup, $(this), curHTML);
    
  }
  else {
    $.openModule(moduleName, variable, target, showPopup);
  }

});

  
});