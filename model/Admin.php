<?php
session_start();

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

  public function addChapter($numberChap, $titleChap, $contentChap){
    $sql = "INSERT INTO chapitres (chapter, titleChap, contentChap) VALUES(?,?,?)";
    $addChap = $this->executeRequest($sql, array($numberChap, $titleChap, $contentChap));
  }

  public function updateChap($numberChap, $titleChap, $contentChap, $idChap){
    $sql = "UPDATE chapitres SET chapter=?, titleChap=?, dateChapUpdate=NOW(), contentChap=? WHERE idChap=?";
    $update = $this->executeRequest($sql,array($numberChap, $titleChap, $contentChap, $idChap));
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
    $deleteChap = $this->executeRequest($sql, array($idChap));
  }
}
