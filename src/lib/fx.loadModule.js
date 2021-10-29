jQuery(function($){

$.loadModule = ( moduleName, variable, handle ) => {

  $.ajax({
    type: 'POST',
    url: `${site_url}/ajax`,
    data: {
      module: moduleName,
      content: variable
    },
    complete: e => {
      handle.html(e.responseJSON.content)
    },
  });

}

$('[load-module]').each(function(){

  let moduleName = $(this).attr('load-module');
  let variable = $(this).attr('module-options');
  
  $.loadModule(moduleName, variable, $(this));

  $(this).removeAttr('load-module').removeAttr('module-options');

});

});