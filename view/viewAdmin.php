<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - Page d'administration"; ?>

<h1>Page d'administration</h1>

<h2>Bienvenue <?php $_SESSION['pseudo']; ?></h2>

<a href="index.php?action=deconnexion">Se déconnecter</a>
