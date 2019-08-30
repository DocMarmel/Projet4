<?php
session_start();

require_once 'model/Model.php';

class Connexion extends Model{

  // Renvoie un utilisateur existant
  public function getConnexion($pseudo, $passwd){
    $sql = "SELECT * FROM connection WHERE pseudo=? AND passwd=?";
    $conn = $this->executeRequest($sql, array($pseudo, $passwd));
    return $conn;
  }
}
