jQuery(function($){

  $(document).on('change', '[data-money-min]', function(){

    let element_handle = $(this);
    let element_parent = $(this).parents().eq(1);

    let money = element_handle.val();
    let min_money = parseFloat(element_handle.attr('data-min')).toFixed(2);
    let min_money_label = min_money.toString().replace('.', ',');

    money = money.replace(',', '.');
    money = parseFloat(money);

    element_parent.find('.field-error-alert').remove();

    if (isNaN(money) || money < min_money) {
      element_parent
        .addClass('field-error')
        .append(`<p class="field-error-alert">O valor deve ser no mínimo R$ ${min_money_label} (Valor total)</p>`);
    }
    else {
      element_parent.removeClass('field-error');
    }

  });

});