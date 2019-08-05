<?php

require 'controller/controller.php';

try{
  if(isset($_GET['action'])){
    if($_GET['action'] == 'ticket'){
      if(isset($_GET['id'])){
        // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
        $idTicket = intval($_GET['id']);
        if($idTicket != 0){
          ticket($idTicket);
        }else{
          throw new Exception("Idendtifiant de billet non valide");
        }
      }else{
        throw new Exception("Identifiant de billet non défini");
      }
    }else{
      throw new Exception("Action non valide");
    }
  }else{
    home();  // Action par défaut
  }
}catch(Exception $e){
  error($e->mgetMessage());
}
