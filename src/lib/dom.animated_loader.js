jQuery(function($){

  $.open_loader = () => {
    $('body').addClass('fx-loading');
  };

  $.close_loader = () => {
    $('body').removeClass('fx-loading');
  }

});