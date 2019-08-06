<?php

abstract class Model{

private $db;

// Execute une requête SQL avec paramètre ou non
protected function executeRequest($sql, $params = null){
  if($params == null){
    $result = $this->getDb()->query($sql);   // Exécution direct
  }else{
    $result = $this->getDb()->prepare($sql); // Exécution préparé
    $result->execute($params);
  }
  return $result;
}


  // Connexion à la BDD
  private function getDb(){
    if($this->db == null){
      $this->db = new PDO('mysql:host=localhost;dbname=blog', 'forteroche', 'J.ForterocheBlog', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
      return $this->db;
  }
}
