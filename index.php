<?php

require('functions.php');
$requestBackend = [
  'PATCH',
  'PUT',
  'DELETE',
  'POST'
];
if (in_array($_SERVER['REQUEST_METHOD'], $requestBackend))
  get('backend/index');
else
  get('Index');