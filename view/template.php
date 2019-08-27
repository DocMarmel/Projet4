<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=100%; min-scale=1.0; max-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <!-- CDN TinyMCE -->
    <script src="public/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: '#tinymce',
      });
    </script>

    <title><?= $title ?></title>
  </head>
  <body>
    <div id="global">
      <header>
        <?php include 'includes/navbar.php'; ?>
      </header>
      <div id="content">
        <?= $content ?>
      </div>
      <footer id="footer">
        <br><br>
        Footer à rajouter !!!
      </footer>
    </div>
  </body>
</html>
