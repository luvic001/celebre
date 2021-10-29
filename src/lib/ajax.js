jQuery(function($){

  $.checkFieldOnBackend = field => {
    
    if (typeof (field) !== 'object') {
      return false;
    }

    $.ajax({
      url: `${site_url}/check-field`,
      data: {
        fieldName: field.attr('name'),
        fieldData: field.val()
      },
      type: 'POST',
      complete: e => {

        if (e.status !== 200){
          return false;
        }
        res = e.responseJSON;

        if (res.success) field.removeClass('field-error').addClass('field-valid');
        else field.addClass('field-error').removeClass('field-valid');

      }

    });

  }

  $.validateField = field => {
    $.checkFieldOnBackend(field);
  }

  $(document).on('blur', '[checkField]', function(){
    let field = $(this);
    $.validateField(field);
  });

});