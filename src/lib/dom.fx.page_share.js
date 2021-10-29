$(document).on('click', '[page-share]', function(event){
  event.preventDefault();

  var SHARE_URL = `${site_url}/${cardapio_url}`;
  
  const SHARE_DATA = {
    title: page_title,
    url: SHARE_URL,
    text: ''
  };

  if (navigator.share) {
    navigator.share(SHARE_DATA);
  }
});