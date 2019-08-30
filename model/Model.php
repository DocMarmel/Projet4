<?php
session_start();

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
      $this->db = new PDO('mysql:host=db5000161230.hosting-data.io;dbname=dbs156339', 'dbu182424', '3k2yeqwKcB6f&', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
      return $this->db;
  }
}
