$(document).on('click', '[password-toggle]', function(event){
  event.preventDefault();

  let element_handle = $(this);
  let element_parent = element_handle.parent();

  
  var input_target = element_parent.find('input');
  var input_type = input_target.attr('type');
  
  if (input_type == 'password') {
    element_handle.addClass('is-reveal');
    input_target.attr('type', 'text');
  }
  else {
    element_handle.removeClass('is-reveal');
    input_target.attr('type', 'password');
  }

});