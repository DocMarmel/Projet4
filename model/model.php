<?php
require 'includes/db_connect.php';

// Renvoie la liste de tous les billets, triés par id décroissant
function getTickets(){
  $tickets = $db->query("SELECT * FROM chapitres ORDER BY id DESC");
  return $tickets;
}
