<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; min-scale=1.0; max-scale=1.0">
    <title>Billet simple pour l'Alaska</title>
    <link rel="stylesheet" href="public/css/master.css">
  </head>
  <body>
    <header>
      <?php include 'includes/navbar.php'; ?>
      <div class="content">

      <?php  while ($chapters = $tickets->fetch()){ ?>
          <article>
            <header>
              <h1 class="tickets_title">Chapitre <?= $chapters['chapter'] ?>: <?= $chapters['title'] ?></h1>
              <time><?= $chapters['date'] ?></time>
              <p class="text"><?= $chapters['text'] ?></p>
            </header>
          </article>

          <?php } ?>

      </div>
    </header>
  </body>
</html>