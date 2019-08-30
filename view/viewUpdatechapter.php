<?php session_start();
 foreach ($tickets as $ticket)
        if($ticket['idChap'] == $_GET['idchap']){

$this->title = "Billet simple pour l'Alaska - Modification du chapitre ".$ticket['chapter']; ?>
  <div id="chapter">
    <form action="index.php?action=updatechap" method="post">
      <div id="chapterNum">
        <label for="numChapter">N° du chapitre: </label>
        <input type="number" name="numChapter" min="1" value="<?= $ticket['chapter'] ?>"><br>
      </div>
      <div id="chapterName">
        <label for="chapter">Nom du chapitre: </label>
        <input type="text" name="chapter" value="<?= $ticket['titleChap'] ?>"><br>
      </div>
      <label for="contentChap">Contenu du chapitre: </label>
      <textarea id="tinymce" name="contentChap"><?= $ticket['contentChap'] ?></textarea><br>
      <input type="hidden" name="idChap" value="<?= $_GET['idchap'] ?>">
      <input class="btn" type="submit" name="addChapter" value="Modifier le chapitre">
    </form>
  </div>
<?php } ?>
