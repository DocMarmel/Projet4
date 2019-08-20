<?php

require_once 'controller/ControllerHome.php';
require_once 'controller/ControllerTicket.php';
require_once 'controller/ControllerConnection.php';
require_once 'controller/ControllerAdmin.php';
require_once 'view/View.php';

class Router{

  private $ctrlHome;
  private $ctrlTicket;
  private $ctrlConnection;
  private $ctrlAdmin;

  public function __construct(){
    $this->ctrlHome = new ControllerHome();
    $this->ctrlTicket = new ControllerTicket();
    $this->ctrlConnection = new ControllerConnection();
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
          $contentCom = $this->getParameter($_POST, 'content');
          $idChap = $this->getParameter($_POST, 'id');
          $this->ctrlTicket->commented($authorCom, $contentCom, $idChap);
        }elseif($_GET['action'] == 'connection'){
          $this->ctrlConnection->connection($pseudo, $passwd);
        }elseif($_GET['action'] == 'admin'){
          $id = intval($this->getParameter($_GET, 'id'));
          if($id != 0){
            $pseudo = $this->getParameter($_POST, 'pseudo');
            $passwd = $this->getParameter($_POST, 'passwd');
            $this->ctrlAdmin->adminPage($pseudo, $passwd);
          }else{
            throw new Exception("Identifiant de l'utisateur non valide");
          }
        }elseif($_GET['action'] == 'deconnexion'){
          $this->ctrlConnection->deconnexion();
        }elseif($_GET['action'] == 'addchapter'){
          $this->ctrlAdmin->addChapter();
        }elseif($_GET['action'] == 'acceptcom'){
          $idCom = $this->getParameter($_POST, 'idCom');
          $this->ctrlAdmin->acceptCom($idCom);
        }elseif($_GET['action'] == 'deletecom'){
          $idCom = $this->getParameter($_POST, 'idCom');
          $this->ctrlAdmin->deleteCom($idCom);
        }elseif($_GET['action'] == 'deletechap'){
          $idChap = $this->getParameter($_POST, 'idChap');
          $this->ctrlAdmin->deleteChap($idChap);
        }elseif($_GET['action'] == 'editchap'){

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
