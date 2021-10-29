jQuery(function($){

  $.add_field_error = (field, err_content) => {

    let element_handle = $(field);
    let element_parent = element_handle.parent();
    
    
    if (element_parent.hasClass('input-block')){
      element_parent = element_parent.parent();
    }
    
    element_parent.addClass('field-error');
    element_parent.find('.field-error-alert').remove();
    element_parent.append(`<p class="field-error-alert">${err_content}</p>`);
    

  }

  $(document).on('change', 'input, select', function(){
    let element_handle = $(this);
    let element_parent = element_handle.parent();
    
    if (element_parent.hasClass('input-block')){
      element_parent = element_parent.parent();
    }

    element_parent.removeClass('field-error');
    element_parent.find('.field-error-alert').remove();

  });

});