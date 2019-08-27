<?php session_start();
 foreach ($tickets as $ticket)
        if($ticket['idChap'] == $_GET['idchap']){

$this->title = "Billet simple pour l'Alaska - Modification du chapitre ".$ticket['chapter']; ?>
<br><br>
  <form action="index.php?action=updatechap" method="post">
    <label for="numChapter">N° du chapitre: </label>
    <input type="number" name="numChapter" min="1" value="<?= $ticket['chapter'] ?>"><br>
    <label for="chapter">Nom du chapitre: </label>
    <input type="text" name="chapter" value="<?= $ticket['titleChap'] ?>"><br>
    <label for="contentChap">Contenu du chapitre: </label>
    <textarea id="tinymce" name="contentChap"><?= $ticket['contentChap'] ?></textarea><br>
    <input type="hidden" name="idChap" value="<?= $_GET['idchap'] ?>">
    <input type="submit" name="addChapter" value="Modifier le chapitre">
  </form>
<?php } ?>
