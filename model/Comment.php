<?php
session_start();

require_once 'model/Model.php';

class Comment extends Model{



  // Renvoie la liste des commentaires du billet
  public function getComments($idChap){
    $sql = "SELECT * FROM commentaires WHERE idChap=? ORDER BY dateCom DESC";
    $comments = $this->executeRequest($sql, array($idChap));
    return $comments;
  }

  // Renvoie la liste des commentaires pour la page admin
    public function getCommentsAdmin(){
      $sql = "SELECT * FROM commentaires ORDER BY report DESC, dateCom DESC";
      $comments = $this->executeRequest($sql);
      return $comments;
    }

  // Ajout d'un commentaire
  public function addComment($authorCom, $contentCom, $idChap){
    $sql = "INSERT INTO commentaires(dateCom, authorCom, contentCom, idChap) VALUES(NOW(),?,?,?)";
    $this->executeRequest($sql, array($authorCom, $contentCom, $idChap));
  }

  // Signaler un commentaire
  public function report($idCom){
    $sql = "UPDATE commentaires SET report = report +1 WHERE idCom=?";
    $newReport = $this->executeRequest($sql, array($idCom));
    return $newReport;
  }
}
