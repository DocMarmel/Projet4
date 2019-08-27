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
        <?php if(!isset($_SESSION['id'])){ ?>
        <li><a href="index.php?action=connexion">Connexion</a></li>
      <?php }else{ ?>
        <li><a href="index.php?action=admin&id=<?= $_SESSION['id'] ?>">Profil</a></li>
        <li><a href="index.php?action=deconnexion">Déconnexion</a></li>
      <?php } ?>
      </ul>
      </div>
    </div>
  </header>
