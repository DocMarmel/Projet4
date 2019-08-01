<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; min-scale=1.0; max-scale=1.0">
    <title>Billet simple pour l'Alaska</title>
    <link rel="stylesheet" href="../public/css/master.css">
  </head>
  <body>
    <header>
      <?php include "../includes/navbar.php" ?>

      <form id="form_login" action="admin.php" method="post">
        <input type="text" name="pseudo" placeholder="Votre pseudo" required>
        <input type="password" name="passwd" placeholder="Votre mot de passe" required>
        <input type="submit" name="connection" value="Se connecter">
      </form>
    </header>
  </body>
</html>
