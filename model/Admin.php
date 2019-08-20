<?php

require_once 'model/Model.php';

class Admin extends Model{

  public function getAdmin($pseudo, $passwd){
    $sql = "SELECT * FROM connection WHERE pseudo=? AND passwd=?";
    $admin = $this->executeRequest($sql, array($pseudo, $passwd));
    if($admin->rowCount() == 1){
      return $admin->fetch();
    }else{
      throw new Exception("Aucun utilisateur ne correspond à ces identifiants");
    }
  }

  public function addChapter($chapter, $titleChap, $contentChap){
    $sql = "INSERT INTO chapitres (chapter, titleChap, contentChap) VALUES(?,?,?)";
    $addChap = $this->executeRequest($sql, array($chapter, $titleChap, $contentChap));
  }

  public function acceptCom($idCom){
    $sql = "UPDATE commentaires SET report=0 WHERE idCom=?";
    $acceptCom = $this->executeRequest($sql, array($idCom));
  }

  public function deleteCom($idCom){
    $sql = "DELETE FROM commentaires WHERE idCom=?";
    $deleteCom = $this->executeRequest($sql, array($idCom));
  }

  public function deleteChap($idChap){
    $sql = "DELETE FROM chapitres WHERE idChap=?";
    // "UNION DELETE FROM commentaires WHERE idChap=?";
    $deleteChap = $this->executeRequest($sql, array($idChap));
  }
}
