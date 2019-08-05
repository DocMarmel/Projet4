<?php

require_once 'Model.php';

class Ticket extends Model{

  // Renvoie la liste de tous les billets
  public function getTickets(){
    $sql = "SELECT * FROM chapitres ORDER BY idChap DESC";
    $tickets = $this->executeRequest($sql);
    return $tickets;
  }

  // Renvoie les informations d'un billet
  public function getTicket($idTicket){
    $sql = "SELECT * FROM chapitres WHERE idChap=?";
    $ticket = $this->executeRequest($sql, array($idChap));
    if($ticket->rowCount() == 1){
      return $ticket->fetch();
    }else{
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idChap'");
    }
  }
}
