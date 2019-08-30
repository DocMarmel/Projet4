<?php
session_start();

require_once 'model/Ticket.php';
require_once 'model/Comment.php';
require_once 'view/View.php';

class ControllerTicket{

  private $ticket;
  private $comment;

  public function __construct(){
    $this->ticket = new Ticket();
    $this->comment = new Comment();
  }

  // Affiche un seul billet
  public function ticket($idChap){
    $ticket = $this->ticket->getTicket($idChap);
    $comments = $this->comment->getComments($idChap);
    $view = new View("Ticket");
    $view->generate(array('ticket' => $ticket, 'comments' => $comments));
  }

// Ajoute un commentaire à un billet
  public function commented($authorCom, $contentCom, $idChap){
    $this->comment->addComment($authorCom, $contentCom, $idChap);
    //Actualisation de l'affichage du billet
    $this->ticket($idChap);
  }

  public function addReport($idCom, $idChap){
    $this->comment->report($idCom);
    $this->ticket($idChap);
  }
}
