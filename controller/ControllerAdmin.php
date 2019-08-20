<?php

require_once 'model/Admin.php';
require_once 'model/Ticket.php';
require_once 'model/Comment.php';
require_once 'view/View.php';

class ControllerAdmin{

  private $admin;
  private $ticket;
  private $comment;

  public function __construct(){
    $this->admin = new Admin();
    $this->ticket = new Ticket();
    $this->comment = new Comment();
  }

  // Affiche la page admin
  public function adminPage($pseudo, $passwd){
    $comments = $this->comment->getCommentsAdmin();
    $tickets = $this->ticket->getTickets();
    $admin = $this->admin->getAdmin($pseudo, $passwd);
    $view = new View("Admin");
    $view->generate(array('admin' => $admin, 'tickets' => $tickets, 'comments' => $comments));
  }

  public function addChapter(){
    $addChap = $this->admin->addChapter($chapter, $titleChap, $contentChap);
    $view = new View("Addchapter");
    $view->generate(array('admin' => $admin));
  }

  public function acceptCom($idCom){
    $acceptCom = $this->admin->acceptCom($idCom);
    header("Location: index.php");
  }

  public function deleteCom($idCom){
    $deleteCom = $this->admin->deleteCom($idCom);
    header("Location: index.php");
  }

  public function deleteChap($idChap){
    $deleteChap = $this->admin->deleteChap($idChap, $idChap);
    header("Location: index.php");
  }
}
