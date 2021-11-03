$(document).on('change', '[limit-change]', function(){
  
  insertURLParam('limit', $(this).val());

});