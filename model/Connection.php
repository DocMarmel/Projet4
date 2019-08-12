<?php

require_once 'model/Model.php';

class Connection extends Model{

  // Renvoie un utilisateur existant
  public function getConnection($pseudo, $passwd){
    $sql = "SELECT * FROM connection WHERE pseudo=? AND passwd=?";
    $conn = $this->executeRequest($sql, array($pseudo, $passwd));
    return $conn;
  }
}
