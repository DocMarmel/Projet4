<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - Page d'administration"; ?>
<h2 id="welcome">Bienvenue sur votre page d'administration <?= $_SESSION['pseudo']; ?></h2>
<form action="index.php?action=addchapter" method="post">
  <input class="btnAdmin" type="submit" value="Ajouter un chapitre">
  <input class="btnAdmin rightBtn" type="submit" formaction="index.php?action=admin&id=<?= $_SESSION['id'] ?>#chapterArray" name="" value="Tableau des chapitres">
</form>
<div id="commentArray">
  <h2 class="array">Tableau des commentaires</h2>
  <table>
    <thead>
      <tr>
        <th>Chapitre</th>
        <th>Auteur</th>
        <th>Contenu</th>
        <th>Nombre de signalement</th>
        <th>Date</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php  while($comment = $comments->fetch()){ ?>
    <tbody>
      <tr>
        <th><?= $comment['idChap'] ?></th>
        <th><?= $comment['authorCom'] ?></th>
        <th><?= $comment['contentCom'] ?></th>
        <th><?= $comment['report'] ?></th>
        <th><?= $comment['dateCom'] ?></th>
        <th>
          <form class="formAdmin" method="post">
            <input type="hidden" name="idCom" value="<?= $comment['idCom'] ?>">
            <?php if($comment['report'] > 0){ ?>
              <input class="actionBtn" type="submit" formaction="index.php?action=acceptcom" name="acceptCom" value="Accepter">
            <?php } ?>
            <input class="actionBtn" type="submit" formaction="index.php?action=deletecom" name="deleteCom" value="Supprimer">
          </form>
        </th>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>
<div id="chapterArray">
  <h2 class="array">Tableau des chapitres</h2>
  <table>
    <thead>
      <tr>
        <th>Chapitre</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Date de modification</th>
        <th>Action</th>
      </tr>
    </thead>
    <?php  while($ticket = $tickets->fetch()){ ?>
    <tbody>
      <tr>
        <th><?= $ticket['chapter'] ?></th>
        <th><?= $ticket['titleChap'] ?></th>
        <th><?= $ticket['dateChap'] ?></th>
        <th><?= $ticket['dateChapUpdate'] ?></th>
        <th>
          <form class="formAdmin" method="post">
            <input type="hidden" name="idChap" value="<?= $ticket['idChap'] ?>">
            <input class="actionBtn" type="submit" formaction="index.php?action=updatechapter&idchap=<?= $ticket['idChap'] ?>" name="editChap" value="Modifier">
            <input class="actionBtn" type="submit" formaction="index.php?action=deletechap" name="deleteChap" value="Supprimer">
          </form>
        </th>
      </tr>
    </tbody>
    <?php } ?>
  </table>
</div>
