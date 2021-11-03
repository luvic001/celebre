$(document).on('click', '[delete-client]', function(event){
  event.preventDefault();

  confirmacao = confirm(`Você tem certeza de que deseja ${$(this).attr('title')}`);

  if (confirmacao) {
    $.ajax({
      type: 'POST',
      url: `${site_url}/excluir-cliente`,
      data: {
        client: $(this).attr('delete-client'),
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
  }

});