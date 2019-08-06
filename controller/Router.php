<?php

require_once 'controller/ControllerHome.php';
require_once 'controller/ControllerTicket.php';
require_once 'view/View.php';

class Router{

  private $ctrlHome;
  private $ctrlTicket;

  public function __construct(){
    $this->ctrlHome = new ControllerHome();
    $this->ctrlTicket = new ControllerTicket();
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
