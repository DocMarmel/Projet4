<?php session_start(); ?>
  <?php $this->title = "Billet simple pour l'Alaska - Ajout de chapitre"; ?>
  <br><br>
    <form action="index.php?action=addchap" method="post">
      <label for="numChapter">N° du chapitre: </label>
      <input type="number" name="numChapter" min="1"><br>
      <label for="chapter">Nom du chapitre: </label>
      <input type="text" name="chapter"><br>
      <label for="contentChap">Contenu du chapitre: </label>
      <textarea id="tinymce" name="contentChap"></textarea><br>
      <input type="submit" name="addChapter" value="Ajouter le chapitre">
    </form>
