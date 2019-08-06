<?php

require_once 'model/Ticket.php';
require_once 'view/View.php';

class ControllerHome{

  private $ticket;

  public function __construct(){
    $this->ticket = new Ticket();
  }

  // Affiche la liste de tous les billets
  public function home(){
    $tickets = $this->ticket->getTickets();
    $view = new View("Home");
    $view->generate(array('tickets' => $tickets));
  }
}
