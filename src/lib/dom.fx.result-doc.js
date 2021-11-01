$(document).on('change', '[doc-change]', function(){
  let element_handle = $(this);

  $('[result-doc]').removeClass('active');
  $(`[result-doc*="${element_handle.val()}"]`).addClass('active');

});