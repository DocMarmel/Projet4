<?php

require_once 'Model.php';

class Comment extends Model{

  // Renvoie la liste des commentaires du billet
  public function getComments($idTicket){
    $sql = "SELECT * FROM commentaires WHERE idChap=?";
    $comments = $this->executeRequest($sql, array($idTicket));
    return $comments;
  }
}
