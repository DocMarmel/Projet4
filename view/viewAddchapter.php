<?php $this->title = "Billet simple pour l'Alaska - Ajout de chapitre"; ?>
<br><br>
  <form method="post">
    <label for="numChapter">N° du chapitre: </label>
    <input type="number" name="numChapter" min="1"><br>
    <label for="chapter">Nom du chapitre: </label>
    <input type="text" name="chapter"><br>
    <label for="textareaTinymce">Contenu du chapitre: </label>
    <textarea name="textareaTinymce" id="textareaTinymce">Next, get a free Tiny Cloud API key!</textarea><br>
    <input type="submit" name="addChapter" value="Ajouter le chapitre">
  </form>
