<?php
session_start();

require_once 'model/Connexion.php';
require_once 'view/View.php';

class ControllerConnexion{

  private $conn;

  public function __construct(){
    $this->conn = new Connexion();
  }

  public function connexion(){
    $view = new View("Connexion");
    $view->generate($data);
  }

  public function deconnexion(){
    session_destroy();
    header("Location: index.php");
  }
}
