$ = jQuery;

$(document).on('click', '[ajax-link]', function(event) {
  event.preventDefault();
  
  let ajaxContent = $(this).attr('ajax-link');
  let ref = $(this).attr('href');
  let cID = $(this).attr('ID');

  $.ajax({
    type: 'POST',
    url: `${site_url}/ajax`,
    data: {
      module: ref,
      callerID: cID,
      data: ajaxContent
    },
    beforeSend: () => {
      $.writeInPopup('', siteLoader);
      $.openPopup();
    },
    complete: e => {
      let title = (e.status == 200) ? e.responseJSON.title : 'Ops!!';
      $.writeInPopup(title, e.responseJSON.content);
    }
  });

});
