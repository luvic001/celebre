$(document).on('click', '[fill-date-fields-checkbox]', function(){

  let element_handle = $(this);
  let element_targets = element_handle.attr('fill-date-fields-checkbox');

  date_field = element_targets.split('|')[0];
  time_field = element_targets.split('|')[1];

  if ($(this).is(':checked')) {
    $.post(`${site_url}/get-time`, data => {
      $(`#${date_field}`).val(data.date);
      $(`#${time_field}`).val(data.time);
    });
  }
  
});

$(document).on('change', '[fill-date-fields-select]', function(){

  let element_handle = $(this);
  let element_targets = element_handle.attr('fill-date-fields-select');

  date_field = element_targets.split('|')[0];
  time_field = element_targets.split('|')[1];

  if ($(this).val() !== '') {
    $.post(`${site_url}/get-time`, data => {
      $(`#${date_field}`).val(data.date);
      $(`#${time_field}`).val(data.time);
    });
  }

});