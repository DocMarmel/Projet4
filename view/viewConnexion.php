<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - Connexion" ?>

<div id="loginForm">
  <h1>Se connecter</h1>
  <form action="index.php?action=admin&redirect=1" method="post">
    <input id="pseudo" type="text" name="pseudo" placeholder="Votre pseudo" required><br>
    <input id="passwd" type="password" name="passwd" placeholder="Votre mot de passe" required><br>
    <input class="btn" type="submit" name="connexion" value="Se connecter">
  </form>
</div>
