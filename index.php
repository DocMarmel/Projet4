<?php

require 'model/model.php';

try {
  $tickets = getTickets();
  require 'view/home.php';

} catch (Exception $e) {
  $msgError = $e->getMessage();
  require 'view/error.php';
}
