<?php 

if (!defined('PATH')) exit;

?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<script>
  jQuery(function($){

  dtr_args = {
    maxDate: '<?= date('d/m/Y') ?>',
    autoUpdateInput: false,
    locale: {
      format: 'DD/MM/YYYY',
      cancelLabel: 'Cancelar',
      applyLabel: 'Aplicar',
      daysOfWeek: [
        'Dom',
        'Seg',
        'Ter',
        'Qua',
        'Qui',
        'Sex',
        'Sáb'
      ],
      monthNames: [
        'Janeiro',
        'Fevereiro',
        'Março',
        'Abril',
        'Maio',
        'Junho',
        'Julho',
        'Agosto',
        'Setembro',
        'Outubro',
        'Novembro',
        'Dezembro'
      ],
    },
  }
  $('.select-date-range').daterangepicker(dtr_args, function(start, end){
    date_start = start.format('YYYY-MM-DD');
    date_end = end.format('YYYY-MM-DD');
    window.location.assign(`<?= site_url() ?>/clientes/?data_inicial=${date_start}&data_final=${date_end}`);
  });

  });

</script>