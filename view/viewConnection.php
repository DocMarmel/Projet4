<?php session_start(); ?>
<?php $this->title = "Billet simple pour l'Alaska - Connexion" ?>

<form id="form_login" action="index.php?action=admin&id=1" method="post">
  <input type="text" name="pseudo" placeholder="Votre pseudo" required>
  <input type="password" name="passwd" placeholder="Votre mot de passe" required>
  <input type="submit" name="connection" value="Se connecter">
</form>
