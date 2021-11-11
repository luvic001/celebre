$(document).on('change', '[realtime-search]', function(){
  let element_value = $(this).val();
  $.realtime_search(element_value);
});

$(document).on('submit', '[realtime-search-form]', function(event){
  event.preventDefault();
  let element_value = $(this).find('[realtime-search]').val();
  $.realtime_search(element_value);
});

$.realtime_search = search_value => {
  $.post(`${site_url}/search-user`, {
    "search_term" : search_value
  }).done(response_data => {
    $('[realtime-response]').html(response_data.content);
  });
}