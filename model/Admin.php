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
}
