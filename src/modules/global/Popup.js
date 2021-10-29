$ = jQuery;

$.openPopup = () => {
  $('body').addClass('popup-open');
};

$.writeInPopup = (popupTitle, popupContent) => {
  $('section.popup-site').find('.head').children('h3').html(popupTitle);
  $('section.popup-site').find('.response-content').html(popupContent);
};

$.get_template_content = template_handle => {
  return $(template_handle).html();
}

$.resetPopup = () => {
  $.writeInPopup('', '');
}

$.closePopup = () => {
  $.resetPopup();
  $('body').removeClass('popup-open');
};

$(document).on('click', '[open-popup-template]', function(event){
  event.preventDefault();

  let template_content = $(this).attr('open-popup-template');
  $.openPopup();
  $.writeInPopup(null, $.get_template_content(template_content));
  
});