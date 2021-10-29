$(document).on('click', '[prato-remote-open]', function(event){
  event.preventDefault();
  $(this).parent().find('[prato-open]').click();
});