<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; min-scale=1.0; max-scale=1.0">
    <title>Billet simple pour l'Alaska - <?= $ticket['titleChap'] ?></title>
    <link rel="stylesheet" href="../public/css/master.css">
  </head>
  <body>
    <header>
      <?php include '../includes/navbar.php'; ?>
      <div class="content">
        <article>
          <header>
            <h1 class="tickets_title">Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
            <time><?= $ticket['dateChap'] ?></time>
            <p class="text"><?= $ticket['contentChap'] ?></p>
          </header>
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
      </div>
    </header>
  </body>
</html>
