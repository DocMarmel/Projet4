<?php $this->title = "Billet simple pour l'Alaska"; ?>

<?php  while($ticket = $tickets->fetch()){ ?>
    <article>
      <header>
        <a href="index.php?action=ticket&id=<?= $ticket['idChap'] ?>">
          <h1 class="tickets_title">Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
        </a>
        <time><?= $ticket['dateChap'] ?></time>
      </header>
      <p class="text"><?= $ticket['contentChap'] ?></p>
    </article>
    <?php } ?>
    <hr>
