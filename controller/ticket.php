<?php

require '../model/model.php';

try{
  if(isset($_GET['id'])){
    // intval renvoie la valeur numérique du paramètre ou 0 en cas d'échec
    $id = intval($_GET['id']);
    if($id != 0){
      $ticket = getTicket($id);
      $comments = getComments($id);
      require '../view/viewTicket.php';
    }else{
      throw new Exception("Identifiant de billet incorrect");
    }
  }else{
    throw new Exception("Aucun identifiant de billet");
  }
}catch (Exception $e){
  $msgError = $e->getMessage();
  require '../view/error.php';
}
