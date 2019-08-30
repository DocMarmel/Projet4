<?php
session_start();

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


  // Redirige vers la page admin
  public function redirection($pseudo, $passwd){
    $passwd = MD5($passwd);
    $admin = $this->admin->getAdmin($pseudo, $passwd);
    $_SESSION['connect'] = 1;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['id'] = $admin['id'];
    header("Location: index.php?action=admin&id=".$_SESSION['id']);
  }

  // Affiche la page admin
  public function adminPage(){
    $comments = $this->comment->getCommentsAdmin();
    $tickets = $this->ticket->getTickets();
    $view = new View("Admin");
    $view->generate(array('admin' => $admin, 'tickets' => $tickets, 'comments' => $comments));
  }

  // Page d'ajout de chapitre
  public function addChapterPage(){
    $view = new View("Addchapter");
    $view->generate($data);
  }

  // Ajout du chapitre
  public function addChapter($numberChap, $titleChap, $contentChap){
    $addChap = $this->admin->addChapter($numberChap, $titleChap, $contentChap);
    $this->adminPage($data);
  }

  // Page de modification de chapitre
  public function updateChapterPage(){
    $tickets = $this->ticket->getTickets();
    $view = new View("Updatechapter");
    $view->generate(array('tickets' => $tickets));
  }

  // Modification de chapitre
  public function updateChapter($numberChap, $titleChap, $contentChap, $idChap){
    $update = $this->admin->updateChap($numberChap, $titleChap, $contentChap, $idChap);
    $this->adminPage($data);
  }

  // Accepter un commentaire signaler
  public function acceptCom($idCom){
    $acceptCom = $this->admin->acceptCom($idCom);
    header("Location: index.php?action=admin&id=".$_SESSION['id']);
  }

  // Supprimer un commentaire
  public function deleteCom($idCom){
    $deleteCom = $this->admin->deleteCom($idCom);
    header("Location: index.php?action=admin&id=".$_SESSION['id']);
  }

  // Supprimer un chapitre
  public function deleteChap($idChap){
    $deleteChap = $this->admin->deleteChap($idChap, $idChap);
    header("Location: index.php?action=admin&id=".$_SESSION['id']);
  }
}
