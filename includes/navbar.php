<?php session_start(); ?>
<header>
  <div class="header">
    <div class="nav">
      <div class="logo">
        <a href="index.php">
          <img src="" alt="logo de l'écrivain">
        </a>
      </div>
      <ul class="menu">
        <li><a href="index.php">Accueil</a></li>
        <li><a href="/blogP4/view/chapterList.php">Liste des chapitres</a></li>
        <?php if(!isset($_SESSION['id'])){ ?>
        <li><a href="index.php?action=connection">Connexion</a></li>
      <?php }else{ ?>
        <li><a href="index.php?action=deconnexion">Déconnection</a></li>
      <?php } ?>
      </ul>
      </div>
    </div>
  </header>
