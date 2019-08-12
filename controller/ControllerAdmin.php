<?php

require_once 'model/Admin.php';
require_once 'view/View.php';

class ControllerAdmin{

  private $admin;

  public function __construct(){
    $this->admin = new Admin();
  }

  // Affiche la page admin
  public function adminPage($pseudo, $passwd){
    $admin = $this->admin->getAdmin($pseudo, $passwd);
    $view = new View("Admin");
    $view->generate(array('admin' => $admin));
  }
}
