jQuery(function($){

  let ELEMENTS_ARE_FIXED = $('body').hasClass('elements-fixed-on-top');

  $(document).on('click', '[open-search]', function(event){
    event.preventDefault();
    $('.search-toggle').click();
  });

  $(document).on('click', '.search-toggle', function(event){
    event.preventDefault();

    let element_handle = $(this);
    $.open_search(element_handle);

  });

  $(document).on('click', '.search-close', function(event){
    event.preventDefault();

    let element_handle = $(this);
    let element_parent = element_handle.parents().eq(1);

    if (!ELEMENTS_ARE_FIXED) {
      $('.filter-space').removeAttr('style');
    }

    element_parent.find('form').fadeOut(400, function(){
      element_parent.find('.search-toggle').removeClass('search-open');
      element_parent.removeClass('search-open');
      $('.search-space').removeClass('search-open');
    });
  });

  $.open_search = element_handle => {

    let element_parent = element_handle.parent();
    
    if (!ELEMENTS_ARE_FIXED) {
      $('.filter-space').css('display', 'flex');
    }

    element_handle.addClass('search-open');
    element_handle.parent().addClass('search-open');
    element_parent.find('form').fadeIn(400, function(){
      element_parent.find('input').focus();
    });

  }

});