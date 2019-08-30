<?php session_start(); ?>
  <?php $this->title = "Billet simple pour l'Alaska - Ajout de chapitre"; ?>
  <div id="chapter">
    <form action="index.php?action=addchap" method="post">
      <div id="chapterNum">
        <label for="numChapter">N° du chapitre: </label>
        <input type="number" name="numChapter" min="1"><br>
      </div>
      <div id="chapterName">
        <label for="chapter">Nom du chapitre: </label>
        <input type="text" name="chapter"><br>
      </div>
      <label for="contentChap">Contenu du chapitre: </label>
      <textarea id="tinymce" name="contentChap"></textarea><br>
      <input class="btn" type="submit" name="addChapter" value="Ajouter le chapitre">
    </form>
  </div>
