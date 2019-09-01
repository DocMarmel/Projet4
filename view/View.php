<?php
session_start();

class View{

  // Nom du fichier associé à la vue
  private $file;

  // Titre de la vue
  private $title;

  public function __construct($action){
    // Détermination du nom du fichier à partir de l'action
    $this->file = "view/view" . $action . ".php";
  }

  // Génère et affiche la vue
  public function generate($data){
    // Génération de la partie spécifique de la vue
    $content = $this->generateFile($this->file, $data);
    // Génération du template commun utilisant la partie spécifique
    $view = $this->generateFile('view/template.php',
    array('title' => $this->title, 'content' => $content));
    echo $view;
  }

  // Génère un fichier vue et renvoie le résultat produit
  private function generateFile($file, $data){
    if(file_exists($file)){
      // Rend les éléments du tableau $data accessible dans la vue
      extract($data);
      ob_start();
      require $file;
      return ob_get_clean();
    }else{
      throw new Exception("Fichier '$file' introuvable");
    }
  }
}
