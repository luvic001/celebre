jQuery(function($){

  $(document).on('submit', '[ajax-form]', function(event){
    event.preventDefault();
    form = $(this);
    formData = new FormData(form[0]);

    $.ajax({
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      url: `${site_url}/${form.attr('action')}`,
      beforeSend: () => {
        $.writeInPopup('', siteLoader);
        $.openPopup();
        form.find('input:submit, button').attr('disabled', 'disabled');
      },
      complete: e => {
        form.find('input:submit, button').removeAttr('disabled');
        let title = (e.status == 200) ? e.responseJSON.title : 'Ops!!';
        $.writeInPopup(title, e.responseJSON.content);
        if (e.status == 200) form[0].reset();
      }
    });
  });

});