<?php
session_start();

require_once 'controller/ControllerHome.php';
require_once 'controller/ControllerTicket.php';
require_once 'controller/ControllerConnexion.php';
require_once 'controller/ControllerAdmin.php';
require_once 'view/View.php';

class Router{

  private $ctrlHome;
  private $ctrlTicket;
  private $ctrlConnexion;
  private $ctrlAdmin;

  public function __construct(){
    $this->ctrlHome = new ControllerHome();
    $this->ctrlTicket = new ControllerTicket();
    $this->ctrlConnexion = new ControllerConnexion();
    $this->ctrlAdmin = new ControllerAdmin();
  }

// Traite une requête entrante
  public function routerRequest(){
    try{
      if(isset($_GET['action'])){
        if($_GET['action'] == 'ticket'){
          // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
          $idChap = intval($this->getParameter($_GET, 'id'));
          if($idChap != 0){
            $this->ctrlTicket->ticket($idChap);
          }else{
            throw new Exception("Identifiant de billet non valide");
          }
        }elseif($_GET['action'] == 'commented'){
          $authorCom = $this->getParameter($_POST, 'author');
          $authorCom = htmlspecialchars($authorCom);
          $contentCom = $this->getParameter($_POST, 'content');
          $contentCom = htmlspecialchars($contentCom);
          $idChap = $this->getParameter($_POST, 'id');
          $this->ctrlTicket->commented($authorCom, $contentCom, $idChap);
        }elseif($_GET['action'] == 'report'){
          $idCom = $this->getParameter($_POST, 'idCom');
          $idChap = $this->getParameter($_POST, 'idChap');
          $this->ctrlTicket->addReport($idCom, $idChap);
        }elseif($_GET['action'] == 'connexion'){
          $this->ctrlConnexion->connexion($data);
        }elseif($_GET['action'] == 'admin'){
          if($_GET['redirect'] == 1){
            $pseudo = $this->getParameter($_POST, 'pseudo');
            $passwd = $this->getParameter($_POST, 'passwd');
            $this->ctrlAdmin->redirection($pseudo, $passwd);
          }
          $id = intval($this->getParameter($_GET, 'id'));
          if($id != 0 && $id == $_SESSION['id']){
            $this->ctrlAdmin->adminPage();
          }else{
            throw new Exception("Identifiant de l'utisateur non valide");
          }
        }elseif($_GET['action'] == 'addchapter' && isset($_SESSION['connect'])){
          $this->ctrlAdmin->addChapterPage();
        }elseif($_GET['action'] == 'addchap' && isset($_SESSION['connect'])){
          $numberChap = $this->getParameter($_POST, 'numChapter');
          $titleChap = $this->getParameter($_POST, 'chapter');
          $contentChap = $this->getParameter($_POST, 'contentChap');
          $this->ctrlAdmin->addChapter($numberChap, $titleChap, $contentChap);
        }elseif($_GET['action'] == 'updatechapter' && isset($_SESSION['connect'])){
          $this->ctrlAdmin->updatechapterPage();
        }elseif($_GET['action'] == 'updatechap' && isset($_SESSION['connect'])){
          $numberChap = $this->getParameter($_POST, 'numChapter');
          $titleChap = $this->getParameter($_POST, 'chapter');
          $contentChap = $this->getParameter($_POST, 'contentChap');
          $idChap = $this->getParameter($_POST, 'idChap');
          $this->ctrlAdmin->updateChapter($numberChap, $titleChap, $contentChap, $idChap);
        }elseif($_GET['action'] == 'deconnexion'){
          $this->ctrlConnexion->deconnexion();
        }elseif($_GET['action'] == 'acceptcom' && isset($_SESSION['connect'])){
          $idCom = $this->getParameter($_POST, 'idCom');
          $this->ctrlAdmin->acceptCom($idCom);
        }elseif($_GET['action'] == 'deletecom' && isset($_SESSION['connect'])){
          $idCom = $this->getParameter($_POST, 'idCom');
          $this->ctrlAdmin->deleteCom($idCom);
        }elseif($_GET['action'] == 'deletechap' && isset($_SESSION['connect'])){
          $idChap = $this->getParameter($_POST, 'idChap');
          $this->ctrlAdmin->deleteChap($idChap);
        }elseif($_GET['action'] == 'legalnotice'){
          $this->ctrlHome->legalNotice($data);
        }else{
          throw new Exception("Action non valide");
        }
      }else{
        $this->ctrlHome->home();
      }
    }catch(Exception $e){
      $this->error($e->getMessage());
    }
  }

  private function error($msgError){
    $view = new View("Error");
    $view->generate(array('msgError' => $msgError));
  }

  private function getParameter($tableau, $name){
    if(isset($tableau[$name])){
      return $tableau[$name];
    }else{
      throw new Exception("Paramètre '$name' absent");
    }
  }
}
