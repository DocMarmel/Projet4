<?php

require_once 'model/Model.php';

class Comment extends Model{

  // Renvoie la liste des commentaires du billet
  public function getComments($idChap){
    $sql = "SELECT * FROM commentaires WHERE idChap=?";
    $comments = $this->executeRequest($sql, array($idChap));
    return $comments;
  }

  // Ajout d'un commentaire
  public function addComment($authorCom, $contentCom, $idChap){
    $sql = "INSERT INTO commentaires(dateCom, authorCom, contentCom, idChap) VALUES(?, ?, ?, ?)";
    $dateCom = date(DATE_W3C);
    $this->executeRequest($sql, array($dateCom, $authorCom, $contentCom, $idChap));
  }
}
