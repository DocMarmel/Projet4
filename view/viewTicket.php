<?php $this->title = "Billet simple pour l'Alaska - " . $ticket['titleChap']; ?>

  <article>
    <header>
        <h1 class="tickets_title">Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
      <time><?= $ticket['dateChap'] ?></time>
    </header>
    <p class="text"><?= $ticket['contentChap'] ?></p>
  </article>
  <hr>
  <header>
    <h1 id="comments_title">Commentaires :</h1>
  </header>
  <?php while($comment = $comments->fetch()){ ?>
    <p><?= $comment['authorCom'] ?> dit :</p>
    <p><?= $comment['contentCom'] ?></p>
    <br>
  <?php } ?>
  <hr>
  <form action="index.php?action=commented" method="post">
    <input id="author" name="author" type="text" placeholder="Votre pseudo" required><br>
    <textarea id="commentContent" name="content" rows="4" placeholder="Votre commentaire" required></textarea><br>
    <input type="hidden" name="id" value="<?= $ticket['idChap'] ?>">
    <input type="submit" value="Commenter">
  </form>
