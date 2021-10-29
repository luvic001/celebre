
  $(document).on('change', '[toggle-target]', function(){
    
    let element_handle = $(this);
    let element_value = element_handle.val();
    let element_target = element_handle.attr('toggle-target');
    
    $(`[toggle-scope="${element_target}"]`).hide();
    $(`[toggle-scope="${element_target}"][toggle-id="${element_value}"]`).show();
    
  });
