<?php
session_start();

require_once 'model/Model.php';

class Ticket extends Model{

  // Renvoie la liste de tous les billets
  public function getTickets(){
    $sql = "SELECT idChap, chapter, titleChap, DATE_FORMAT(dateChap, 'Le %d-%m-%Y à %k:%i') AS dateChap, DATE_FORMAT(dateChapUpdate, 'Le %d-%m-%Y à %k:%i') AS dateChapUpdate, contentChap FROM chapitres ORDER BY chapter DESC";
    $tickets = $this->executeRequest($sql);
    return $tickets;
  }

  // Renvoie les informations d'un billet
  public function getTicket($idChap){
    $sql = "SELECT idChap, chapter, titleChap, DATE_FORMAT(dateChap, 'Le %d-%m-%Y à %k:%i') AS dateChap, DATE_FORMAT(dateChapUpdate, 'Le %d-%m-%Y à %k:%i') AS dateChapUpdate, contentChap FROM chapitres WHERE idChap=?";
    $ticket = $this->executeRequest($sql, array($idChap));
    if($ticket->rowCount() == 1){
      return $ticket->fetch();
    }else{
      throw new Exception("Aucun billet ne correspond à l'identifiant '$idChap'");
    }
  }
}
