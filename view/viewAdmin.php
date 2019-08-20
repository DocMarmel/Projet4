<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - Page d'administration"; ?>

<h1>Page d'administration</h1>

<h2>Bienvenue <?php $_SESSION['pseudo']; ?></h2>

<a href="index.php?action=addchapter">Ajouter un chapitre</a>

<h2>Tableau des commentaires</h2>
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
            <input type="submit" formaction="index.php?action=acceptcom" name="acceptCom" value="Accepter">
          <?php } ?>
          <input type="submit" formaction="index.php?action=deletecom" name="deleteCom" value="Supprimer">
        </form>
      </th>
    </tr>
  </tbody>
  <?php } ?>
</table>
<br><br>

<h2>Tableau des chapitres</h2>
<table>
  <thead>
    <tr>
      <th>Chapitre</th>
      <th>Titre</th>
      <th>Contenu</th>
      <th>Date</th>
      <th>Action</th>
    </tr>
  </thead>
  <?php  while($ticket = $tickets->fetch()){ ?>
  <tbody>
    <tr>
      <th><?= $ticket['chapter'] ?></th>
      <th><?= $ticket['titleChap'] ?></th>
      <th><?= substr($ticket['contentChap'], 0, 150); ?></th>
      <th><?= $ticket['dateChap'] ?></th>
      <th>
        <form class="formAdmin" method="post">
          <input type="hidden" name="idChap" value="<?= $ticket['idChap'] ?>">
          <input type="submit" name="editChap" value="Modifier">
          <input type="submit" formaction="index.php?action=deletechap" name="deleteChap" value="Supprimer">
        </form>
      </th>
    </tr>
  </tbody>
  <?php } ?>
</table>
<br><br>
<a href="index.php?action=deconnexion">Se déconnecter</a>
