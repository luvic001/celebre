jQuery(function($){

  $(document).on('click', '[state-link]', function(event){
    event.preventDefault();

    let element_handle = $(this);
    let page_title = element_handle.attr('title');
    let page_url = `${site_url}${element_handle.attr('href')}`;

    document.title = page_title;

    const page_state = {
      title: page_title,
      url: page_url
    };

    history.pushState(page_state, page_title, page_url);

  });

});