<?php

require_once 'model/Connection.php';
require_once 'view/View.php';

class ControllerConnection{

  private $conn;

  public function __construct(){
    $this->conn = new Connection();
  }

  public function connection($pseudo, $passwd){
    $conn = $this->conn->getConnection($pseudo, $passwd);
    $view = new View("Connection");
    $view->generate(array('connection' => $conn));
  }

  public function deconnexion(){
    session_destroy();
    header("Location: index.php");
  }
}
