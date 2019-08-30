<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - " . $ticket['titleChap']; ?>

  <article id="artTicket">
    <header>
        <h1>Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
      <time><?= $ticket['dateChap'] ?></time>
    </header>
    <p><?= $ticket['contentChap'] ?></p>
  </article>
  <hr>
  <div id="commentForm">
    <h1>Commentaires:</h1>
    <p>Le pseudo et le commentaire sont obligatoires pour valider votre commentaire.</p>
    <form action="index.php?action=commented" method="post">
      <input id="author" name="author" type="text" placeholder="Votre pseudo" required><br>
      <textarea id="commentContent" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br>
      <input type="hidden" name="id" value="<?= $ticket['idChap'] ?>">
      <input class="btn" type="submit" value="Commenter">
    </form>
  </div>
  <br>
  <?php while($comment = $comments->fetch()){ ?>
    <div id="comment">
      <p id="dateCom"><?= $comment['dateCom'] ?></p>
      <p id="authorCom">De <b><?= $comment['authorCom'] ?></b></p>
      <p id="contentCom"><?= $comment['contentCom'] ?></p>
      <form action="index.php?action=report" method="post">
        <input type="hidden" name="idCom" value="<?= $comment['idCom'] ?>">
        <input type="hidden" name="idChap" value="<?= $ticket['idChap'] ?>">
        <input class="btn" type="submit" name="btnReport" value="Signaler le commentaire (<?= $comment['report'] ?>)">
      </form>
    </div>
    <br>
  <?php } ?>
