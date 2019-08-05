<?php

require 'model/model.php';

// Affiche la liste de tous les billets
function home(){
  $tickets = getTickets();
  require 'view/home.php';
}

// Affiche un seul billet
function ticket($idTicket){
  $ticket = getTicket($idTicket);
  $comments = getComments($idTicket);
  require 'view/ticket.php';
}

// Affiche les erreurs
function error($msgError){
  require 'view/error.php';
}
