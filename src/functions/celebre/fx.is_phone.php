<?php

function is_celular($telefone){
  
  $telefone = only_number($telefone);
  if (strlen($telefone) >= 8 and strlen($telefone) <= 11) {
    return true;
  }
  else {
    return false;
  }

}