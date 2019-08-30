<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska"; ?>
  <img id="imgHome" src="public/img/mountain_alaska.jpg" alt="Montagne d'Alaska">
    <h1 id="chapHome">Les chapitres: </h1>
<?php  while($ticket = $tickets->fetch()){ ?>
    <article id="artHome">
      <a href="index.php?action=ticket&id=<?= $ticket['idChap'] ?>">
        <header>
          <h1 class="tickets_title">Chapitre <?= $ticket['chapter'] ?>: <?= $ticket['titleChap'] ?></h1>
          <time><?= $ticket['dateChap'] ?></time>
        </header>
        <p class="resume"><?= substr($ticket['contentChap'], 0, 800) ?></p>
      </a>
    </article>
    <?php } ?>
