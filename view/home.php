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
      <?php  while($ticket = $tickets->fetch()){ ?>
          <article>
            <header>
              <a href="controller/ticket.php?id=<?= $ticket['idChap'] ?>">
                <h1 class="tickets_title">Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
              </a>
              <time><?= $ticket['dateChap'] ?></time>
            </header>
            <p class="text"><?= $ticket['contentChap'] ?></p>
          </article>
          <?php } ?>
      </div>
    </header>
  </body>
</html>
